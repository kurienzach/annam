@extends('user.base')

@section('head')
@parent
    <link rel="stylesheet" href="css/awesomplete.css" />

@stop

@section('content')
    <div class="hero bg-image overlay" data-stellar-background-ratio="0.2" data-image-src="images/annam.jpg">
        <div class="container valign">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center panel">
                    <h1 class="font-serif wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">Homely food at<br> your door step</h1>
                                <p class="lead">annam homely food from the hands of mothers <span>who have years of great experience in the kitchens delivers your home<br>
              with a little bit of love added to it.</span></p>

                    <form method="post" action="{{ url('menu') }}" name="contactform" class="row">
                        <fieldset>
                            <div class="search">
                                <span><i class="icon-map-pin icon-md map-location"></i></span>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="form-control input-lg input-sz location" name="location" type="text" id="location" size="5" value="" placeholder="enter your location" required autofocus>
                                <button type="submit" class="btn btn-dark btn-fill btn-lg" id="btn-submit" value="Submit">view menu</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- end: HERO -->

    <section class="space-md" id="service">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 text-center">
            <h1 class="font-cursive">Why you should choose <span>annam homely food</span></h1>
          </div>
        </div>
        <!-- .row -->
        <div class="row margin-top-30">
          <div class="col-xs-12 col-sm-4">
            <h4 class="iconBox-title text-center">Cooked by Moms</h4>
            <p class="text-center">Our menus change everyday, with plenty of entrées, salads, sides, soup, desserts, and kids’ meals to choose from.</p>
          </div>
          <!-- // icon box -->
          <div class="col-xs-12 col-sm-4">
            <h4 class="iconBox-title text-center">Our Daily Menus</h4>
            <p class="text-center">Our menus change everyday, with plenty of entrées, salads, sides, soup, desserts, and kids’ meals to choose from.</p>
          </div>
          <!-- // icon box -->
          <div class="col-xs-12 col-sm-4">
            <h4 class="iconBox-title text-center">Delivered to Your Door</h4>
            <p class="text-center">Our menus change everyday, with plenty of entrées, salads, sides, soup, desserts, and kids’ meals to choose from.</p>
          </div>
        </div>
      </div>
    </section>

     <section class="space-lg bg-light" id="2">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 margin-top-30">
            <div class="tab-content differ-others">
              <div role="tabpanel" class="tab-pane fade in active" id="10">
                <div class="item-content">
                  <div class="col-md-6 post-entry pull-right">
                    <h1 class="font-cursive">Why we differ from others</h1>
                    <p>Meals arrive chilled so everything stays fresh (no soggy lettuce or overcooked chicken on our watch). Simple directions tell you the final step, which is usually a few minutes in your oven or microwave, but may be as quick as drizzling on the dressing. Dinner is ready when you want to eat.</p>
                  </div>
                  <!-- end:Post Entry --> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text-center panel">
             <h1 class="font-serif wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">Homely food at<br> your door step</h1>
                                <p class="lead">annam homely food from the hands of mothers <span>who have years of great experience in the kitchens delivers your home<br>
              with a little bit of love added to it.</span></p>
            <form method="post" action="{{ url('menu') }}" name="contactform2" class="row">
                <fieldset>
                    <div class="search">
                        <span><i class="icon-map-pin icon-md map-location"></i></span>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="form-control input-lg input-sz location" name="location" type="text" id="location1" size="5" value="" placeholder="enter your location" required>
                        <button type="submit" class="btn btn-dark btn-fill btn-lg" id="btn-submit1" value="Submit">view menu</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@stop

@section('scripts')
@parent

<script>
    var locations_list = {!! $locations !!};
    var locations = [];
    var locations_array = [];

    _.each(locations_list, function(location){
        temp = {};
        temp['value'] = location['name'];
        locations.push(temp);
        locations_array.push(location['name']);
    });

    $(document).ready(function() {

        $('.location').autocomplete({
            lookup: locations,
            minChars: 2,
            autoSelectFirst: true,
            onSelect: function (suggestion) {
                $(this).closest('form').submit();
            }
        });
    });

    $('form').submit(function() {
        if (!(locations_array.indexOf($(this).find('.location').val()) > -1)) {
            //console.log($(this));
            $(this).siblings('h1').html('SORRY! WE&#39;RE NOT IN THIS AREA.');
            $(this).siblings('p').html('We’ll let you know when we arrive. If you want to try. Please reach@+91 9731880481');
            //alert("Please select a valid location for delivery!!");
            return false;
        }
    });
</script>
@stop
