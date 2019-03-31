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
            <a href="{{ route('staff.create') }}" class="btn btn-success">Add New Staff</a>
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
                                    <th> الاسم </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Department </th>
                                    <th> Job </th>
                                    <th> Reset Password </th>
                                    <th> Working Time </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $arrAdmins as $objadmin )
                                    <tr>
                                         <td> {{ $objadmin->fldNameAR }} </td>
                                        <td> {{ $objadmin->name }} </td>
                                        <td> {{ $objadmin->email }} </td>
                                         <td> {{ @$objadmin->Job->Department->fldNameAR}} </td>
                                          <td> {{ @$objadmin->Job->fldNameAR}} </td>
                                        <td>
                                            <span data-class="pencil-square-o"><a href="{{ route('admin.passwordform', $objadmin->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            </span>
                                        </td>
                                
                                        <td>
                                            
                                            <a href="{{ route('staff.workingtime', $objadmin->id) }}" class="btn btn-outline btn-circle btn-sm red center">
                                                    <i class="fa fa-calendar"></i>   
                                            </a>
                                        </td>

                                        <td>
                                            <span data-class="pencil-square-o"><a href="{{ route('staff.edit', $objadmin->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                            </span>
                                        </td>

                                        <td>
                                            {!!Form::open(["url"=>"admin/staff/$objadmin->id","method"=>"DELETE","onclick"=>"return confirm('Are U Sure To Delete !!')"])!!}                
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
            