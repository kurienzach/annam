@extends('user.base')

@section('content')
<div class="inner-page-wrap">
  <div class="inner-hero bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-offset-0 signup-view text-center">
          <div class="col-md-6">
            <div class="signup-message">
              <div class="col-md-12">
                <h4 class="text-left check-out">Delivery address</h4>
                <form method="post" id="form-order" action="{{ url('/placeorder') }}">
                  @if (count($errors) > 0)
                  <div class="alert alert-warning">
                      <ul>
                          @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" id="order-cart" name="cart" value="{}">
                  <fieldset class="row">
                    <div class="form-group col-md-12 has-icon-right">
                      <input type="name" name="name" id="name" placeholder="Full Name" class="form-control" required value="{{ $user->name }}">
                    </div>
                    <div class="form-group col-md-12 has-icon-right">
                      <input type="mobile" name="mobile" id="mobile" placeholder="Mobile" class="form-control" required value="{{ $user->mobile }}">
                    </div>
                    <div class="form-group col-md-12 has-icon-right">
                      <textarea class="form-control" name="address" cols="40" rows="4" id="address" placeholder="Address" required> {{ $user->address }}</textarea>
                    </div>
                    <div class="form-group col-md-6 has-icon-right">
                      <input type="city" name="city" id="city" placeholder="City" class="form-control" required value="{{ $user->city }}">
                    </div>
                    <div class="form-group col-md-6 has-icon-right">
                      <input type="state" name="state" id="state" placeholder="State" class="form-control" required value="{{ $user->state }}">
                    </div>
                    <div class="form-group col-md-6 has-icon-right">
                      <input type="country" name="country" id="country" placeholder="Country" class="form-control" required value="{{ $user->country }}">
                    </div>
                    <div class="form-group col-md-6 has-icon-right">
                      <input type="postal" name="pincode" id="pincode" placeholder="Postal" class="form-control" required value="{{ $user->pincode }}">
                    </div>
                  </fieldset>
                  <footer>
                    <input class="btn btn-dark btn-fill pull-right" id="top" type="submit" value="Cash on Delivery">
                  </footer>
                </form>
              </div>
            </div>
          </div>
          <div class="height"></div>
          <div class="col-md-6">
            <div class="signup-message">
              <div class="col-md-12">
                <div class="pricing-table">
                  <h4 class="text-left check-out">Order Summary</h4>
                  <div class="price-bill">
                    <div class="divTable">
                      <div class="divTableRow">
                        <div class="divTableCell wdt30"><b>Item Name</b></div>
                        <div class="divTableCell wdt30"><b>Unit Price (Rs)</b></div>
                        <div class="divTableCell wdt10 text-center"><b>Qty</b></div>
                        <div class="divTableCell wdt20"><b>Price (Rs)</b></div>
                      </div>
                    </div>
                    
                    <?php $cart_total = 0.0; ?>
                    @foreach($phpcart as $cartitem)
                    <div class="divTable">
                      <div class="divTableRow">
                        <div class="divTableCell wdt30">{{ $cartitem->name }}</div>
                        <div class="divTableCell wdt30">{{ $cartitem->price }}</div>
                        <div class="divTableCell wdt10 text-center">{{ $cartitem->qty }}</div>
                        <div class="divTableCell wdt20">{{ number_format((float)($cartitem->price * $cartitem->qty), 2, '.', '') }}</div>
                        <?php $cart_total += $cartitem->price * $cartitem->qty; ?>
                      </div>
                    </div>
                    @endforeach
                    
                    <div class="divTable tax">
                      <div class="divTableRow">
                        <div class="divTableCell text-right">Item Total (Rs)</div>
                        <div class="divTableCell wdt25 text-right">{{ number_format((float)$cart_total, 2, '.', '') }}</div>
                      </div>
                      <div class="divTableRow">
                        <div class="divTableCell text-right">All Taxes ({{ $rates->all_taxes}}%)(Rs)</div>
                        <div class="divTableCell wdt25 text-right">{{ number_format($rates->all_taxes * $cart_total / 100, 2, '.', '') }}</div>
                      </div>
                      <div class="divTableRow">
                        <div class="divTableCell text-right">Carry Bag cost (Rs)</div>
                        <div class="divTableCell wdt25 text-right">{{ $rates->carry_bag }}</div>
                      </div>
                    </div>
                    <div class="divTable tax">
                      <div class="divTableRow">
                        <div class="divTableCell text-right">Subtotal (Rs)</div>
                        <div class="divTableCell wdt25 text-right">{{ number_format((float)($cart_total + ($rates->all_taxes * $cart_total / 100) + $rates->carry_bag), 2, '.', '') }}</div>
                      </div>
                      <div class="divTableRow">
                        <div class="divTableCell text-right">Delivery Charge (Rs)</div>
                        <div class="divTableCell wdt25 text-right">{{ $rates->delivery_charge }}</div>
                      </div>
                    </div>
                    <div class="total">Total <span>{{ number_format((float)($cart_total + ($rates->all_taxes * $cart_total / 100) + $rates->carry_bag + $rates->delivery_charge), 2, '.', '') }}</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //row --> 
      </div>
      <!-- //container --> 
    </div>
  </div>
</div>
@stop

@section('scripts')
@parent
    <script type="text/javascript">
        var cart = {!! $cart !!};
        var grouped_cart = {};
        
        $(document).ready(function(){

            $('#form-order').submit(function() {
                //group the cart on date first
                date_grouped_cart = _.groupBy(cart, 'date');

                _.each(date_grouped_cart, function(dishes_on_date, date){
                    grouped_cart[date] = {};
                    // Group by category now
                    cat_grouped_cart = _.groupBy(dishes_on_date, 'category');

                    _.each(cat_grouped_cart, function(dishes, category) {
                        grouped_cart[date][category] = dishes;
                    });
                });

                $(this).find('#order-cart').val(JSON.stringify(grouped_cart));                
            });

        });
    </script>
@stop

