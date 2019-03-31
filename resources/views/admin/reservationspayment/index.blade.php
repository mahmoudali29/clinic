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
                <span>{{ $strTitle }}</span>
            </li>
             
        </ul>
        
    </div>
    <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> 
        <a href="{{ route('reservationspayment.create') }}" class="btn btn-success">Add New Reservation Payment </a>
    
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        @if ($flash= session('message') )
            <div id="flashmsg" class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif  

        <div class="row">
                <div class="col-md-12">
                     
                    <!-- Begin: life time stats -->
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject font-dark sbold uppercase">{{ $strTitle }}</span>
                            </div>
                            <div class="tools"></div>
                            
                        </div>

                        
                        <div class="portlet-body">
                            <div class="table-container">
                                 
                                <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                                    <thead>
                                        <tr role="row" class="heading">
                                            <th> Record ID </th>
                                            <th> Reservation Code </th>
                                            <th> Date </th>
                                            <th> Appointment Time </th>
                                            <th> Patient Name </th>
                                            <th> Patient Phone </th>
                                            <th> Doctor Name </th>
                                            <th> Status </th>
                                            <th> Actions </th>
                                    </thead>
                                    <tbody> </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End: life time stats -->
                </div>
            </div>
    </div>
    <!-- END CONTENT BODY -->
    </div>

    <script>
         var DatatablesDataSourceAjaxServer={init:function(){
             $("#datatable_ajax").DataTable({
                 responsive:!0,
                 searchDelay:300,
                 processing:!0,
                 serverSide:!0,
    ajax:"{{url('admin/reservationspayment/getall')}}",
    columns:[
        {data:"RecordID"},
        {data:"fldAppointmentID"},
        {data:"fldDate"},
        {data:"fldAppointmentTime"},
        {data:"fldPatientName"},
        {data:"fldPatientPhone"},
        {data:"fldDoctorName"},
        {data:"Status"},
        {data:"Actions"}
        ],
         
        })
        }};
    jQuery(document).ready(function(){
        DatatablesDataSourceAjaxServer.init()
    });
    </script>
@endsection <!--END  CONTENT SECTION-->
            