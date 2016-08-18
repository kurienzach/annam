@extends('user.base')
@section('content')
<div class="inner-page-wrap">
    <div class="inner-hero bg-image overlay" data-image-src="images/home-3.jpg" data-stellar-background-ratio="0.8" style="background:url(images/home-3.jpg) cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 signup-view text-center">
                    <div class="col-md-12 text-center">
                        <h1>Your order has been successfully placed. We will contact you to confirm the order</h1>
                        <p class="lead margin-top-30">Your order number is : #123456</p>
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

