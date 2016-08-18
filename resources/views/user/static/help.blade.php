@extends('user.base')

@section('content')
        <div class="inner-page-wrap">
          <div class="inner-hero bg-image overlay" data-image-src="{{ asset('images/slide-bg-7.jpg') }}" data-stellar-background-ratio="0.8" style="background: url(http://pamukovic.com/demo/madison/creative/images/slide-bg-7.jpg) 0% 0% / cover no-repeat;">
            <div class="container">
              <div class="row">
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2 text-center panel-about">
                    <h1 class="font-serif wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">Our Service Areas</h1>
    <div class="row text-center service-area">
                                <div class="col-xs-12 col-sm-2">
                                    <p>Koramangala</p>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <p>HSR</p>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <p>Jayanagar</p>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <p>BTM</p>
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    <p>Electronicity</p>
                                </div>
                            </div>
                            <p>Enter your location to see your delivery options</p>
                      <form method="post" action="#" name="contactform" id="contactform" class="row">
                  <fieldset>
                    <div class="search"> <span><i class="icon-map-pin icon-md map-location"></i></span>
                      <input class="form-control input-lg input-sz" name="name" type="text" id="name" size="5" value="" placeholder="enter your location">
                      <button type="submit" class="btn btn-dark btn-fill btn-lg" id="submit" value="Submit">
                      <a class="view-menu" href="menu.html">view menu</a>
                      </button>
                    </div>
                  </fieldset>
                </form>

                    </div>
                </div>
              </div>
              <!-- //row --> 
            </div>
            <!-- //container --> 
          </div>
          <!-- //inner hero -->
@stop
