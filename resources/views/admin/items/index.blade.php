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
        <a href="{{ route('items.create') }}" class="btn btn-success">{{ trans('finance.Add_New_Item')}} </a>
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
                                    <th> {{ trans('general.title_ar')}} </th>
                                    <th> {{ trans('general.title_en')}} </th>
                                    <th> {{ trans('general.type')}} </th>
                                    <th> {{ trans('general.Edit')}} </th>
                                    <th> {{ trans('general.Delete')}}  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $arrItems as $objItem )
                                    <tr>
                                        <td> {{ $objItem->fldTitleAR }} </td>
                                        <td> {{ $objItem->fldTitleEN }} </td>
                                        <td> {{$objItem->fldType == 'Incomes' ? trans('finance.incomes') : trans('finance.outcomes') }}  </td>
                                        <td>
                                            <span data-class="pencil-square-o"><a href="{{ url('admin/items/') }}/{{ $objItem->pkItemID }}/edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                        </span>
                                        </td>
                                        <td> 
                                        {!!Form::open(["url"=>"admin/items/$objItem->pkItemID","method"=>"DELETE","onclick"=>"return confirm('Are U Sure To Delete !!')"])!!}                
                                                <input type="submit" value="{{ trans('general.Delete')}}" class="btn btn-danger">
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
            