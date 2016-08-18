@extends('user.base')

@section('content')
    <div class="inner-page-wrap">
      <div class="inner-hero bg-image overlay" data-image-src="{{ asset('images/slide-bg-7.jpg') }}" data-stellar-background-ratio="0.8" style="background: url(http://pamukovic.com/demo/madison/creative/images/slide-bg-7.jpg) 0% 0% / cover no-repeat;">
        <div class="container">
          <div class="row">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 text-center panel-about">
                <h1 class="font-serif wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">Reclaim Dinnertime</h1>
                <p class="lead">We’re on a mission to make the easy answer to "what’s for dinner?" the better one.</p>
              </div>
            </div>
          </div>
          <!-- //row --> 
        </div>
        <!-- //container --> 
      </div>
      <!-- //inner hero -->
      <section class="space-lg" id="1">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 text-center">
            <h1 class="font-cursive hr-after-center">Making Eating Better Easier</h1>
          </div>
        </div>
        <div role="tabpanel" class="container"> 
          <!-- Nav tabs -->
          <ul class="nav round-tabs nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">Our Stories</a> </li>
            <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">Our Purveyors</a> </li>
            <li role="presentation" class=""><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="true">Our Responsibility</a> </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content margin-top-60">
            <div role="tabpanel" class="tab-pane active" id="home">
              <div class="row vertical-align">
                <div class="col-sm-6 animated fadeIn"> <img src="{{ asset('images/early_days.jpg') }}" alt="" class="img-responsive margin-auto"> </div>
                <div class="col-sm-6">
                  <p class="lead">We got our start back in 2010 as a couple of busy new parents desperate for an easier answer to "what’s for dinner?" Because we’ve all been there.</p>
                  <p class="lead">It’s late afternoon, and your schedule is overflowing. Meetings for this, and IMs for that. You’re overcommitted, under caffeinated and inbox zero seems like a cruel joke.</p>
                  <p class="lead">At some point, you’ve gotta figure out what’s for dinner. And when you’re too busy or tired to cook, it’s all too easy to just grab something fast on nights like these. But usually the easy option isn’t the best one for you.</p>
                  <p class="lead">We thought there had to be a better way, and that’s why we started Annam. To make the easy option for putting dinner on the table the better one for you and the people you care about — even if that table was made for coffee or it’s actually your desk.</p>
                </div>
                <!-- // col --> 
              </div>
              <!-- //row --> 
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
              <div class="row vertical-align">
                <div class="col-sm-6 animated fadeIn"> <img src="{{ asset('images/early_days.jpg') }}" alt="" class="img-responsive margin-auto"> </div>
                <div class="col-sm-6">
                  <h4> Responsibly sourced. Expertly prepared. Proudly Served. </h4>
                  <p class="lead">Quality is at heart of everything we do, and it starts with using only the finest, freshest ingredients — local and sustainably sourced as much as possible. It’s better for you, our communities, and frankly, it just tastes better.</p>
                  <p class="lead">We believe transparency is a good thing. You should know who prepares your food, what’s in it, and where it comes from.</p>
                  <p class="lead">We’re committed to radical transparency, and working hard to make it happen. Because you deserve it.</p>
                </div>
                <!-- // col --> 
                
              </div>
              <!-- //row --> 
            </div>
            <!-- // tabpanel -->
            <div role="tabpanel" class="tab-pane" id="messages">
              <div class="col-sm-6">
                <h4>We think it’s good business to do good.</h4>
                <p class="lead">We’re working hard to be sustainable in all ways, and to help those who need a helping hand.</p>
                <h5>Order Dinner, Give a Dinner</h5>
                <p class="lead">For every order on Annam, we provide a meal for someone in need by donating a portion of our proceeds to the SF &amp; Marin Food Bank.</p>
                <h5>Carbon Neutral Delivery</h5>
                <p>We are offsetting the carbon footprint of every delivery by planting trees through The Conservation Fund.</p>
                <h5>Eco-Friendly Everything</h5>
                <p class="lead">From biodegradable trays made of renewable plants to paper and plastic products from recycled materials, we’re greening our footprint in every way.</p>
              </div>
              <!-- // col -->
              <div class="col-sm-6 animated fadeIn"> <img src="{{ asset('images/early_days.jpg') }}" alt="" class="img-responsive margin-auto"> </div>
            </div>
            <!-- // tabpanel --> 
          </div>
        </div>
        <div class="about-info">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
              <h1 class="font-cursive hr-after-center">The Annam Team</h1>
            </div>
          </div>
          <div class="container">
            <div class="row teamMembers">
              <div class="col-sm-3">
                <article>
                  <figure class="image-container"> <img alt="" class="img-responsive" src="{{ asset('images/our-team/team-1.jpg') }}">
                    <figcaption class="clearfix">
                      <ul class="socials list-unstyled">
                        <li> <a href="#"> <i class="fa fa-behance"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube"></i> </a> </li>
                      </ul>
                    </figcaption>
                  </figure>
                  <div class="info">
                    <h3>Dule James</h3>
                    <span>Co Founder</span> </div>
                </article>
              </div>
              <!-- .col 3 -->
              <div class="col-sm-3">
                <article>
                  <figure class="image-container"> <img alt="" class="img-responsive" src="{{ asset('images/our-team/team-2.jpg') }}">
                    <figcaption class="clearfix">
                      <ul class="socials list-unstyled">
                        <li> <a href="#"> <i class="fa fa-behance"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube"></i> </a> </li>
                      </ul>
                    </figcaption>
                  </figure>
                  <div class="info">
                    <h3>Dule James</h3>
                    <span>Co Founder</span> </div>
                </article>
              </div>
              <!-- .col 3 -->
              <div class="col-sm-3">
                <article>
                  <figure class="image-container"> <img alt="" class="img-responsive" src="{{ asset('images/our-team/team-4.jpg') }}">
                    <figcaption class="clearfix">
                      <ul class="socials list-unstyled">
                        <li> <a href="#"> <i class="fa fa-behance"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube"></i> </a> </li>
                      </ul>
                    </figcaption>
                  </figure>
                  <div class="info">
                    <h3>Dule James</h3>
                    <span>Co Founder</span> </div>
                </article>
              </div>
              <!-- .col 3 -->
              <div class="col-sm-3">
                <article>
                  <figure class="image-container"> <img alt="" class="img-responsive" src="{{ asset('images/our-team/team-5.jpg') }}">
                    <figcaption class="clearfix">
                      <ul class="socials list-unstyled">
                        <li> <a href="#"> <i class="fa fa-behance"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-youtube"></i> </a> </li>
                      </ul>
                    </figcaption>
                  </figure>
                  <div class="info">
                    <h3>Dule James</h3>
                    <span>Co Founder</span> </div>
                </article>
              </div>
              <!-- .col 3 --> 
            </div>
            <!-- //.row --> 
          </div>
        </div>
      </section>
    </div>
@stop
