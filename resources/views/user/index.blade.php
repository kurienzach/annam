@extends('user.base')

@section('content')
    <div class="hero bg-image overlay" data-stellar-background-ratio="0.2" data-image-src="images/annam.jpg">
        <div class="container valign">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 text-center panel">
                    <h3 class="font-serif wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">Homely food at<br> your door step</h3>
                    <p class="lead">annam homely food from the hands of mothers<br> who have years of great experience in the kitchens delivers your home with a little bit of love added to it.</p>
                    <form method="post" action="#" name="contactform" id="contactform" class="row">
                        <fieldset>
                            <div class="search">
                                <span><i class="fa fa-map-marker map-location"></i></span>
                                <input class="form-control input-lg input-sz" name="name" type="text" id="name" size="5" value="" placeholder="enter your location">
                                <button type="submit" class="btn btn-dark btn-fill btn-lg" id="submit" value="Submit">view menu</button>
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
                    <h1 class="font-cursive hr-after-center">Why you should choose<br> annam homely food</h1>
                </div>
            </div>
            <!-- .row -->
            <div class="row margin-top-30">
                <div class="col-xs-12 col-sm-4">
                    <h4 class="iconBox-title text-center">Cooked by moms</h4>
                    <p class="text-center">Our menus change everyday, with plenty of entrées, salads, sides, soup, desserts, and kids’ meals to choose from.</p>
                </div>
                <!-- // icon box -->
                <div class="col-xs-12 col-sm-4">
                    <h4 class="iconBox-title text-center">Our daily menus</h4>
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
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="10">
                            <div class="item-content">
                                <div class="col-md-5 post-entry pull-right">
                                    <h1 class="font-cursive hr-after">Why we differ from others</h1>
                                    <p>Meals arrive chilled so everything stays fresh (no soggy lettuce or overcooked chicken on our watch). Simple directions tell you the final step, which is usually a few minutes in your oven or microwave, but may be as quick as drizzling on the dressing. Dinner is ready when you want to eat.</p></div>
                                <!-- end:Post Entry -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 text-center panel">
            <h3 class="font-serif wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">Homely food at<br> your door step</h3>
            <p class="lead">annam homely food from the hands of mothers<br> who have years of great experience in the kitchens delivers<br> your home with a little bit of love added to it.</p>
            <form method="post" action="#" name="contactform" id="contactform" class="row">
                <fieldset>
                    <div class="search">
                        <span><i class="fa fa-map-marker map-location"></i></span>
                        <input class="form-control input-lg input-sz" name="name" type="text" id="name" size="5" value="" placeholder="enter your location">
                        <button type="submit" class="btn btn-dark btn-fill btn-lg" id="submit" value="Submit">view menu</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@stop