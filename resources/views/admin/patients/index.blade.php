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
        <h3 class="page-title"> 
            <a href="{{ route('patients.create') }}" class="btn btn-success">Add New Patient</a>
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

                <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                                    <th> اسم المريض </th>
                                    {{-- <th> Patient Name  </th> --}}
                                    <th> العنوان </th>
                                    {{-- <th> Address </th> --}}
                                    <th> Phone 1 </th>
                                    {{-- <th> Phone 2 </th> --}}
                                    {{-- <th> Date Of Birth </th> --}}
                                    <th> Email </th>
                                    <th> Gender </th>
                                    {{-- <th> Personal Image </th>
                                    <th> Country Name</th>
                                    <th> Area Name </th>
                                    <th> City Name </th>
                                    <th> Branch Name</th> --}}
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach( $arrPatients as $objPatient )
                                <tr>
                                  <td> {{ $objPatient->fldNameAR }} </td>
                                  {{-- <td> {{ $objPatient->fldNameEN }} </td> --}}
                                  <td> {{ $objPatient->fldAddressAR }} </td>
                                  {{-- <td> {{ $objPatient->fldAddressEN }} </td> --}}
                                  <td> {{ $objPatient->fldPhone1 }} </td>
                                  {{-- <td> {{ $objPatient->fldPhone2 }} </td> --}}
                                  {{-- <td>{{ $objPatient->fldDateOfBirth  }}</td> --}}
                                  <td> {{ $objPatient->fldEmail }} </td>
                                  {{-- <td><img class="img" src="{{url('storage/app')}}/{{ $objPatient->fldPhoto }}"  height="30"></td> --}}
                                  <td> {{ $objPatient->fldGender }} </td>
                                  {{-- <td> {{ $objPatient->Country->fldNameEN }}</td> --}}
                                  {{-- <td> {{ $objPatient->Area->fldNameEN }}</td> --}}
                                  {{-- <td> {{ $objPatient->City->fldNameEN }}</td> --}}
                                  {{-- <td> {{ $objPatient->Branch->fldNameEN }}</td> --}}
                                  <td> 
                                    <span data-class="pencil-square-o"><a href="{{ route('patients.edit', $objPatient->pkPatientID) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                </span>
                                  </td>
                                  <td>
                                    {!!Form::open(["url"=>"admin/patients/$objPatient->pkPatientID","method"=>"DELETE","onclick"=>"return confirm('Are U Sure To Delete !!')"])!!}                
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        {!! Form::close() !!}
                               </td>

                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection <!--END  CONTENT SECTION-->
