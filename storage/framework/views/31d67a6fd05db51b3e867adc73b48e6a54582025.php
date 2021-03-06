

<?php $__env->startSection('pagecss'); ?>
    <link href="<?php echo e(asset('assets/css/plugins/chosen/chosen.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentPages'); ?>
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-lg-10">
			<h2>Dealer Profile</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo e(URL::to('/dealer')); ?>">Home</a>
				</li>
				<li>
					<a>Dealer</a>
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
							<img alt="image" style="margin: 0 auto;" class="img-responsive" src="<?php echo e(asset($dealerAvatart)); ?>">
						</div>
						<div class="ibox-content profile-content">
							<h4> <i class="fa fa-user">&nbsp;</i><strong> <?php echo e($dealerName); ?></strong></h4>
							<p>
                                <i class="fa fa-envelope">&nbsp;</i>
                                <strong><?php echo e($emailID); ?></strong>
                            </p>
                            <p>
                                <i class="fa fa-product-hunt">&nbsp;</i>
                                <strong><?php echo e($brandNM); ?></strong>
                            </p>
						    <div class="row">
                                <form action="<?php echo e(action('dealer\DealerController@updateDealerAvatar')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                                    <div class="col-sm-12">
                                        <div class="btn-group">
                                        <label class="control-label" for="order_id">&nbsp;</label><br/>
                                            <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                                <input type="file" accept="image/*" name="dealerAvatar" required id="inputImage" class="hide">
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
                           <!-- <li class=""><a id="" data-toggle="tab" href="#tab-3">Billing Address</a></li>-->
						</ul>
						<div class="tab-content">

							<div id="tab-1" class="tab-pane active">
								<div class="panel-body">
									<div class="ibox-content col-md-12">
										<div class="col-md-12">
											<form class="m-t form-horizontal"  role="form" method="post" action="<?php echo e(action('dealer\DealerController@profileUpdate')); ?>" id="form_dealer_profile" >
												<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Company name</label>
                                                    <div class="col-sm-9">
													    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company name" value="<?php echo e($companyName); ?>">
                                                    </div>
												</div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">First Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="<?php echo e($firstname); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo e($lastname); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Phone</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo e($phone); ?>">
                                                    </div>
                                                </div>
												<div class="form-group">
													<label class="col-sm-3 control-label">Email Address</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="emailID" id="emailID" value="<?php echo e($emailID); ?>">
													</div>
												</div>
												<div class="form-group">
                                                    <label class="col-sm-3 control-label">Billing Address</label>
                                                    <div class="col-sm-9">
														  <textarea class="form-control" id="address" style="height:100px;" name="address" placeholder="Billing Address" ><?php echo e($address); ?></textarea>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-3 control-label">Shipping Address</label>
                                                    <div class="col-sm-9">
														  <textarea class="form-control" id="shipping_address" name="shipping_address" style="height:100px;" placeholder="Shipping Address" ><?php echo e($shipping_address); ?></textarea>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-3 control-label">Contact person 1</label>
                                                    <div class="col-sm-9">
														  <textarea class="form-control" id=" " name="contactperson1" style="height:100px;" placeholder="Contact person 1" ><?php echo e($contactperson1); ?></textarea>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-3 control-label">Contact person 2</label>
                                                    <div class="col-sm-9">
														  <textarea class="form-control" id=" " name="contactperson2" style="height:100px;" placeholder="Contact person 2" ><?php echo e($contactperson2); ?></textarea>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    <label class="col-sm-3 control-label">Contact person 3</label>
                                                    <div class="col-sm-9">
														  <textarea class="form-control" id=" " name="contactperson3" style="height:100px;" placeholder="Contact person 3" ><?php echo e($contactperson3); ?></textarea>
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
										<form class="m-t form-horizontal" role="form" method="post" action="<?php echo e(action('dealer\DealerController@passwordUpdate')); ?>" id="form_updatepassword" >
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="emailID" id="emailID" value="<?php echo e($emailID); ?>" readonly disabled>
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


                            <div id="tab-3" class="tab-pane">
                                <div class="panel-body">
                                    <div class="ibox-content col-md-12">
                                        <div class="col-md-12">
                                            <form class="m-t form-horizontal"  role="form" method="post" action="<?php echo e(action('dealer\DealerController@billingAddress')); ?>" id="dealer_billing" >
                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

                                                <div class="form-group">
                                                    <h1 class="col-sm-6 control-label">Billing Information</h1>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">First Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="billing_firstname" id="billing_firstname" placeholder="First name" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Last Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="billing_lastname" id="billing_lastname" placeholder="Last Name" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Email Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control" name="billing_emailID" id="billing_emailID" placeholder="Emaild Address" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="billing_address" id="billing_address" placeholder="Address" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Zip Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="billing_zipcode" id="billing_zipcode" placeholder="State" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">City</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="billing_city" id="billing_city" placeholder="City" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">State</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="billing_state" id="billing_state" placeholder="State" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="i-checks">
                                                        <label class="col-sm-offset-3 control-label">
                                                            <input type="checkbox" value="1" id="chk_shipping" name="chk_shipping"  >
                                                            <i></i>Different Shipping  Address
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="shipping_div" style="display: none;">
                                                    <div class="form-group">
                                                        <h1 class="col-sm-8 control-label">Shipping Information</h1>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">First Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="shipping_firstname" id="shipping_firstname" placeholder="First name" value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Last Name</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="shipping_lastname" id="shipping_lastname" placeholder="Last Name" value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Email Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" class="form-control" name="shipping_emailID" id="shipping_emailID"  placeholder="Emaild Address" value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="shipping_address" id="shipping_address" placeholder="Address" value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Zip Code</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="shipping_zipcode" id="shipping_zipcode" placeholder="Zip Code" value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">City</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="shipping_city" id="shipping_city" placeholder="City" value="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">State</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="shipping_state" id="shipping_state" placeholder="State" value="">
                                                        </div>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
		<?php echo $__env->make('dealer.includes.commonscript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script  src="<?php echo e(asset('assets/js/plugins/iCheck/icheck.min.js')); ?>"></script>
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



                $('#form_dealer_profile').formValidation({
                    framework: 'bootstrap',
                    excluded: ':disabled',
                    message: 'This value is not valid',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        company_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Dealer Company Name'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                }
                            }
                        },
                        first_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Dealer First Name !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                }
                            }
                        },
                        last_name: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Dealer Last Name !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                }
                            }
                        },
                       phone: {
							validators: {
								notEmpty: {
									message: 'Enter Phone Number.'
								}, 
								 regexp: {
									regexp: /^[()\/0-9\s\/^+\/^-]+$/i ,
									message: 'This Field can consist of Numerical characters and spaces only'
								},
								 
							}
						},
						address: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Address !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                }
                            }
                        },
						pincode: {
							validators: {
								notEmpty: {
									message: 'Enter Pin Code !'
								},
								stringLength: {
									min: 3,
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
                        city: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter City !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'This Field can consist of alphabetical characters and spaces only'
                                }
                            }
                        },
                        state: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter State !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'This Field can consist of alphabetical characters and spaces only'
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


                $('#dealer_billing').formValidation({
                    framework: 'bootstrap',
                    excluded: ':disabled',
                    message: 'This value is not valid',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        billing_firstname: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Dealer First Name !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'This Field can consist of alphabetical characters and spaces only'
                                }
                            }
                        },
                        billing_lastname: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Dealer Last Name !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'This Field can consist of alphabetical characters and spaces only'
                                }
                            }
                        },
                        billing_emailID: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Email Address !'
                                },
                                emailAddress: {
                                    message: 'Enter Valid Email Address !'
                                }
                            }
                        },
                        billing_address: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Address !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                }
                            }
                        },
                        billing_city: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter City !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'This Field can consist of alphabetical characters and spaces only'
                                }
                            }
                        },
                        billing_state: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter State !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                },
                                regexp: {
                                    regexp: /^[a-z\s]+$/i,
                                    message: 'This Field can consist of alphabetical characters and spaces only'
                                }
                            }
                        },
                        billing_zipcode: {
                            validators: {
                                notEmpty: {
                                    message: 'Enter Zip Code !'
                                },
                                stringLength: {
                                    min: 3,
                                    message: 'The Field must be more than 3 characters long'
                                },
                                
                            }
                        },
                        billing_country: {
                            validators: {
                                notEmpty: {
                                    message: 'Select Country !'
                                }
                            }
                        }
                    }
                });

            });
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dealer.layouts.masterdealer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>