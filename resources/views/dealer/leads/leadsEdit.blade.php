@extends('dealer.layouts.masterdealer')

@section('pagecss')
@stop

@section('contentPages')
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Edit Lead Report</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{URL::to('/dealer')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{URL::to('/dealer/leadsreport')}}">All Leads Report</a>
                    </li>
                    <li class="active">
                        <strong>All Leads Report list</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edit Leads Reports</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form id="leadreport_edit" name="leadreport_edit" method="POST" action="{{ action('dealer\DealerLeadsController@editData') }}" class="form-horizontal" enctype="multipart/form-data" style="min-height: 100vh;">

                                <input name="_token" type="hidden" id="hidden_token" value="{{ csrf_token() }}"/>
                                <input name="id" type="hidden" id="id" value="{{ $leads->id }}"/>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="jack" value="{{ $leads->title }}">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Customer Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="rich" value="{{ $leads->name }}">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								<div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="lead_status"  id="lead_status" >
                                            <option value="">Select Status</option>
                                            @if(!empty($lead_status_report))
                                                @foreach($lead_status_report as $key_report => $value_report)
                                                    <?php
                                                    $selected  = '';
                                                    if($leads->lead_status == $key_report)
                                                    {
                                                        $selected = 'selected=selected';
                                                    }
                                                    ?>
                                                    <option value="{{ $key_report }}" {{ $selected }}>
                                                        {{ $value_report }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email Address</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="emailID" name="emailID" placeholder="jack@mail.com" value="{{ $leads->emailID }}">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="098756423" value="{{ $leads->phone }}">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="description" name="description" rows="8">{{ $leads->description }}</textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <input type="submit" class="btn btn-primary" value="Update"/>
                                        <button class="btn btn-white" type="button" id="btn_reset">Reset</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		@stop()

        @section('pagescript')
            @include('dealer.includes.commonscript')

            <script type="text/javascript">
                $(function ()
                {
                    $('#btn_reset').click(function ()
                    {
                        window.location.reload();
                    });

                    $('#leadreport_edit').formValidation({
                        framework: 'bootstrap',
                        excluded: ':disabled',
                        message: 'This value is not valid',
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            title: {
                                validators: {
                                    notEmpty: {
                                        message: 'Enter Title'
                                    },
                                    stringLength: {
                                        min: 3,
                                        max: 30,
                                        message: 'The Field must be more than 3 characters long'
                                    }
                                }
                            },
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Enter Customer name !'
                                    },
                                    stringLength: {
                                        min: 3,
                                        max: 30,
                                        message: 'The Field must be more than 3 characters long'
                                    }
                                }
                            },
                            emailID: {
                                validators: {
                                    
                                    emailAddress: {
                                        message: 'Enter Valid Email Address !'
                                    }
                                }
                            },
                            phone: {
                                validators: {
                                    
                                    stringLength: {
                                        min: 6,
                                        max: 100,
                                        message: 'The Field must be more than 6 characters long'
                                    },
                                    regexp: {
                                        regexp: /^[0-9\s]+$/i,
                                        message: 'This Field can consist of numeric value'
                                    }
                                }
                            },
                            description: {
                                validators: {
                                    notEmpty: {
                                        message: 'Enter Description !'
                                    },
                                    stringLength: {
                                        min: 3,
                                        max: 200,
                                        message: 'The Field must be more than 3 characters long'
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
        @stop()