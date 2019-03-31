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

    @if( $flash = session('success') )
        <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
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

                    {!!Form::open(["url"=>"admin/hr_insurances","method"=>"POST","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                            <div class="form-body">
                                              
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Basic Min
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldBasicMin" data-required="1" required="required" class="form-control" value="{{ old('fldBasicMin') }}"  /> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Basic Max
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldBasicMax" data-required="1" required="required" class="form-control" value="{{ old('fldBasicMax') }}"  /> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Variable Min
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldVariableMin" data-required="1" required="required" class="form-control" value="{{ old('fldVariableMin') }}"  /> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Variable Max
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldVariableMax" data-required="1" required="required" class="form-control" value="{{ old('fldVariableMax') }}"  /> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">From
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="Start_Date" data-required="1" required="required" class="form-control" value="{{ old('Start_Date') }}"  /> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">To
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="End_Date" data-required="1" required="required" class="form-control" value="{{ old('End_Date') }}"  /> 
                                        </div>
                                    </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                       
                                      <a href="{{ route('hr_insurances.index') }}" class="btn grey-salsa btn-outline">Back</a>
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


    </div>
        <!-- END CONTENT BODY -->
    </div>

@endsection <!--END  CONTENT SECTION-->
