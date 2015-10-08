@extends('user.base')

@section('content')
    <div class="inner-page-wrap">
          <div class="inner-hero bg-image overlay" data-image-src="{{ asset('images/slide-bg-7.jpg') }}" data-stellar-background-ratio="0.8" style="background: url(http://pamukovic.com/demo/madison/creative/images/slide-bg-7.jpg) 0% 0% / cover no-repeat;">
            <div class="container">
              <div class="row">
                <div class="row">
                  <div class="col-sm-7 col-sm-offset-2 text-center panel-about">
                    <h1 class="font-serif wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">What is Annam</h1>
                            <p>annam homely food from the hands of mothers
    who have years of great experience in the kitchens delivers your home
    with a little bit of love added to it.</p>
            </div>
                </div>
              </div>
              <!-- //row --> 
            </div>
            <!-- //container --> 
          </div>
          <!-- //inner hero -->
    <div class="container space-md border-bottom" id="about">
                        <div class="row">
                            <div class="col-sm-6">
                  <div class="panel-group" id="accordion">
                                            <div class="tab">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                            What is Annam?
                                                            <span class="fa fa-plus"></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse">
                                                    <div class="panel-body">
                <p class="lead">Annam is an online marketplace for consumers to purchase meals directly from local, professional chefs.</p>                                                
                               <p class="lead">Dinner can be a boring and often dreaded experience. You’re too busy to cook, donʼt have time to shop, and you’re frankly out of ideas about what to make. Inevitably, you end up grabbing whatever is readily available (and often succumb to unhealthy choices), or find yourself eating the same thing at the same place again and again.</p>                 
                                <p class="lead">Annam allows you to order dinner prepared by our talented chefs. They use fresh ingredients for your meals (locally sustainable whenever possible). Each day, multiple chefs create delicious entrees and complement them with thoughtful sides. Meals are delivered directly to your home or office that same day. You save time and get an incredible meal that blows away traditional forms of takeout.</p>                
                                                
                                                
                                                </div>
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            <div class="tab">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                            How does Annam work?
                                                            <span class="fa fa-plus"></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body">
                              <ol class="numbers">
                <li><a class="clr" href="menu.html">Browse menus</a> that our chefs post for each day. There’s a different menu for each day of the week.</li>
                <li>Add items to your cart and checkout when you’re ready.</li>
                <li>You can purchase items across different days and chefs, all in the same order. You can orderthe same day, the next day, or even a few days out of the week. Meals are always made fresh daily.</li>
                <li>Payment is handled via credit card or PayPal. iOS users have the additional option of choosing Apple Pay. Tips for your driver can be added no matter how you pay.</li>
                <li>For delivery, choose a delivery window</a> and our driver will send you a SMS shortly before they arrive. There is a small delivery charge depending on your location.</li>
              </ol>


                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                        </div>
                            </div>
                            <div class="col-sm-6">
                  <div class="panel-group" id="accordion">
                                            <div class="tab">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                            When & Where does Annam deliver?
                                                            <span class="fa fa-plus"></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="panel-body">
    <p class="lead">Each region we service has a range of delivery windows that allow you to order a meal and get it the same day. No minimum orders are required and our drivers will text or call you a few minutes before they arrive. </p><p class="lead">Most of our drivers can also be tracked on your <a class="clr" href="login-registration.html">Account page</a> by clicking on “Track Today’s Delivery”. This way you can determine where your meals are and when you want to eat!</p>
    <p class="lead">Our drivers do their best to meet your desired delivery time. However, unpredictable traffic conditions and demand spikes may occasionally occur. You’ll be contacted if unforeseen circumstances will affect your delivery time.</p>
    <p class="lead">For Deliver Later orders, if you have already placed an order and want to add another menu item to your existing delivery, you can place an additional order for the same time, and your orders will be bundled and delivered once. The delivery charge will not be applied on the second order since it’s still one delivery.</p>
    </div>
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                           
                                            <div class="tab">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
                                                            Who are the Annam chefs?
                                                            <span class="fa fa-plus"></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapsefour" class="panel-collapse collapse">
                                                    <div class="panel-body">
    <p class="lead">Annam’s team of chefs are local, professional chefs who come from a wide variety of backgrounds. Many have experience at well-regarded restaurants, while others have run their own catering businesses or worked as private chefs. All of our meals are prepared in certified commercial kitchens. Our goal is for you to always be 100% satisfied. If for any reason you're not happy with your meal, please do <a class="clr" href="support.html">let us know</a>.</p>                                                </div>
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                        </div>
                            </div>
                        </div>
                        <!-- // row -->
                    </div>
        </div>
@stop
