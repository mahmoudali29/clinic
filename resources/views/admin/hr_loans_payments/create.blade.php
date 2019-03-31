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
                    {{-- @if($objLoan->fldStatus == $objLoan::UNPAID ) --}}
                    {!!Form::open(["url"=>"admin/hr_loans_payments/create/$objLoan->pkLoanID","method"=>"POST","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                            <div class="form-body">
                                <div class="form-group">
                                        <label class="control-label col-md-3">Total Loan
                                            <span class="required">  </span>
                                        </label>
                                        <div class="col-md-4">
                                                <input type="number" min="0" max="{{$objLoan->fldAmount}}" name="{{$objLoan->fldAmount}}" data-required="1" readonly required class="form-control" value="{{ $objLoan->fldAmount }}"  />
                                        </div>
                                </div>        

                                <div class="form-group">
                                        <label class="control-label col-md-3">Total Payment
                                            <span class="required"> </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" min="0" max="{{$objLoan->fldAmount}}" data-required="1" readonly required class="form-control" value="{{ $TotalPayment }}"  />
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-md-3">Remain Amount
                                            <span class="required"> </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" min="0" max="{{$objLoan->fldAmount}}" data-required="1" readonly required class="form-control" value="{{ $RemainAmount }}"  />
                                        </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label class="control-label col-md-3">Amount To Pay
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" min="1" max="{{$objLoan->fldAmount}}" name="fldAmount" data-required="1" required="required" class="form-control" value="{{ old('fldAmount') }}"  /> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Paying Date 
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="fldDate" data-required="1" required="required" class="form-control" value="{{ old('fldDate') }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                    </div>
                                </div>
                            </div>
                    {!! Form::close() !!}
                    {{-- @endif --}}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
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
                                <th> Department </th>
                                <th> Job </th>
                                <th> Staff Name </th>
                                <th> Amonut </th>
                                <th> Amonut Pay</th>
                                <th> Date </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $arrPaymentsLoans as $objPaymentLoan )
                                <tr>
                                    <td> {{ $objPaymentLoan->HrLoan->Admin->Job->Department->fldNameAR }} </td>
                                    <td> {{ $objPaymentLoan->HrLoan->Admin->Job->fldNameAR }} </td>
                                    <td> {{ $objPaymentLoan->HrLoan->Admin->name }} </td>
                                    <td> {{ $objPaymentLoan->HrLoan->fldAmount }} </td>
                                    <td> {{ $objPaymentLoan->fldAmount }} </td>
                                    <td> {{ $objPaymentLoan->fldDate }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection <!--END  CONTENT SECTION-->
