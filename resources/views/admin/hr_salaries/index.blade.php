@extends('admin.layouts.app')
@section('strTitle', $strTitle)
<!-- BEGIN PAGE BAR -->
@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('admin/dashboard') }}">Home</a>{{-- {{trans('general.Home')}} --}}
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
        <a href="{{ route('hr_salaries.create') }}" class="btn btn-success">Add New Salary</a>
        {{-- {{ trans('finance.Add_New_Item')}} --}}
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
                                    <th> Department </th>
                                    <th> Job </th>
                                    <th> Staff </th>
                                    <th> Salary </th>
                                    <th> Start Date </th>
                                    <th> End Date </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $arrSalaries as $objSalary )
                                    <tr>
                                        <td> {{ $objSalary->Admin->Job->Department->fldNameAR }} </td>
                                        <td> {{ $objSalary->Admin->Job->fldNameAR }} </td>
                                        <td> {{ $objSalary->Admin->name }} </td>
                                        <td> {{ $objSalary->Salary }} </td>
                                        <td> {{ $objSalary->Start_Date }} </td>
                                        <td> {{ $objSalary->End_Date }} </td>
                                        <td><span data-class="pencil-square-o"><a href="{{ route('hr_salaries.edit', $objSalary->pkSalaryID) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                        </span>
                                        
                                        </td>
                                        <td> 
                                        {!!Form::open(["url"=>"admin/hr_salaries/$objSalary->pkSalaryID","method"=>"DELETE","onclick"=>"return confirm('Are U Sure To Delete !!')"])!!}                
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
            