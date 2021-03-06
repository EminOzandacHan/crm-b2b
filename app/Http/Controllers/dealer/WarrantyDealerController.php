<?php

namespace App\Http\Controllers\dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use View;
use Validator;
use Hash;
use Carbon\Carbon;
use Input;
use Mail;
use Form;
use Auth;
use File;
use Config;
use XeroLaravel;
use Cart;
use Response;
use URL;
use App\Dealer;
use App\WarrantyProduct;
use App\WarrantyProductNote;

class WarrantyDealerController extends Controller
{
    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    function getTokenProduct(){
        $length=4;
        $token = "";
        $codeAlphabet= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max)];
        }
        return $token.rand(111111,999999);
    }

    public function index()
    {
        $id = 0;
        $sessionData=Session::get('dealerLog');
        $id = $sessionData['dealerID'];
        $data = array();
        if(isset($id) && ($id != 0))
        {
            $data['total_pending_warranty'] = WarrantyProduct::select('id')->where('user_id','=',$id)->where('role','=','dealer')->where('warranty_status','!=','complete')->orderBy('id','DESC')->count();
            $data['total_complete_warranty'] = WarrantyProduct::select('id')->where('user_id','=',$id)->where('role','=','dealer')->where('warranty_status','=','complete')->orderBy('id','DESC')->count();

            $result_warrantyList = WarrantyProduct::select('*')->where('user_id','=',$id)->where('role','=','dealer')->where('warranty_status','!=','complete')->orderBy('id','DESC')->get();
            $data['warrantyList_pending'] = $result_warrantyList;

            $result_warrantyList = WarrantyProduct::select('*')->where('user_id','=',$id)->where('role','=','dealer')->where('warranty_status','=','complete')->orderBy('id','DESC')->get();
            $data['warrantyList_complete'] = $result_warrantyList;

            return View::make('warranty/dealer/dealerWarrantyList',$data);
        }else{
            return Redirect::to('/dealer');
        }
    }

    public function warrantyAdd()
    {
        $id = 0;
        $sessionData=Session::get('dealerLog');
        $id = $sessionData['dealerID'];
        $data = array();
        if(isset($id) && ($id != 0))
        {
            $Unique='';
            $data['clients_project_uniqueID'] = '';
            for($j=0;$j < 4;$j++)
            {
                if($j!=3){$dash='-';}else{$dash='';}
                $Unique .= $this->getTokenProduct().$dash;
            }
            $data['warranty_uniqueID'] = $Unique;
            return View::make('warranty/dealer/dealerWarrantyAdd',$data);
        }else{
            return Redirect::to('dealer/index');
        }
    }

    public function fileupload()
    {
        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $success_ar_file_name = array();

        $validation = Validator::make($input, $rules);
        if ($validation->fails())
        {
            echo 'error';
            exit;
        }else{
            $files = Input::file('note_file');
            $destinationPath = 'uploads/warranty/';
            foreach($files as $file)
            {
                $extension = File::extension($file->getClientOriginalName());
                $filename = 'note_file_'.sha1(rand(11,9999).rand(1,999).date("Ymdhis")).rand(1111,9999).".{$extension}";
                $upload_success = $file->move($destinationPath, $filename);
                if($upload_success)
                {
                    $filename_ar = array();
                    $filename_ar['oldname'] = $file->getClientOriginalName();
                    $filename_ar['newname'] = $filename;
                    $filename_ar['downloadurl'] = URL::to("uploads/warranty/".$filename);
                    $success_ar_file_name[] = $filename_ar;
                } else {
                    echo 'error'; exit;
                }
            }
            if(!empty($success_ar_file_name)){
                //echo implode(',', $success_ar_file_name);
                echo json_encode($success_ar_file_name,true);
            }
        }
    }

    public  function fileRemove()
    {
        $file_path =  'uploads/warranty/';
        $data = Input::all();
        if(isset($data['file']) && !empty($data['file'])) {
            $file_name = $data['file'];
            File::delete($file_path.$file_name);
        }
    }

    public  function  deleteData()
    {
        $id = 0;
        $sessionData=Session::get('dealerLog');
        $id = $sessionData['dealerID'];
        if(isset($id) && ($id != 0))
        {
            $data_post = Input::all();
            $destinationPath = 'uploads/warranty'; // upload path
            $result_file_images = DB::table('warrantyproduct')->where('warranty_uniqueID','=',$data_post['warranty_uniqueID'])->first();
            if(!empty($result_file_images->file_images))
            {
                $file_name = explode(',',$result_file_images->file_images);
                foreach($file_name as $key => $value){
                    File::delete($destinationPath.'/'.$value);
                }
            }
            WarrantyProduct::where('warranty_uniqueID','=', $data_post['warranty_uniqueID'])->delete();
        }
    }

    public function warrantySaveData()
    {
        $id = 0;
        $sessionData = Session::get('dealerLog');
        $id = $sessionData['dealerID'];
        $data = array();
        if(isset($id) && ($id != 0))
        {
            $data_post = Input::all();
            if(!empty($data_post) && ($data_post['warranty_uniqueID'] != '') && ($data_post['method_process'] != '')
                && (($data_post['method_process'] == 'add') || ($data_post['method_process'] == 'edit')) )
            {
                $rules = array(
                    'name'=>'required|not_in:0',
                    'address'=>'required|not_in:0',
                    'postcode'=>'required|not_in:0',
                    'emailID'=>'required|not_in:0',
                    'phone'=>'required|not_in:0',
                    'product_model'=>'required|min:3|max:30|not_in:0',
                );

                $validator = Validator::make(Input::all(), $rules);

                if ($validator->fails())
                {
                    Session::flash('operationFaild','Some thing went wrong!');
                    return Redirect::to('/dealer/warrantyadd');
                }else{
                    $update_post = array();
                    $update_post['user_id']  = $id;
                    $update_post['role']  = 'dealer';

                    $update_post['name'] = htmlentities($data_post['name']);
                    $update_post['address'] = htmlentities($data_post['address']);
                    $update_post['postcode'] = htmlentities($data_post['postcode']);
                    $update_post['emailID'] = htmlentities($data_post['emailID']);
                    $update_post['phone'] = htmlentities($data_post['phone']);
                    $update_post['product_name'] = htmlentities($data_post['product_name']);
                    $update_post['product_model'] = htmlentities($data_post['product_model']);
                    if($data_post['purchase_date'] != ''){
                        $update_post['purchase_date'] = date('Y-m-d',strtotime($data_post['purchase_date']));
                    }
                    $update_post['product_serial_number'] = htmlentities($data_post['product_serial_number']);
                    $update_post['product_fault'] = htmlentities($data_post['product_fault']);
                    $update_post['part_require'] = htmlentities($data_post['part_require']);
                    $update_post['note'] = htmlentities($data_post['note']);

                    if($data_post['hidden_file_images'] != ''){
                        $update_post['file_images'] = htmlentities($data_post['hidden_file_images']);
                    }


                    if($data_post['method_process'] == 'add')
                    {
                        $primary_key = array(
                            'warranty_uniqueID' => $data_post['warranty_uniqueID']
                        );
                        $update_post['warranty_status'] = 'new_claim';
						$getLastWarrnty=DB::table('warrantyproduct')->orderBy('id','DESC')->first();
						$warrentyClaimNumber=$getLastWarrnty->claimNumber + 1;
						$update_post['claimNumber']=$warrentyClaimNumber;
                    }

                    if($data_post['method_process'] == 'edit')
                    {
                        $primary_key = array(
                            'warranty_uniqueID' => $data_post['warranty_uniqueID'],
                            'user_id' => $id,
                            'role' => 'dealer',
                        );
                    }
                    WarrantyProduct::updateOrCreate($primary_key, $update_post);

                    $result_warranty_product = DB::table('warrantyproduct')->where('warranty_uniqueID','=',$data_post['warranty_uniqueID'])->first();
                    if(!empty($result_warranty_product))
                    {
                        $warranty_status_name = $result_warranty_product->warranty_status;
                        $staff_emailID_result = array();
                        if($result_warranty_product->assign_role == 'staff')
                        {
                            $staff_emailID_result = DB::table('staff')->select('emailID','first_name','last_name')->where('staff_id','=',$result_warranty_product->warranty_assign)->first();
                        }
                        if($result_warranty_product->assign_role == 'employee')
                        {
                            $staff_emailID_result = DB::table('employee')->select('emailID','first_name','last_name')->where('employee_id','=',$result_warranty_product->warranty_assign)->first();
                        }

                        if(!empty($staff_emailID_result))
                        {
                            $assign_name = $staff_emailID_result->first_name . ' ' . $staff_emailID_result->last_name;
                            $assign_email = $staff_emailID_result->emailID;
                            $email = $assign_email;

                            $warranty_status = Config('warranty.WARRANTY_STATUS');
                            $warranty_status_color = Config('warranty.WARRANTY_STATUS_COLOR');

                            $warranty_info = array(
                                'title_message' => 'Dealer Change Warranty Product Details',
                                'to_name' => $assign_name,
                                'name' => $update_post['name'],
                                'emailID' => $update_post['emailID'],
                                'product_model' => $update_post['product_model'],
                                'product_serial_number' => $update_post['product_serial_number'],
                                'note' => $update_post['note'],
                                'address' => $update_post['address'],
                                'phone' => $update_post['phone'],
                                'warranty_status' => $warranty_status[$warranty_status_name],
                                'warranty_status_color' => $warranty_status_color[$warranty_status_name],
                                'loginUrl' => URL::to('/'),
                            );

                            if (!empty($warranty_info) && ($email != ''))
                            {
                                Mail::send('email_templates.WarrantyProductmessage', ['data_info' => $warranty_info], function ($message) use ($email) {
                                    $message->to($email)->subject('CRM - Update Warranty Product Details');
                                });
                            }
                        }
                    }

                    Session::flash('operationSucess','Your Warranty Successfully Added. Admin will be contact back soon..');
                    return Redirect::to('/dealer/warranty');
                }
            }else{
                Session::flash('operationFaild','Some thing went wrong!');
                if($data_post['method_process'] == 'add')
                {
                    return Redirect::to('/dealer/warrantyadd');

                }else if(($data_post['method_process'] == 'edit') && ($data_post['warranty_uniqueID'] != ''))
                {
                    return Redirect::to('/dealer/warrantyedit/'.$data_post['warranty_uniqueID']);
                }else{
                    return Redirect::to('/dealer/warranty');
                }
            }
        }else{
            Session::flash('operationFaild','Please Login');
            return Redirect::to('/dealer');
        }
    }

    public function warrantyEdit($editid)
    {
        $id = 0;
        $sessionData=Session::get('dealerLog');
        $id = $sessionData['dealerID'];
        $data = array();
        if(isset($id) && ($id != 0))
        {
            $result = DB::table('warrantyproduct')->where('warranty_uniqueID','=',$editid)->where('user_id','=',$id)->where('role','=','dealer')->first();
            if(!empty($result)){
                $data['warrantyData'] = $result;
                return View::make('warranty/dealer/dealerWarrantyEdit',$data);
            }else{
                return Redirect::to('dealer/warranty');
            }
        }else{
            return Redirect::to('dealer/index');
        }
    }

    public function getFileWarranty()
    {
        $data_post = Input::all();
        $id = 0;
        $sessionData=Session::get('dealerLog');
        $id = $sessionData['dealerID'];

        $hidden_file_name_string = '';
        $hidden_file_name = '';
        $hidden_file_list = array();
        $file_path = '';

        if(isset($id) && ($id != 0))
        {
            $result = DB::table('warrantyproduct')->where('warranty_uniqueID','=',$data_post['data_warranty_uniqueID'])
                ->where('user_id','=',$id)->where('role','=','dealer')->first();

            if(!empty($result))
            {
                $hidden_file_name = $result->file_images;
                if($hidden_file_name != '')
                {
                    $hidden_file_name_ar = explode(',', $hidden_file_name);

                    foreach( $hidden_file_name_ar as $key_file => $value_file)
                    {
                        $file_list = array();
                        $file_name = str_replace(' ','',$value_file);
                        $hidden_file_name_string[] = $file_name;
                        $file_path = 'uploads/warranty/'.$file_name;
                        $file_full_path = URL::to($file_path);
                        $file_list['name'] = $file_name;

                        foreach (glob("uploads/warranty/*.*") as $filename)
                        {
                            if($filename == $file_path)
                            {
                                $file_list['size'] = filesize($filename);
                                $file_list['type'] = "";
                            }else{
                                $file_list['size'] = filesize($filename);
                                $file_list['type'] = "";
                            }
                        }
                        $file_list['file'] = $file_path;
                        $file_list['url'] = $file_full_path;
                        $hidden_file_list[] = $file_list;
                    }
                    $hidden_file_name  = implode(',',$hidden_file_name_string);
                    echo json_encode($hidden_file_list,true);
                }
            }
        }
    }


    public function noteDataForm()
    {
        $id = 0;
        $sessionData=Session::get('dealerLog');
        $id = $sessionData['dealerID'];
        $data = array();
        if(isset($id) && ($id != 0))
        {
            $data['login_role'] = 'dealer';
            $data['login_user_id'] = $id;

            $data_post = Input::all();
            $warranty_uniqueID = $data_post['warranty_uniqueID'];
            $result = DB::table('warrantyproduct')->where('warranty_uniqueID','=',$warranty_uniqueID)->first();
            if(!empty($result))
            {
                $data['warrantyData'] = $result;
                $result_note = DB::table('warrantyproduct_note')->where('warranty_uniqueID','=',$warranty_uniqueID)->orderBy('id','DESC')->get();
                $data['warrantyNote'] = $result_note;
                return View::make('warranty/dealer/noteWarranty',$data);
            }else{
                echo '444';
                exit;
            }
        }else{
            echo '404';
            exit;
        }
    }

    public function noteAdd()
    {
        $id = 0;
        $sessionData=Session::get('dealerLog');
        $id = $sessionData['dealerID'];

        $data = array();
        if(isset($id) && ($id != 0))
        {
            $Unique='';
            $data['clients_project_uniqueID'] = '';
            for($j=0;$j < 4;$j++)
            {
                if($j!=3){$dash='-';}else{$dash='';}
                $Unique .= $this->getTokenProduct().$dash;
            }

            $data_post = Input::all();
            $warranty_uniqueID = $data_post['warranty_uniqueID'];
            $data_comment = $data_post['data_comment'];

            $primary_key = array(
                'warranty_note_uniqueID' => $Unique
            );

            $update_post['role'] = 'dealer';
            $update_post['user_id'] = $id;

            $update_post['warranty_uniqueID'] = $warranty_uniqueID;
            $update_post['note'] = htmlentities($data_comment);

            WarrantyProductNote::updateOrCreate($primary_key, $update_post);

            if(isset($data_post['data_send_mail']) && ($data_post['data_send_mail'] == 1))
            {
                $main_role = 'dealer';
                $email_ar = array();

                $emailID_admin = $emailID_assign = $emailID_dealer = $emailID_customer = '';
                $assign_role = $assign_uniqueID = '';
                $result_admin = DB::table('admin')->where('deleted_at','=',NULL)->first();
                if(!empty($result_admin)){
                    $emailID_admin = $result_admin->emailID;
                    $emailID_admin = 'rob@superiorspas.co.uk';
                    //array_push($email_ar,$emailID_admin);
                }

                $warranty_status = Config('warranty.WARRANTY_STATUS');
                $warranty_status_color = Config('warranty.WARRANTY_STATUS_COLOR');

                $result_warranty = DB::table('warrantyproduct')->where('warranty_uniqueID','=',$warranty_uniqueID)->first();
                if(!empty($result_warranty))
                {
                    $assign_role = $result_warranty->assign_role;
                    $assign_uniqueID = $result_warranty->warranty_assign;
                    $create_role = $result_warranty->role;
                    $create_id = $result_warranty->user_id;
                    $warranty_status_name = $result_warranty->warranty_status;

                    $warranty_info = array(
                        'message_note' => $update_post['note'],
                        'title_message' => 'Warranty Product Message',
                        'name' => $result_warranty->name,
                        'emailID' => $result_warranty->emailID,
                        'product_model' => $result_warranty->product_model,
                        'product_serial_number' => $result_warranty->product_serial_number,
                        'warranty_status' => $warranty_status[$warranty_status_name],
                        'warranty_status_color' => $warranty_status_color[$warranty_status_name],
                        'loginUrl' => URL::to('/'),
                    );

                    $search_id = '';
                    if($assign_role != '' && $assign_uniqueID != '')
                    {
                        if($assign_role == 'staff'){
                            $search_id = 'staff_id';
                        }
                        if($assign_role == 'employee'){
                            $search_id = 'employee_id';
                        }
                        $result_assign = DB::table($assign_role)->where($search_id,'=',$assign_uniqueID)->where('deleted_at','=',NULL)->first();
                        if(!empty($result_assign))
                        {
                            $emailID_assign = $result_assign->emailID;
                            if($emailID_assign != '')
                            {
                                if($main_role != $assign_role) {
                                    array_push($email_ar, $emailID_assign);
                                }
                            }
                        }
                    }


                    if(($create_role == 'dealer') || ($create_role == 'customer'))
                    {
                        $result_create = DB::table($create_role)->where('id','=',$create_id)->where('deleted_at','=',NULL)->first();
                        if(!empty($result_create))
                        {
                            if($result_create->emailID != '')
                            {
                                if($main_role != $create_role){
                                    array_push($email_ar,$result_create->emailID);
                                }
                            }
                        }
                    }
                }

                if(!empty($email_ar))
                {
                    foreach($email_ar as $key => $value)
                    {
                        $warranty_info['to_name'] = $value;
                        $email = $value;
                        Mail::send('email_templates.WarrantyProductmessage_note', ['data_info' => $warranty_info], function ($message) use ($email) {
                            $message->to($email)->subject('CRM - Warranty Product Message');
                        });
                    }
                }
            }

        }else{
            echo '404';
            exit;
        }
    }

}
