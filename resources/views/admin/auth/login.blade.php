@extends('admin.layout.auth')

@section('content')
<!--<div class="sign-form">
    <div class="row">
        <div class="col-md-4 offset-md-4 px-3">
            <div class="box b-a-0">
                <div class="p-2 text-xs-center">
                    <h5>@lang('admin.auth.admin_login')</h5>
                </div>
                <form class="form-material mb-1" role="form" method="POST" action="{{ url('/admin/login') }}" >
                {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" name="email" required="true" class="form-control" id="email" placeholder="@lang('admin.email')">
                        @if ($errors->has('email'))
                            <span class="help-block" style="margin-left: 55px;color: red;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" required="true" class="form-control" id="password" placeholder="@lang('admin.password')">
                        @if ($errors->has('password'))
                            <span class="help-block" style="margin-left: 55px;color: red;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="px-2 form-group mb-0">
                        <input type="checkbox" name="remember"> @lang('admin.auth.remember_me')
                    </div>
                    <br>
                    <div class="px-2 form-group mb-0">
                        <button type="submit" class="btn btn-purple btn-block text-uppercase">@lang('admin.auth.sign_in')</button>
                    </div>
                </form>
                <div class="p-2 text-xs-center text-muted">
                    <a class="text-black" href="{{ url('/admin/password/reset') }}"><span class="underline">@lang('admin.auth.forgot_your_password')?</span></a>
                </div>
            </div>
        </div>
    </div>
</div>-->
 <div class="container">
            <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="logo-section text-center">
                        <!-- <link rel="shortcut icon" type="image/png" href="{{ Setting::get('site_icon') }}"> -->
                            <img src="{{Setting::get('site_icon')}}" alt="">
                        </div>
                    </div>
                </div>
                <div id="userform">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li @if (!$errors->has('login_type')) class="active" @endif><a href="#signup" role="tab" data-toggle="tab">Admin</a></li>
                        <li @if ($errors->has('login_type') && $errors->first('login_type') == 'dispatcher')  class="active" @endif><a href="#dispatcher" role="tab" data-toggle="tab">Dispatcher</a></li>
                        <li @if ($errors->has('login_type') && $errors->first('login_type') == 'fleet')  class="active" @endif><a href="#fleet" role="tab" data-toggle="tab">Fleet</a></li>
                         <li @if ($errors->has('login_type') && $errors->first('login_type') == 'account')  class="active" @endif><a href="#account" role="tab" data-toggle="tab">Account</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade @if (!$errors->has('login_type')) active @endif in" id="signup">
                            <h2 class="text-uppercase text-center"> Sign In</h2>
                            <form id="signup" role="form" method="POST" action="{{ url('/admin/login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Super Administrator E-mail<span class="req">*</span> </label>
                                    <input type="email" name="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                                    @if ($errors->has('email'))
                                        <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> Password<span class="req">*</span> </label>
                                    <input type="password" name="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                                    @if ($errors->has('password'))
                                        <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="mrgn-30-top">
                                    <button type="submit" class="btn btn-larger btn-block" /> Log in
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="details">
                                    @if(Setting::get('demo_mode' , 0)==1)
                                        <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                        <h5><strong>User Name : </strong><span>admin@tranxit.com</span></h5>
                                        <h5><strong>Password  : </strong><span>123456</span></h5>
                                        <p>Super Administrator can manage whole system and other user's rights too.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade @if ($errors->has('login_type') && $errors->first('login_type') == 'dispatcher') active @endif in" id="dispatcher">
                            <h2 class="text-uppercase text-center">Sign in</h2>
                            <form id="login" role="form" method="POST" action="{{ url('/dispatcher/login') }}">
                             {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Dispatcher Administrator E-mail<span class="req">*</span> </label>
                                    <input type="email" name="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                                    @if ($errors->has('email'))
                                        <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> Password<span class="req">*</span> </label>
                                    <input type="password" name="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                                    @if ($errors->has('password'))
                                        <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="mrgn-30-top">
                                    <button type="submit" class="btn btn-larger btn-block" /> Log in
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="details">
                                        @if(Setting::get('demo_mode', 0)==1)
                                        <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                        <h5><strong>User Name : </strong><span>demo@dispatcher.com</span></h5>
                                        <h5><strong>Password  : </strong><span>123456</span></h5>
                                        <p>Super Administrator can manage whole system and other user's rights too.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fleet -->
                        <div class="tab-pane fade @if ($errors->has('login_type') && $errors->first('login_type') == 'fleet')  active @endif in" id="fleet">
                            <h2 class="text-uppercase text-center">Sign In</h2>
                            <form id="login" role="form" method="POST" action="{{ url('/fleet/login') }}">
                             {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Fleet Administrator E-mail<span class="req">*</span> </label>
                                        <input type="email" name="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                                        @if ($errors->has('email'))
                                            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label> Password<span class="req">*</span> </label>
                                    <input type="password" name="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                                    @if ($errors->has('password'))
                                        <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="mrgn-30-top">
                                    <button type="submit" class="btn btn-larger btn-block" /> Log in
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="details">
                                    @if(Setting::get('demo_mode',0) ==1)
                                        <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                        <h5><strong>User Name : </strong><span>demo@fleet.com</span></h5>
                                        <h5><strong>Password  : </strong><span>123456</span></h5>
                                        <p>Super Administrator can manage whole system and other user's rights too.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Fleet -->
                        <div class="tab-pane fade @if ($errors->has('login_type') && $errors->first('login_type') == 'account')  active @endif in" id="account">
                            <h2 class="text-uppercase text-center">Sign In</h2>
                            <form id="login" role="form" method="POST" action="{{ url('/account/login') }}">
                             {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Account Administrator E-mail<span class="req">*</span> </label>
                                        <input type="email" name="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off">
                                        @if ($errors->has('email'))
                                            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label> Password<span class="req">*</span> </label>
                                    <input type="password" name="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="off">
                                    @if ($errors->has('password'))
                                        <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="mrgn-30-top">
                                    <button type="submit" class="btn btn-larger btn-block" /> Log in
                                    </button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="details">
                                    @if(Setting::get('demo_mode',0) ==1)
                                     <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                        <h5><strong>User Name : </strong><span>demo@account.com</span></h5>
                                        <h5><strong>Password  : </strong><span>123456</span></h5>
                                        <p>Super Administrator can manage whole system and other user's rights too.</p>
                                    @endif
                                       </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
<script>

</script>
