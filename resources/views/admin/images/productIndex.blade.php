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
            <a href="{{ route('products.index') }}" class="btn btn-success">Back To Products</a>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        @if ($flash= session('message') )
            <div id="flashmsg" class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif

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

        <h3 class="page-title"> Product Name : {{ $objProduct->StrNameEn }}
            <br/>
            <small>Product Description : {{ $objProduct->TxtDescreptionEn }}</small>
        </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN : USER CARDS -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class=" icon-layers font-green"></i>
                                <span class="caption-subject font-green bold uppercase">{{ $objProduct->StrNameEn }}</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="mt-element-card mt-element-overlay">
                                <div class="row">
                                    
                                    @foreach($arrImages as $objectImage)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="mt-card-item">
                                                <div class="mt-card-avatar mt-overlay-1">
                                                    <img style="height: 100px;" src="{{ asset('storage/app') }}/{{ $objectImage->fldFile }}" />
                                                    <div class="mt-overlay">
                                                         
                                                    </div>
                                                </div>
                                                <div class="mt-card-content">
                                                    {!!Form::open(["url"=>"admin/$objProduct->PkProductID/product-images/$objectImage->pkFileID","method"=>"DELETE","onclick"=>"return confirm('Are U Sure To Delete !!')"])!!}                
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach 
                                </div>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            {!!Form::open(["url"=>"admin/$objProduct->PkProductID/product-images","id"=>"form_sample_3","class"=>"form-horizontal","files"=>"true"])!!}
                                <div class="form-group">
                                    <label for="exampleInputFile" class="col-md-3 control-label">Select Files</label>
                                    <div class="col-md-9">
                                        <input type="file" required name="file[]" multiple id="exampleInputFile">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" name="Submit" id="Submit" class="btn green">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- END CONTENT BODY -->
    </div>
@endsection <!--END  CONTENT SECTION-->
