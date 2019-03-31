@extends('admin.layouts.app')
@section('strTitle', $strTitle)
<style>
        .span-color span{
        color: #e02222;
      }
</style>
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
                    {!!Form::open(["url"=>"admin/staffs_insurances/$objStaffInsurance->pkStaffInsuranceID","method"=>"PATCH","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                            <div class="form-body">                                 
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Staff Name
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                    <select  class="form-control" name="fkStaffID" id="fkStaffID" required data-required="1">
                                                    <option value="">Select Staff...</option>
                                                    @foreach( $arrStaffs as $objStaff )
                                                        <option {{ $objStaffInsurance->fkStaffID ==  $objStaff->id   ? 'selected' : ''  }} value="{{ $objStaff->id }}" > {{ $objStaff->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Insurance Date
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select  class="form-control" name="fkInsuranceID" id="fkInsuranceID" required data-required="1">
                                                <option value="">Select Insurance...</option>
                                                @foreach( $arrInsurances as $objInsurance )
                                                    <option {{ $objStaffInsurance->fkInsuranceID ==  $objInsurance->pkInsuranceID   ? 'selected' : ''  }} value="{{ $objInsurance->pkInsuranceID }}" > {{ $objInsurance->Start_Date }} - {{ $objInsurance->End_Date }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>  


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Min Fix Amount
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4 span-color">
                                                <span id="textfixAmount">Rules</span>
                                                <input type="number" id="fldMinFixAmount" name="fldMinFixAmount" min="100" max="400"  data-required="1" class="form-control" required="required" value="{{ $objStaffInsurance->fldMinFixAmount }}"  />
                                                
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Max Var Amount
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4 span-color">
                                                <span id="textvarAmount">Rules</span>
                                                <input type="number" id="fldMaxVarAmount" name="fldMaxVarAmount" min="100" max="400"  data-required="1" class="form-control" required="required" value="{{ $objStaffInsurance->fldMaxVarAmount }}"  />
                                                
                                        </div>
                                    </div>

                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <a href="{{ route('staffs_insurances.index') }}" class="btn grey-salsa btn-outline">Back</a>
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

        
<script>
        $(function () {
            
            $( "#fkInsuranceID" ).change(function() {
                var fkInsuranceID = $(this).val();

                $.ajax({
                    type: "GET",
                    url: "{{url('admin/insurances/getinsurances')}}"+"/"+fkInsuranceID,
                    success: function (res) {
                        $("#fldMinFixAmount").attr({
                            "max" : res.fldBasicMax,        // substitute your own
                            "min" : res.fldBasicMin,          // values (or variables) here
                        });

                        $("#textfixAmount").html('Min Fix Amount is from  '+res.fldBasicMin+' to '+res.fldBasicMax+'  ') ; 

                        $("#fldMaxVarAmount").attr({
                            "max" : res.fldVariableMax,        // substitute your own
                            "min" : res.fldVariableMin,          // values (or variables) here
                        });

                        $("#textvarAmount").html('Min Varaible Amount is from  '+res.fldVariableMin+' to '+res.fldVariableMax+'  ') ;
                    }
                });
                    
             }); 
         });
</script>
    </div>
@endsection <!--END  CONTENT SECTION-->
