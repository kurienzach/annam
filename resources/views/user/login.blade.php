@extends('user.base')
@section('content')
<div class="inner-page-wrap">
    <div class="inner-hero bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 signup-view text-center">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                        </div>
                    @endif
                    <div class="col-md-6">
                        <div class="signup-message">
                            <div class="col-md-12">
                                <h3 class="text-left login-page">Create an account</h3>
                                <form action="{{ url('/auth/register') }}" method="post" id="request-quote-form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <fieldset class="row">
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="name" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="mobile" name="mobile" id="mobile" placeholder="Mobile" class="form-control" value="{{ old('mobile') }}">
                                        </div>
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="email" name="email" id="email" placeholder="Email Id" class="form-control" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                        </div>
                                    </fieldset>
                                    <footer>
                                        <input type="submit" name="submit" value="Create" class="btn btn-dark btn-fill pull-right" style="border:none;">

                                    </footer>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="signup-message">
                            <div class="col-md-12">
                                <h3 class="text-left login-page">Login to your Account</h3>
                                <form action="login" method="post" id="request-quote-form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <fieldset class="row">
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="email" name="email" id="email" placeholder="Email Id" class="form-control" required value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                                        </div>
                                    </fieldset>
                                    <footer>
                                        <input type="submit" name="submit" value="Sign In" class="btn btn-dark btn-fill pull-right" style="border:none;">
                                        <p class="lead text-left"><a href="#">Forgot Your Password?</a>
                                        </p>

                                    </footer>
                                </form>
                                <div class="divider or"></div>
                                <div class="col-md-12 padding-0">
                                    <a href="#" class="btn-facebook btn"><i class="fa fa-facebook"></i> &nbsp;&nbsp;&nbsp;Facebook Login</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 text-center">
                       <p class="lead margin-top-30">By signing up, you agree to the <a href="#" class="login">Privacy Policy & Terms of Service.</a></p>
              </div>
                    </div>

                </div>
            </div>
            <!-- //row -->
        </div>
        <!-- //container -->
    </div>
</div>
@stop

@section('scripts')
@parent
    
@stop
