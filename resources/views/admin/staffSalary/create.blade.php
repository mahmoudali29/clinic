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

                    {!!Form::open(["url"=>"admin/departments","method"=>"POST","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">From
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="fldStart_Date" id="fldStart_Date"  data-required="1" required="required" class="form-control""  /> 
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="control-label col-md-3">To
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="fldEnd_Date" id="fldEnd_Date" data-required="1" required="required" class="form-control""  /> 
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label class="control-label col-md-3">Department
                                        <span class="required"> * </span>
                                    </label>
                                <div class="col-md-4">
                                    <select class="form-control" data-required="1" name="fkDepartmentID" id="pkDepartmentID" required="required" >
                                        <option value="">Select Department...</option>
                                    @foreach( $arrDepartments as $objDepartment )
                                        <option value="{{ $objDepartment->pkDepartmentID }}">{{ $objDepartment->fldNameAR }} </option>
                                    @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Job
                                <span class="required"> * </span>
                            </label>
                          <div class="col-md-4">
                               <select class="form-control" data-required="1" name="fkJobID" id="job_id" required="required" >
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
                            <label class="control-label col-md-3">Sallar
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="fkSallarID" id="fkSallarID" readonly data-required="1" required="required" class="form-control""  /> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Dedication
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="fldDedication" id="Dedication" readonly data-required="1" required="required" class="form-control""  /> 
                            </div>
                        </div>

                            
 

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                       
                                      <a href="{{ route('staffSalary.index') }}" class="btn grey-salsa btn-outline">Back</a>
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


        <script type="text/javascript">
            $('#pkDepartmentID').change(function () {
                var pkDepartmentID = $(this).val();
                if (pkDepartmentID) {
                    $.ajax({
                        type: "GET",
                        url: "{{url('admin/jobs/getjobs')}}"+"/"+pkDepartmentID,
                        success: function (res) {
                            
                            $("#job_id").empty();
                           
                            $("#job_id").append('<option>Select Job...</option>');
                            
                            /// loop javascript 
                             
                            $.each(res , function (key, value) {
                                //console.log(value);
                                $("#job_id").append('<option value="' + value.pkJobID + '">' + value.fldNameAR + '</option>');
                            });
                        }
                    });
                } else {
                    $("#job_id").empty();
                     
                }
            });  
        </script>


<script type="text/javascript">
    $('#job_id').change(function () {
  var job_id = $(this).val();
    if (job_id) {
      $.ajax({
            type: "GET",
            url: "{{url('admin/staff/getstaffs')}}"+"/"+job_id,
            success: function (res) {
                
                $("#fkStaffID").empty();
                $("#fkStaffID").append('<option>Select Staff...</option>');
                
                /// loop javascript 
                $.each(res , function (key, value) {
                    //console.log(value);
                    $("#fkStaffID").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
                });
    } else {
        $("#fkStaffID").empty();

    }
    });  
</script>

<script type="text/javascript">
    $('#fkStaffID').change(function () {

        /// get value from start date and alert it 
        var fldStart_Date = $("#fldStart_Date").val();
        if(fldStart_Date==''){
            alert('من فضلك اختر التاريخ ') ;
            return false;
        }

        var fldEnd_Date = $("#fldEnd_Date").val();
        if(fldEnd_Date==''){
            alert('من فضلك اختر التاريخ ') ;
            return false;
        }

         

        var fkStaffID = $(this).val();
        if (fkStaffID) {
            $.ajax({
                type: "GET",
                url: "{{url('admin/salary/getsalaries')}}"+"/"+fkStaffID,
                success: function (res) {
                    $("#fkSallarID").val(res.Salary);  ////input
                }
            });

            $.ajax({
                type: "GET",
                url: "{{url('admin/Dedication/getDedications')}}"+"/"+fkStaffID+"/"+fldStart_Date+"/"+fldEnd_Date,
                success: function (res) {
                    $("#Dedication").val(res);  ////input
                    console.log(res)
                    
                }
            });

        }  
    });  
</script>

    </div>
@endsection <!--END  CONTENT SECTION-->
