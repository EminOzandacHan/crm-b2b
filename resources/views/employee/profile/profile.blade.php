@extends('employee.layouts.masteremployee')

@section('pagecss')
    <link href="{{asset('assets/css/plugins/chosen/chosen.css')}}" rel="stylesheet">
@stop

@section('contentPages')
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Employee Profile</h2>
			<ol class="breadcrumb">
				<li>
					<a href="{{URL::to('/employee')}}">Home</a>
				</li>
				<li>
					<a>Employee</a>
				</li>
				<li class="active">
					<strong>Profile</strong>
				</li>
			</ol>
		</div>
		<div class="col-lg-2">

		</div>
	</div>
	<div class="wrapper wrapper-content">
		<div class="row animated fadeInRight">
			<div class="col-md-4">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Profile Detail</h5>
					</div>
					<div>
						<div class="ibox-content no-padding border-left-right">
							<img alt="image" style="margin: 0 auto;" class="img-responsive" src="{{asset($employeeAvatart)}}">
						</div>
						<div class="ibox-content profile-content">
							<h4> <i class="fa fa-user">&nbsp;</i><strong> {{ $employeeName }}</strong></h4>
							<p>
                                <i class="fa fa-envelope">&nbsp;</i>
                                <strong>{{ $emailID }}</strong>
                            </p>
						    <div class="row">
                                <form action="{{action('employee\EmployeeController@updateEmployeeAvatar')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                                    <div class="col-sm-12">
                                        <div class="btn-group">
                                        <label class="control-label" for="order_id">&nbsp;</label><br/>
                                            <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                                <input type="file" accept="image/*" name="employeeAvatar" required id="inputImage" class="hide">
                                                Upload new image
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label" for="order_id">&nbsp;</label><br/>
                                            <input type="submit" class="btn btn-primary" value="Save" >
                                        </div>
                                    </div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Other Detail</h5>
					</div>
					<div class="tabs-container">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab-1"> Personal Detail</a></li>
							<li class=""><a data-toggle="tab" href="#tab-2">Change Password</a></li>
						</ul>
						<div class="tab-content">

							<div id="tab-1" class="tab-pane active">
								<div class="panel-body">
									<div class="ibox-content col-md-12">
										<div class="col-md-12">
											<form class="m-t form-horizontal"  role="form" method="post" action="{{action('employee\EmployeeController@profileUpdate')}}" id="form_employee_profile" >
												<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                                                <input name="employee_id" type="hidden" id="employee_id" value="{{ $employee_id }}"/>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">First Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="{{ $firstname }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $lastname }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Phone</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ $phone }}">
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-3 control-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ $address }}">
                                                    </div>
                                                </div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Email Address</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="emailID" id="emailID" value="{{ $emailID }}">
													</div>
												</div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Country</label>
                                                    <div class="col-sm-9">
                                                        <select data-placeholder="Choose a Country..." class="country form-control"  style="width: 100%;" tabindex="2" name="country" id="country">
                                                            <option value="">Select</option>
                                                            <?php
                                                            foreach($country as $key=> $value)
                                                            { ?>
                                                            <option value="{{ $key }}"  <?php  if($employee_country == $key){ echo 'selected'; } ?> >
                                                                {{ $value }}
                                                            </option>
                                                            <?php  } ?>
                                                        </select>
                                                     </div>
                                                </div>

												<div class="col-md-3 pl0 col-md-offset-3">
													<button type="submit" class="btn btn-primary block full-width m-b">Update</button>
												</div>

											</form>
										</div>
									</div>
								</div>
							</div>

							<div id="tab-2" class="tab-pane">
								<div class="panel-body">
									<div class="col-md-12">
										<form class="m-t form-horizontal" role="form" method="post" action="{{action('employee\EmployeeController@passwordUpdate')}}" id="form_updatepassword" >
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="emailID" id="emailID" value="{{ $emailID }}" readonly disabled>
                                                </div>
                                            </div>

											<div class="form-group">
                                                <label class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
												    <input type="password" class="form-control" name="opassword" id="opassword" placeholder="Old Password">
                                                </div>
											</div>
											<div class="form-group">
                                                <label class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
												    <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
                                                </div>
											</div>
											<div class="form-group">
                                                <label class="col-sm-3 control-label">Confirm Password</label>
                                                <div class="col-sm-9">
												    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password">
                                                </div>
											</div>
											<div class="col-md-3  col-md-offset-3">
												<button type="submit" class="btn btn-primary block full-width m-b">Update</button>
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop()

@section('pagescript')
		@include('employee.includes.commonscript')
        <script  src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
		<script type="text/javascript">
            $(function () {

                function loadSelectbox()
                {
                    $(".country").select2({
                        placeholder: "Select a Country",
                        allowClear: true
                    });

                    if($('input[name="chk_shipping"]:checked').val() == 1){
                        $('.shipping_div').css({'display':'block'});
                    }else{
                        $('.shipping_div').css({'display':'none'});
                    }
                }
                loadSelectbox();

                $('.nav-tabs > li > a').click(function (){
                    loadSelectbox();
                });

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                }).on('ifToggled', function() {

                    if($('input[name="chk_shipping"]:checked').val() == 1){
                         $('.shipping_div').css({'display':'block'});
                    }else{
                        $('.shipping_div').css({'display':'none'});
                    }

                });



                $('#form_employee_profile').formValidation({
                    framework: 'bootstrap',
                    excluded: ':disabled',
                    message: 'This value is not valid',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        first_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Your First Name !'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 30,
                                    message: 'The Field must be more than 3 characters long'
                                }
                            }
                        },
                        last_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Your Last Name !'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 30,
                                    message: 'The Field must be more than 3 characters long'
                                }
                            }
                        },
                       phone: {
							validators: {
								notEmpty: {
									message: 'Enter Phone Number.'
								}, 
								numeric: {
									message: 'Enter Proper Phone Number !'
								},
								stringLength: {
									min: 10,
									max: 15,
									message: 'Enter Valid Phone Number !'
								}
							}
						},
						address: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Address !'
                                },
                                stringLength: {
                                    min: 3,
                                    max: 200,
                                    message: 'The Field must be more than 3 characters long'
                                }
                            }
                        },
						emailID: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Email Address !'
                                },
                                emailAddress: {
									message: 'Enter Valid Email Address !'
								}
                            }
                        },

                        country: {
                            validators: {
                                notEmpty: {
                                    message: 'Select Country !'
                                }
                            }
                        }
                    }
                });

                $('#form_updatepassword').formValidation({
                    framework: 'bootstrap',
                    excluded: ':disabled',
                    message: 'This value is not valid',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        opassword: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Password'
                                },
                                different: {
                                    field: 'emailID',
                                    message: 'The password cannot be the same as Email Address'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 12,
                                    message: 'The password must be more than 6 characters long'
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Password'
                                },
                                different: {
                                    field: 'emailID',
                                    message: 'The password cannot be the same as Email Address'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 12,
                                    message: 'The password must be more than 6 characters long'
                                }
                            }
                        },
                        cpassword: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Confirm Password'
                                },
                                different: {
                                    field: 'emailID',
                                    message: 'The password cannot be the same as Email Address'
                                },
                                stringLength: {
                                    min: 6,
                                    max: 12,
                                    message: 'The password must be more than 6 characters long'
                                }
                            }
                        }
                    }
                });

            });
        </script>
@stop()