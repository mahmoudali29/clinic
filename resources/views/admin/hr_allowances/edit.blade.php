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
    
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
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
                    {!!Form::open(["url"=>"admin/hr_allowances/$objAllowance->pkAllowanceID","method"=>"PATCH","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                            <div class="form-body">
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Department
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <select  class="form-control" name="fkDepartmentID" id="fkDepartmentID" required data-required="1">
                                                    <option value="">Select Department...</option>
                                                    @foreach( $arrDepartments as $objDepartment )
                                                        <option {{ $objAllowance->Admin->fkDepartmentID ==  $objDepartment->pkDepartmentID   ? 'selected' : ''  }} value="{{ $objDepartment->pkDepartmentID }}" > {{ $objDepartment->fldNameAR }} </option>
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
                                                @foreach( $arrJobs as $objJob )
                                                    <option {{ $objAllowance->Admin->fkJobID ==  $objJob->pkJobID   ? 'selected' : ''  }} value="{{ $objJob->pkJobID }}" > {{ $objJob->fldNameAR }} </option>
                                                @endforeach
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
                                                    @foreach( $arrAdmins as $objAdmin )
                                                        <option {{ $objAllowance->fkStaffID ==  $objAdmin->id   ? 'selected' : ''  }} value="{{ $objAdmin->id }}" > {{ $objAdmin->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Allowance
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Allowance" data-required="1" required="required" class="form-control" value="{{ $objAllowance->Allowance }}"  /> 
                                        </div>
                                    </div>

                                    <div  class="form-group">
                                        <label class="control-label col-md-3">Type  
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                                <select name="fldType" id="fldType" class="form-control" required data-required="1" >
                                                        <option {{ $objAllowance->fldType == $objAllowance::TYPE_FIXED ? 'selected' : '' }}  value="{{ $objAllowance::TYPE_FIXED}}">fixed</option>
                                                        <option {{ $objAllowance->fldType == $objAllowance::TYPE_VARIABLE ? 'selected' : '' }}  value="{{ $objAllowance::TYPE_VARIABLE}}">variable</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div id="Start_Date" class="form-group">
                                        <label class="control-label col-md-3">From
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                                <input type="date" name="Start_Date"  class="form-control" value="{{ $objAllowance->Start_Date }}"  /> 
                                        </div>
                                    </div>  
                                    <div id="End_Date" class="form-group">
                                        <label class="control-label col-md-3">To
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                                <input type="date" name="End_Date"  class="form-control" value="{{ $objAllowance->End_Date }}"  /> 
                                        </div>
                                    </div>     

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <a href="{{ route('hr_allowances.index') }}" class="btn grey-salsa btn-outline">Back</a>
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
    {{-- <script type="text/javascript">
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
    </script> --}}

    @if($objAllowance->fldType == $objAllowance::TYPE_FIXED)
        <script type="text/javascript">

            $(document).ready(function() {
                $("#Start_Date").hide();
                $("#End_Date").hide();
            });

        </script>  
    @endif
    
    <script type="text/javascript">
    //    VARIABLE
        $("#fldType").change(function(){
            var fldType = $(this).val();
            if(fldType=='variable'){
                $("#Start_Date").show(200);
                $("#End_Date").show(200);
                        //    FIXED
            }else{
                $("#Start_Date").hide(200);
                $("#End_Date").hide(200);
            }   
             
        });
        
    
    </script>

@endsection <!--END  CONTENT SECTION-->
