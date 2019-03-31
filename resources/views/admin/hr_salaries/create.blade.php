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

                    {!!Form::open(["url"=>"admin/hr_salaries","method"=>"POST","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                            <div class="form-body">
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Department
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                    <select  class="form-control" name="fkDepartmentID" id="fkDepartmentID" required data-required="1">
                                                    <option value="">Select Department...</option>
                                                    @foreach( $arrDepartments as $objDepartment )
                                                        <option value="{{ $objDepartment->pkDepartmentID }}" > {{ $objDepartment->fldNameAR }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>        

                                    <div class="form-group">
                                            <label class="control-label col-md-3">Job
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                    <select  class="form-control" name="fkJobID" id="fkJobID" required data-required="1">
                                                    <option value="">Select Job...</option>
                                                    
                                                </select>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label col-md-3">Staff
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                    <select  class="form-control" name="fkStaffID" id="fkStaffID" required data-required="1">
                                                    <option value="">Select Staff...</option>
                                                    
                                                </select>
                                            </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Salary
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Salary" data-required="1" required="required" class="form-control" value="{{ old('Salary') }}"  /> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Start Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="Start_Date" data-required="1" required="required" class="form-control" value="{{ old('Start_Date') }}"  /> 
                                        </div>
                                    </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                       
                                      <a href="{{ route('hr_salaries.index') }}" class="btn grey-salsa btn-outline">Back</a>
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
    <script type="text/javascript">
        $('#fkDepartmentID').change(function () {
       var fkDepartmentID = $(this).val();
      if (fkDepartmentID) {
       $.ajax({
        type: "GET",
        url: "{{url('admin/jobs/getjobs')}}"+"/"+fkDepartmentID,
        success: function (res) {
            
            $("#fkJobID").empty();
            $("#fkStaffID").empty();
            $("#fkJobID").append('<option>Select Job...</option>');
            $("#fkStaffID").append('<option>Select Staff...</option>');
            /// loop javascript 
             
            $.each(res , function (key, value) {
                console.log(value);
                $("#fkJobID").append('<option value="' + value.pkJobID + '">' + value.fldNameAR + '</option>');
            });
        }
            });
           } else {
            $("#fkJobID").empty();
     
           }
         });  
    </script>

    <script type="text/javascript">
        $('#fkJobID').change(function () {
      var fkJobID = $(this).val();
        if (fkJobID) {
          $.ajax({
                type: "GET",
                url: "{{url('admin/staff/getstaffs')}}"+"/"+fkJobID,
                success: function (res) {
                    
                    $("#fkStaffID").empty();
                    $("#fkStaffID").append('<option>Select Staff...</option>');
                    
                    /// loop javascript 
                    $.each(res , function (key, value) {
                        console.log(value);
                        $("#fkStaffID").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
                    });
        } else {
            $("#fkStaffID").empty();
    
        }
        });  
    </script>
@endsection <!--END  CONTENT SECTION-->
