@extends('admin.layouts.app')
@section('strTitle', $strTitle)
<!-- BEGIN PAGE BAR -->
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>{{ $strTitle }}</span>
            </li>
        </ul>
        <div class="page-toolbar" style="display:none">
            <div class="btn-group pull-right">
                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">
                            <i class="icon-bell"></i> Action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-shield"></i> Another action</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-user"></i> Something else here</a>
                    </li>
                    <li class="divider"> </li>
                    <li>
                        <a href="#">
                            <i class="icon-bag"></i> Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> {{ $strTitle }}
        <small style="display:none">form validation</small>
    </h3>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    
    @if( $flash= session('success') )
        <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
        </div>
    @endif

    @if ($flash= session('message') )
            <div id="flashmsg" class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif
        
    
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif

    @if($flash= session('error'))
    <div class="alert alert-danger">
        <strong>{{session('error')}}</strong>
    </div>
    @endif


     

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">{{ $strTitle }}</span>
                    </div>
                    <div class="actions" style="display:none">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                            <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    {!!Form::open(["url"=>"admin/staff/addworkingtime/$id" ,"method"=>"POST","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}

                        <div class="form-body">
                             
                                <div class="form-group">
                                        <label class="control-label col-md-3">Day
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="checkbox-list" data-error-container="#form_2_services_error">
                                                <label> <input type="checkbox" value="Saturday" name="fldDay[]"  /> Saturday </label>
                                                <label> <input type="checkbox" value="Sunday" name="fldDay[]"  /> Sunday </label>
                                                <label> <input type="checkbox" value="Monday" name="fldDay[]"  /> Monday </label>
                                                <label> <input type="checkbox" value="Tuesday" name="fldDay[]"  /> Tuesday </label>
                                                <label> <input type="checkbox" value="Wednesday" name="fldDay[]"  /> Wednesday </label>
                                                <label> <input type="checkbox" value="Thursday" name="fldDay[]"  /> Thursday </label>
                                                <label> <input type="checkbox" value="Friday" name="fldDay[]"   /> Friday </label>          
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label col-md-3">From Hour
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="time" autocomplete="off" name="fldFromHour" data-required="1" class="form-control" /> </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label col-md-3">To Hour
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="time" autocomplete="off" name="fldToHour" data-required="1" class="form-control" /> </div>
                                    </div>

                            
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" name="Submit" id="Submit" class="btn green">Save</button>
                                    <a href="{{ route('admins.index') }}" class="btn grey-salsa btn-outline">Back</a>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <div class="row">
            <div class="col-md-12">
                 
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>{{ $strTitle }} </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Day </th>
                                    <th> From Hour </th>
                                    <th> To Hour </th>
                                    <th> Delete </th>
                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $arrWorkingtime as $objWorkingtime )
                                    <tr>
                                        <td> {{ $objWorkingtime->pkStaffWorktimeID }} </td>
                                        <td> {{ $objWorkingtime->fldDay }} </td>
                                        <td>{{$objWorkingtime->fldFromHour}} </td>
                                        <td>{{$objWorkingtime->fldToHour}} </td>
                                         
                                        <td>
                                            {!!Form::open(["url"=>"admin/staff/deleteworktime/$objWorkingtime->pkStaffWorktimeID/$objWorkingtime->fkStaffID","method"=>"DELETE","onclick"=>"return confirm('Are U Sure To Delete !!')"])!!}                
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            {!! Form::close() !!}
                                        </td> 
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
     

     
    </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection <!--END  CONTENT SECTION-->
