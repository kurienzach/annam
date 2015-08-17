@extends('user.base')
@section('content')
<div class="inner-page-wrap">
    <div class="inner-hero bg-image overlay" data-image-src="images/home-3.jpg" data-stellar-background-ratio="0.8" style="background:url(images/home-3.jpg) cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 signup-view text-center">
                    @if (count($errors) > 0)
                       <div class="alert alert-danger" role="alert">{{ $errors->first('msg') }}</div>
                    @endif
                    <div class="col-md-6">
                        <div class="signup-message">
                            <div class="col-md-12">
                                <h4 class="text-left login-page">Create an account</h4>
                                <form action="#" method="post" id="request-quote-form">
                                    <fieldset class="row">
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="name" name="name" id="name" placeholder="Name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="mobile" name="mobile" id="mobile" placeholder="Mobile" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="email" name="email" id="email" placeholder="Email Id" class="form-control">
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
                                <h4 class="text-left login-page">Sign in</h4>
                                <form action="login" method="post" id="request-quote-form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <fieldset class="row">
                                        <div class="form-group col-md-12 has-icon-right">
                                            <input type="email" name="email" id="email" placeholder="Email Id" class="form-control" required>
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
                        <p class="lead margin-top-30">We care about your privacy, and we never spam. By creating an account, you agree to annam
                            <br>User Agreement and <a href="#" class="login">Privacy Policy.</a> We're proud of them, and you should read them. Sign up for free</p>
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

