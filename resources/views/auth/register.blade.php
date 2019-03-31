@extends('layouts.app')
@section('content')

<!-- header end -->
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150" style="background-image: url({{url('')}}/public/img/breadcrumb.jpg);">>
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>@lang('messages.LOGIN')</h3>
            <ul>
                <li><a href="{{url('/')}}">@lang('messages.Home')</a></li>
                <li class="active">@lang('messages.Login')</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Breadcrumb Area End -->
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> @lang('messages.Login') </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4>@lang('messages.REGISTER') </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                {{ csrf_field() }}
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif    

                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif

                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>@lang('messages.Remember me')</label>
                                                        <a href="#">@lang('messages.Forgot Password?')</a>
                                                    </div>
                                                    <button type="submit"><span>@lang('messages.Login')</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                            {{ csrf_field() }}
                                                <input type="text" name="name" placeholder="@lang('messages.Username')" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                                <input placeholder="@lang('messages.Email')" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                                
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif    

                                                <input type="password" placeholder="@lang('messages.Password')" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif

                                                <input type="password" placeholder="@lang('messages.Confirm Password')" class="form-control" name="password_confirmation" required>
                                                
                                                <div class="button-box">
                                                    <button type="submit"><span>@lang('messages.Register')</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer style Start -->
@endsection
