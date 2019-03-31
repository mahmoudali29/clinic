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
                    {!!Form::open(["url"=>"admin/patients/$objPatient->pkPatientID","method"=>"PATCH","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}

                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Country
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-4">
                                    <select class="form-control" name="fkCountryID" id='fkCountryID' required  data-required="1">
                                            <option value="">Select Country...</option>
                                      @foreach( $arrCountries as $objCountry )
                                        <option {{ $objPatient->fkCountryID ==  $objCountry->pkCountryID   ? 'selected' : ''  }} value="{{ $objCountry->pkCountryID }}">{{ $objCountry->fldNameEN }} </option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">Area
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="fkAreaID" id='fkAreaID' required="required" data-required="1">
                                                <option value="">Select Area....</option>
                                            @foreach( $arrAreas as $objArea )
                                                <option {{ $objPatient->fkAreaID ==  $objArea->pkAreaID   ? 'selected' : ''  }} value="{{ $objArea->pkAreaID }}">{{ $objArea->fldNameEN }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">City
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="fkCityID" id='fkCityID' required="required" data-required="1">
                                                <option value="">Select City....</option>
                                            @foreach( $arrCities as $objCity )
                                                <option {{ $objPatient->fkCityID ==  $objCity->pkCityID   ? 'selected' : ''  }} value="{{ $objCity->pkCityID }}">{{ $objCity->fldNameEN }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">Branch
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="fkBranchID" id='fkBranchID' required="required" data-required="1">
                                                <option value="">Select Branch....</option>
                                            @foreach( $arrBranches as $objBranch )
                                                <option {{ $objPatient->fkBranchID ==  $objBranch->pkBranchID   ? 'selected' : ''  }} value="{{ $objBranch->pkBranchID }}">{{ $objBranch->fldNameEN }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                        <label class="control-label col-md-3">Patient Name
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="fldNameEN"  required="required" data-required="1" class="form-control" value="{{ $objPatient->fldNameEN }}" />
                                        </div>        
                            </div>
        
                            <div class="form-group">
                                            <label class="control-label col-md-3">اسم المريض
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="fldNameAR"  required="required" data-required="1" class="form-control" value="{{ $objPatient->fldNameAR }}" />
                                            </div>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-md-3">Address
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="fldAddressEN"  required="required" data-required="1" class="form-control" value="{{ $objPatient->fldAddressEN }}" />
                                    </div>
                            </div>
                                
                            <div class="form-group">
                                    <label class="control-label col-md-3">العنوان
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="fldAddressAR"  required="required" data-required="1" class="form-control" value="{{ $objPatient->fldAddressAR }}" />
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">Phone 1 
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="fldPhone1" data-required="1" required="required" class="form-control" value="{{ $objPatient->fldPhone1 }}"  />
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">Phone 2  
                                        <span class="required">   </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="fldPhone2" class="form-control" value="{{ $objPatient->fldPhone2 }}"  />
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">Gender  
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <select name="fldGender" id="fldGender" class="form-control" required data-required="1" >
                                            {{-- <option value="">Select Gender</option> --}}
                                            <option value="{{$objPatient::GENDER_MALE}}" {{$objPatient->fldGender == $objPatient::GENDER_MALE ? 'selected' : ''}} >
                                                Male
                                            </option>
                                            
                                            <option value="{{$objPatient::GENDER_FEMALE}}" {{$objPatient->fldGender == $objPatient::GENDER_FEMALE ? 'selected' : ''}}  >
                                                Female
                                            </option>

                                        </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">Date Of Birth  
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" required data-required="1" name="fldDateOfBirth" class="form-control" value="{{ $objPatient->fldDateOfBirth }}" />
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">
                                        <span class="required">   </span>Email  
                                    </label>
                                    <div class="col-md-4">
                                        <input type="email" name="fldEmail" class="form-control" value="{{ $objPatient->fldEmail }}"  />
                                    </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label col-md-3">
                                        <span class="required">   </span>Personal Image  
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" name="fldPhoto" class="form-control" value="{{ $objPatient->fldPhoto }}"  />
                                        <img class="img" src="{{url('storage/app')}}/{{ $objPatient->fldPhoto }}" height="100" width="100">
                                    </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                         <input type="submit" value="Submit" class="btn green">
                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <a href="{{ route('patients.index') }}" class="btn grey-salsa btn-outline">Back</a>
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
        $(document).change(function() {
          const genderOldValue = '{{ old("fldGender") }}';
          
          if(genderOldValue !== '') {
            $('#fldGender').val(genderOldValue);
          }
        });
      </script>

    <script type="text/javascript">
        $('#fkCountryID').change(function () {
       var fkCountryID = $(this).val();
      if (fkCountryID) {
       $.ajax({
        type: "GET",
        url: "{{url('admin/areas/getareas')}}"+"/"+fkCountryID,
        success: function (res) {
            
            $("#fkAreaID").empty();
            $("#fkCityID").empty();
            $("#fkBranchID").empty();
            $("#fkAreaID").append('<option>Select Area...</option>');
            $("#fkCityID").append('<option>Select City...</option>');
            $("#fkBranchID").append('<option>Select Branch...</option>');
            
            /// loop javascript 
             
            $.each(res , function (key, value) {
                console.log(value);
                $("#fkAreaID").append('<option value="' + value.pkAreaID + '">' + value.fldNameEN + '</option>');
            });
        }
            });
           } else {
            $("#fkAreaID").empty();
     
           }
         });  
    </script>

    <script type="text/javascript">
        $('#fkAreaID').change(function () {
        var fkAreaID = $(this).val();
        if (fkAreaID) {
        $.ajax({
        type: "GET",
        url: "{{url('admin/cities/getcities')}}"+"/"+fkAreaID,
        success: function (res) {
            
            $("#fkCityID").empty();
            $("#fkBranchID").empty();
            $("#fkCityID").append('<option>Select City...</option>');
            $("#fkBranchID").append('<option>Select Branch...</option>');
            /// loop javascript 
                
            $.each(res , function (key, value) {
                console.log(value);
                $("#fkCityID").append('<option value="' + value.pkCityID + '">' + value.fldNameEN + '</option>');
            });
        }
            });
            } else {
            $("#fkCityID").empty();
        
            }
            });  
    </script>

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
                        $("#fkBranchID").append('<option value="' + value.pkBranchID + '">' + value.fldNameEN + '</option>');
                    });
                }
                    });
                } else {
                    $("#fkBranchID").empty();
            
                }
        });  
    </script>
@endsection <!--END  CONTENT SECTION-->
