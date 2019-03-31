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
                <a href="{{ url('admin/reservationspayment') }}">Reservations Payment</a>
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

                    {!!Form::open(["url"=>"admin/reservationspayment/savepayment/$objReservation->pkReservationID","method"=>"POST","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                            <div class="form-body">
                                @if($objReservationPayment)
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>Old Reservation Payment </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body flip-scroll">
                                        <table class="table table-bordered table-striped table-condensed flip-content">
                                            <thead class="flip-content">
                                                <tr>
                                                    <th width="20%"> Reservation Amount  </th>
                                                    <th> Paid Amount </th>
                                                    <th class="numeric"> Remainning Amount </th>
                                                    <th class="numeric"> Payment Method </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> {{$objReservationPayment->fldAmount}} </td>
                                                    <td> {{$objReservationPayment->fldPaidAmount}}</td>
                                                    <td> {{$objReservationPayment->fldRemainingAmount}} </td>
                                                    <td> {{$objReservationPayment->fldPaymentType}} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Reservation Code
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                            <input type="text"  name="fkReservationID" id="fkReservationID" data-required="1" required="required" class="form-control"  value="{{$objReservation->fldAppointmentID}}" readonly/>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Reservation Amount
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="fldAmount" id="fldAmount" data-required="1" required="required" class="form-control" value="{{@$objReservationPayment->fldAmount}}"  /> 
                                            </div>
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Payment Method
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <select  name="fldPaymentType" id="fldPaymentType" data-required="1" required="required" class="form-control select2" >
                                                    <option value="Cash">Cash</option>
                                                    <option value="Visa">Visa</option>
                                                </select> 
                                            </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Paid Amount
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="number" min="0" max="{{@$objReservationPayment->fldRemainingAmount}}"  name="fldPaidAmount"  id="fldPaidAmount" data-required="1" required="required" class="form-control" value="{{ old('fldPaidAmount') }}"  /> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Remainning Amount
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" min="0" name="fldRemainingAmount"  id="fldRemainingAmount" data-required="1" required="required" class="form-control" value="{{ old('fldRemainingAmount') }}"  readonly /> 
                                            </div>
                                        </div>

                                     
                                    <div class="form-group">
                                            <label class="control-label col-md-3">Notes 
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea  name="fldNotes"  class="form-control">{{ old('fldNotes') }}</textarea> 
                                            </div>
                                    </div>

                                
                                
                                   


                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <input type="submit" value="Submit" class="btn green">
                                       
                                      <a href="{{ route('reservationspayment.index') }}" class="btn grey-salsa btn-outline">Back</a>
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
        $('#fldPaidAmount').change(function () {
         var fldPaidAmount = $(this).val();
         var fldAmount=$("#fldAmount").val();
         var fldRemainingAmount=fldAmount-fldPaidAmount;
         $("#fldRemainingAmount").val(fldRemainingAmount);
      
         });  
    </script>
    <script type="text/javascript">
        $('#fldAmount').change(function () {
         var fldAmount = $(this).val();
         var fldPaidAmount=$("#fldPaidAmount").val();
         var fldRemainingAmount=fldAmount-fldPaidAmount;
         $("#fldRemainingAmount").val(fldRemainingAmount);
      
         });  
    </script>

    

@endsection <!--END  CONTENT SECTION-->
