@extends('admin.layouts.masteradmin')
@section('pagecss')
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
@stop

@section('contentPages')
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Add Accessory Categories</h2>
				<ol class="breadcrumb">
					<li>
						<a href="{{URL::to('/admin')}}">Home</a>
					</li>
					<li>
						<a>Store</a>
					</li>
					<li class="active">
						<strong>Accessory Categories</strong>
					</li>
				</ol>
			</div>
			<div class="col-lg-2">

			</div>
		</div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="ibox-content m-b-sm border-bottom">
			<form action="{{action('admin\AccessoryController@accessoryCategoriesAdd')}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="acccat_edit">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="order_id">Category Name</label>
								<input type="text" id="categoryName" name="categoryName" value="" placeholder="Category Name" class="form-control">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="order_id">Select Parent Category</label>
								<select class="form-control m-b" name="parentCategory">
								<option value="">Select Category</option>
									<?php 
										$category=DB::table('accessory_category')->where('deleted_at','=',NULL)->get();
										foreach($category as $cat){
											echo '<option value="'.base64_encode($cat->id).'">'.$cat->categoryName.'</option>';
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="btn-group">
							<label class="control-label" for="order_id">&nbsp;</label><br/>
								 
								<div class="fileupload fileupload-new" data-provides="fileupload">
									<span class="btn btn-primary btn-file invoice-pdf">
										<span class="fileupload-new">Select image</span>
										<span class="fileupload-exists">Change</span>         
										<input type="file"  accept="image/*" name="categoryAvatar" id="categoryAvatar"/>
									</span>
									<span class="fileupload-preview"></span>
									<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none"><i class="fa fa-times" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						 
						 
						<div class="col-sm-2">
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Save" >
							</div>
						</div>
						 
						 
					</div>
				</form>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>
                                    <th>Category Image</th>
                                    <th data-hide="phone">Category Name</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               <?php 
							   $categoryDatas=DB::table('accessory_category')->where('deleted_at','=',NULL)->get();
							   $tree='';
									if(!empty($categoryDatas)){
										$rows = array();
											$mk=0;
										foreach($categoryDatas as $data){
											foreach($data as $k=>$v){
												$rows[$mk][$k]= $v;
											}
											$mk++;
										} 
										 
										//print_r($rows);
										function buildTree(array $elements, $parentId = 0) {
											$branch = array();
											foreach ($elements as $element) {
												if ($element['parent_id'] == $parentId) {
													$children = buildTree($elements, $element['id']);
													if ($children) {
														$element['children'] = $children;
													}
													$branch[] = $element;
												}
											}

											return $branch;
										}

										$tree = buildTree($rows);
										 
									}
									displayArrayRecursively($tree);
									function displayArrayRecursively($arr,$iden='') {
										if ($arr) {
											 foreach ($arr as $v) {
												// print_r($v);
												if($iden!=''){$var=$iden;}else{$var='';}
												$url = URL::to('admin/accessoryeditcategory', base64_encode($v['id']));
												$urldel = URL::to('admin/accessorydeletecategory', base64_encode($v['id']));
												if(!empty($v['categoryAvatar'])){
													$cavatar=URL::to('uploads/accessoriescategories/thumb/'.$v['categoryAvatar']);
												} else{
													$cavatar='assets/img/placeholder300x300.png';
												}
												 echo'<tr><td><img alt="image" class="img-circles tbl-listing-img" src="'.$cavatar.'"></td><td style="font-size: 16px;">'.$var.$v['categoryName'].'</td><td align="right"><div class="btn-group">
														<a href="'.$url.'" class="btn-white btn btn-xs">Edit</a>
														<a href="'.$urldel.'" class="btn-white btn btn-xs">Delete</a>
													</div></td></tr>';
												 $arc=0;
													if (isset($v['children'])){
														if (is_array($v['children'])) {
															displayArrayRecursively($v['children'],$iden .'- ');
														} 
													} 
											}
										}
									}
									?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		@stop()
@section('pagescript')
		@include('admin.includes.commonscript')
		<!--<script type="text/javascript" src="{{asset('assets/js/jquery-form-validation.js')}}"></script>-->
		<script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
		 <script src="{{asset('assets/js/jquery-fileupload-btn.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
				 $('#acccat_edit')
                            .formValidation({
                        framework: 'bootstrap',
                            excluded: ':disabled',
                            message: 'This value is not valid',
                            icon: {
                                valid: 'glyphicon glyphicon-ok',
                                invalid: 'glyphicon glyphicon-remove',
                                validating: 'glyphicon glyphicon-refresh'
                            },
                            fields: {
                
								categoryAvatar: {
									validators: {
										 
										file: {
											extension: 'jpeg,jpg,png',
											type: 'image/jpeg,image/png',
											maxSize: 2097152,   // 2048 * 1024
											message: 'Please select only Image file Less then 2MB!'
										}
									}
								},
								categoryName: {
                                    validators: {
                                        notEmpty: {
                                            message: 'Enter category Name'
                                        },
                                        stringLength: {
                                            min: 2,
                                            max: 30,
                                            message: 'The Field must be more than 2 characters long'
                                        }
                                    }
                                },
                            }
                    });
            });
		</script>
@stop()
  