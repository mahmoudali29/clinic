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
                    {!!Form::open(["url"=>"admin/staff/$objadmin->id","method"=>"PATCH","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                        <div class="form-body">

                                <div class="form-group">
                                        <label class="control-label col-md-3">Country 
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" data-required="1" name="fkCountryID" id="pkCountryID" required="required" >
                                                <option value="">Select Country...</option>
                                                @foreach( $arrCountries as $objCountry )
                                                     <option {{ $objadmin->Branch->city->Area->Country->pkCountryID ==  $objCountry->pkCountryID   ? 'selected' : ''  }} value="{{ $objCountry->pkCountryID }}">{{ $objCountry->fldNameAR }} </option>
                                                   @endforeach
                                            </select>
                                        </div>
                                </div>
        
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Area 
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" data-required="1" name="fkAreaID" id="fkAreaID" required="required" >
                                                <option value="">Select Area...</option>
                                                @foreach( $arrAreas as $objArea )
                                                <option {{ $objadmin->Branch->city->Area->pkAreaID ==  $objArea->pkAreaID   ? 'selected' : ''  }} value="{{ $objArea->pkAreaID }}">{{ $objArea->fldNameAR }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="form-group">
                                        <label class="control-label col-md-3">City 
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control" data-required="1" name="fkCityID" id="fkCityID" required="required" >
                                                <option value="">Select City...</option>
                                                @foreach( $arrCities as $objCity )
                                                   <option {{ $objadmin->Branch->City->pkCityID ==  $objCity->pkCityID   ? 'selected' : ''  }} value="{{ $objCity->pkCityID }}">{{ $objCity->fldNameAR }} </option>
        
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label col-md-3">Branch
                                                <span class="required"> * </span>
                                            </label>
                                          <div class="col-md-4">
                                               <select class="form-control" data-required="1" name="fkBranchID" id="fkBranchID" required="required" >
                                                <option value="">Select Branch...</option>
                                              @foreach( $arrBranches as $objBranch )
                                              <option {{ $objadmin->fkBranchID ==  $objBranch->pkBranchID   ? 'selected' : ''  }} value="{{ $objBranch->pkBranchID }}">{{ $objBranch->fldNameAR }} </option>
                                               @endforeach
                                             </select>
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
                                                 <option {{ $objadmin->Job->Department->pkDepartmentID ==  $objDepartment->pkDepartmentID   ? 'selected' : ''  }} value="{{ $objDepartment->pkDepartmentID }}">{{ $objDepartment->fldNameAR }} </option>
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
                                        @foreach( $arrjobs as $objectjob )
                                        <option {{ $objadmin->Job->pkJobID ==  $objectjob->pkJobID   ? 'selected' : ''  }} value="{{ $objectjob->pkJobID }}">{{ $objectjob->fldNameAR }} </option>
                                   @endforeach
                                     </select>
                                   </div>
                                </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">اسم الموظف
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="fldNameAR" data-required="1" class="form-control" value="{{ $objadmin->fldNameAR }}"  />
                                </div>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-md-3">Name
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="name" data-required="1" class="form-control" value="{{ $objadmin->name }}" required="required" />
                                    </div>
                                </div>
                                <div class="form-group">
                                
                                        <label class="control-label col-md-3">Phone1
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldPhone1" data-required="1" class="form-control" required="required" value="{{  $objadmin->fldPhone1 }}" />
                                        </div>
                                </div>
    
                                <div class="form-group">
                                    
                                        <label class="control-label col-md-3">Phone2
                                            <span class="required">  </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldPhone2" class="form-control"  value="{{  $objadmin->fldPhone2 }}" />
                                        </div>
                                </div>
                                <div class="form-group">
                                    
                                        <label class="control-label col-md-3">العنوان
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldAddressAR" data-required="1" class="form-control" required="required" value="{{  $objadmin->fldAddressAR }}" />
                                        </div>
                                </div>
                                <div class="form-group">
                                    
                                        <label class="control-label col-md-3">Address
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldAddressEN" required class="form-control" required="required" value="{{ $objadmin->fldAddressEN }}" />
                                        </div>
                                </div>
                                <div class="form-group">
                                    
                                        <label class="control-label col-md-3">درجه علميه 
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldDegree" data-required="1" class="form-control"  value="{{  $objadmin->fldDegree }}" />
                                        </div>
                                </div>
                                <div class="form-group">
                                    
                                        <label class="control-label col-md-3">تاريخ الميلاد
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="fldDateOfBirth" data-required="1" class="form-control" required="required" value="{{ $objadmin->fldDateOfBirth }}" />
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-md-3">Gender  
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                                <select name="fldGender" class="form-control" required data-required="1" >
                                                        <option {{ $objadmin->fldGender == $objadmin::GENDER_MALE ? 'selected' : '' }}  value="{{ $objadmin::GENDER_MALE}}">ذكر</option>
                                                        <option {{ $objadmin->fldGender == $objadmin::GENDER_FEMALE ? 'selected' : '' }}  value="{{ $objadmin::GENDER_FEMALE}}">انثي</option>
                                                </select>
                                            </div>
                                    </div>
    

                            <div class="form-group">
                                <label class="control-label col-md-3">Email
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="email" data-required="1" class="form-control" value="{{ $objadmin->email }}" required="required" />
                                </div>
                            </div>
                           

                            <div class="form-group">
                                <label for="exampleInputFile" class="col-md-3 control-label">update Your Picture</label>
                                <div class="col-md-9">
                                    <input type="file"  name="file"  id="exampleInputFile">
                                    <img width="200px;" height="100px;" class="img" src="{{url('storage/app')}}/{{ @$objImage->fldFile }}">
                                </div> 
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" name="Submit" id="Submit" class="btn green">Save</button>
                                    <a href="{{ route('staff.index') }}" class="btn grey-salsa btn-outline">Back</a>
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
                          {{-- GET JOBS --}}
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
                            console.log(value);
                            $("#job_id").append('<option value="' + value.pkJobID + '">' + value.fldNameAR + '</option>');
                        });
                    }
                });
            } else {
                $("#job_id").empty();
                 
            }
        });  
    </script>
            {{-- GETAreas --}}
            <script type="text/javascript">
                $('#pkCountryID').change(function () {     
                var pkCountryID = $(this).val();
                if (pkCountryID) {  
                $.ajax({
                type: "GET",
                url: "{{url('admin/areas/getareas')}}"+"/"+pkCountryID,
                success: function (res) {
                    
                    $("#fkAreaID").empty();
                    $("#fkCityID").empty();
                    $("#fkBranchID").empty();
                    $("#fkAreaID").append('<option>Select Area...</option>');
                    
                    /// loop javascript 
                        
                    $.each(res , function (key, value) {
                        console.log(value);
                        $("#fkAreaID").append('<option value="' + value.pkAreaID + '">' + value.fldNameAR + '</option>');
                    });
                }
                    });
                    } else {
                    $("#fkAreaID").empty();
                
                    }
                    });  
            </script>
    
                                    {{-- //////////////////GETCityies//////////// --}}
            <script type="text/javascript">
            $('#fkAreaID').change(function () {
            var fkAreaID = $(this).val();
            if (fkAreaID) {
            $.ajax({
            type: "GET",
            url: "{{url('admin/cities/getcities')}}"+"/"+fkAreaID,
            success: function (res) {
                
                $("#fkCityID").empty();
                $("#fkCityID").append('<option>Select City</option>');
                
                /// loop javascript 
                    
                $.each(res , function (key, value) {
                    console.log(value);
                    $("#fkCityID").append('<option value="' + value.pkCityID + '">' + value.fldNameAR + '</option>');
                });
            }
                });
                } else {
                $("#fkCityID").empty();
            
                }
                });  
        </script>
    
    
                            {{-- //////////////////GETBranch//////////// --}}
        <script type="text/javascript">
        $('#fkCityID').change(function () {
        var fkCityID = $(this).val();
        if (fkCityID) {
        $.ajax({
        type: "GET",
        url: "{{url('admin/branches/getbranches')}}"+"/"+fkCityID,
        success: function (res) {
            
            $("#fkBranchID").empty();
            $("#fkBranchID").append('<option>Select Branch...</option>');
            
            /// loop javascript 
                
            $.each(res , function (key, value) {
                console.log(value);
                $("#fkBranchID").append('<option value="' + value.pkBranchID + '">' + value.fldNameAR + '</option>');
            });
        }
            });
            } else {
            $("#fkBranchID").empty();
        
            }
            });  
    </script>     
        <!-- END CONTENT BODY -->
    <!-- END CONTENT BODY -->
    </div>
@endsection <!--END  CONTENT SECTION-->
