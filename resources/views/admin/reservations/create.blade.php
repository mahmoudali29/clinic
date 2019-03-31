@extends('admin.layouts.app')
@section('strTitle', $strTitle)
<!-- BEGIN PAGE BAR -->
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('admin/dashboard') }}">{{trans('general.Home')}}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{{ url('admin/reservations') }}">Reservations</a>
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

                    {!!Form::open(["url"=>"admin/reservations","method"=>"POST","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                            <div class="form-body">
                                
                                   
                                   

                                <div class="col-md-9">
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Phone
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" name="fldPhone" id="fldPhone" data-required="1" required="required" class="form-control" value="{{ old('fldPhone') }}"  /> 
                                                <input type="hidden" name="fkPatientID" id="fkPatientID"  class="form-control" value="">
                                                <span  class="help-block help-block-error" id="name_show"></span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Doctors
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <select  name="fkDoctorID" id="fkDoctorID" data-required="1" required="required" class="form-control" >
                                                <option value="">Select Doctor</option>
                                                @foreach ($arrStaff as $objStaff)
                                                <option value="{{ $objStaff->id}}">{{ $objStaff->name}}</option>
                                                @endforeach   
                                            </select> 
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="date" name="fldDate"  id="fldDate" data-required="1" required="required" class="form-control" value="{{ old('fldDate') }}"  /> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label col-md-3">Appointment 
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-6" id="schedul">
                                                 
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Notes 
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-6">
                                                <textarea  name="fldNotes"  class="form-control">{{ old('fldNotes') }}</textarea> 
                                            </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <span id="select-error" class="help-block help-block-error"></span>
                                </div>
                                   


                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                       
                                      <a href="{{ route('reservations.index') }}" class="btn grey-salsa btn-outline">Back</a>
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
        $('#fldPhone').change(function () {
       var fldPhone = $(this).val();
      if (fldPhone) {
        $.ajax({ 
                'url': "{{url('admin/reservations/get_patient_name')}}"+"/"+fldPhone.trim(),
                'type': 'GET',
                'success': function(data) { 
                    var container = $("#name_show");
                    if(data==0){
                        container.html("Didn't match. Please Enter Your Valid Phone");
                    }else{ 
                        container.html(data.objPatient.fldNameEN);
                        $('#fkPatientID').val(data.objPatient.pkPatientID);
                        $('button[type=submit]').prop('disabled', false);
                    }
                }
            });
           } else {
            $("#name_show").empty();
     
           }
         });  
         </script>


        <script type="text/javascript">

$('#fkDoctorID').change(function () {
        var fkDoctorID = $(this).val();
        if (fkDoctorID!='') {
            $.ajax({ 
                'url': "{{url('admin/reservations/get_doctorworktime')}}"+"/"+fkDoctorID,
                'type': 'GET',
                'success': function(data) {
                    var container = $("#select-error"); 
                    container.html(data);
                }
                });
            };
            loadSchedul();
        });  
        function loadSchedul(){
            
        var fkDoctorID = $('#fkDoctorID').val();
        var fldDate     = $('#fldDate').val();
      // alert(fkDoctorID+"ddddd"+fldDate);
        if (fkDoctorID!='') {
            $.ajax({ 
                'url': "{{url('admin/reservations/get_schedul')}}"+"/"+fkDoctorID+'/'+fldDate,
                'type': 'GET', 
                'success': function(data) {
                    var container = $("#schedul");
                    container.html(data);
                }
                });
            };
        }

        $('#fldDate').change(function () {
            loadSchedul();
        });      
// sequence uncion
    function myBooking(data){
        var id = $("#t_" + data).text();
       document.getElementById("msg_c").innerHTML = "<div style=' color:green; font-size:20px;'>You Selected " +id +"</div>";
       document.getElementById('serial_no').value = id;        
    }     

</script>


    

@endsection <!--END  CONTENT SECTION-->
