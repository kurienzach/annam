@extends('user.base')
@section('content')
<div class="inner-page-wrap">
<div class="inner-hero bg-light">
<div class="container">
<div class="row">
<div class="col-md-12 col-md-offset-0 signup-view text-center">

    <div class="col-md-12 text-center">
        <div class="pricing-table">
            <h3 class="cart"><img src="images/cart.png" class="cart-contain"> Your Cart Contains</h3>
            <div class="price-bill">

               <div class="price-bill">
                    <!-- Div for cart items -->
                    <div class="cart-items"></div>

                    <!-- Div for amount and total -->
                    <div class="divTable tax">
                      <div class="divTableRow">
                        <div class="divTableCell text-right">Item Total (Rs)</div>
                        <div class="divTableCell text-right padding-right cart-total">0.00</div>
                      </div>
                      <div class="divTableRow">
                        <div class="divTableCell text-right">
                          <button type="submit" class="btn btn-dark btn-fill float-left" id="submit" value="Submit">
                          <a class="view-menu" href="{{ url('/menu') }}">Add More</a>
                          </button>
                          All Taxes ({{ $rates->all_taxes }}%)(Rs)</div>
                        <div class="divTableCell text-right padding-right label-taxes">0.00</div>
                      </div>
                      <div class="divTableRow">
                        <div class="divTableCell text-right">Carry Bag cost (Rs)</div>
                        <div class="divTableCell text-right padding-right label-carry-bag">0.00</div>
                      </div>
                    </div>

                    <div class="divTable tax">
                      <div class="divTableRow">
                        <div class="divTableCell text-right">Subtotal (Rs)</div>
                        <div class="divTableCell text-right padding-right sub-total">0.00</div>
                      </div>
                      <div class="divTableRow">
                        <div class="divTableCell text-right">Delivery Charge (Rs)</div>
                        <div class="divTableCell text-right padding-right delivery-charges">0.00</div>
                      </div>
                    </div>

                    <div class="total padding-right-48 grand-total">Total <span>0.00</span></div>
                    @if (count(json_decode($cart)) != 0)
                    <button type="submit" class="btn btn-dark btn-fill proceed-pay" id="submit" value="Submit">
                    <a class="view-menu" href="{{ url('/checkout') }}">Check Out</a>
                    </button>
                    @endif
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
@stop

@section('scripts')
@parent
    <form id="updatecart" method="post" action="{{ url('updatecart') }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="cart" name="cart" value="abcd">
    </form>

    <script type="text/template" id="cart-item-template">
        <div class="divTable">
            <div class="divTableRow">
                <input type="hidden" class="dishid" name="id" value="<%= item['id'] %>">
                <input type="hidden" class="dishdate" name="dishdate" value="<%= item['date'] %>">
                <input type="hidden" class="dishcategory" name="dishcategory" value="<%= item['category'] %>">
                <div class="divTableCell wdt60"><%= item['name'] %> - <%= item['price'] %></div>
                <div class="divTableCell wdt10">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                        <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        </span>
                        <input type="text" name="quant[1]" class="form-control input-number form-control-menu" value="<%= item['qty'] %>" min="1" max="10">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                        <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        </span>
                    </div>
                </div>
                <div class="divTableCell wdt20">
                    <span class="item-price"><%= parseFloat(item['price'] * item['qty']).toFixed(2) %></span>
                </div>
                <div class="divTableCell wdt10">
                    <span class="close-btn"><a href="#">Cancel</a></span>
                </div>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        var cart = {!! $cart !!};
        var grouped_cart = {};
        
        $(document).ready(function(){
            template = _.template($('#cart-item-template').html());
            $cart_items = $('.cart-items');

            //group the cart on date first

            date_grouped_cart = _.groupBy(cart, 'date');
            dates_array =  _.keys(date_grouped_cart).sort();

           	for (var j=0; j < dates_array.length; j++) {
           		dishes_on_date = date_grouped_cart[dates_array[j]];
           		date = dates_array[j];

            	date_arr = date.split("/");
				f = new Date(date_arr[1] + '/' + date_arr[0] + '/' + date_arr[2]);
                // Div with heading for date
                $cart_items.append('<div class="divTable border-bottom padding-10"><div class="divTableRow"><div class="divTableCell wdt20 text-left"><b>' + f.toDateString() + ' <i class="fa fa-pencil"></i></b></div></div></div>');

                // Container div for the date
                var $date_container = $('<div class="padding-10"></div');
                $cart_items.append($date_container);

                // Group by category now
                cat_grouped_cart = _.groupBy(dishes_on_date, 'category');

                categories = ['Breakfast', 'Lunch', 'Dinner'];
                for (var i = 0; i < categories.length; i++) {
                    if (cat_grouped_cart[categories[i]] == undefined)
                        continue;

                    $date_container.append('<div class="cart-category-row">' + categories[i] + '</div>');
                    _.each(cat_grouped_cart[categories[i]], function(dish) {
                        // _.each(dishes, function(item) {
                            $date_container.append(template({"item": dish}));
                        // });
                    });    
                };
            }

            if (cart.length == 0) {
                $cart_items.append('<div>No items in the cart</div>');
                $('#btnOrder').hide();
            }


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


            update_cart();

            $('.input-number').change(function() {
                minValue =  parseInt($(this).attr('min'));
                maxValue =  parseInt($(this).attr('max'));
                valueCurrent = parseInt($(this).val());
                if(valueCurrent >= minValue && valueCurrent <= maxValue) {
                    $dish = $(this).closest('.divTableRow');
                    add_to_cart($dish.find('.dishid').val(), $dish.find('.dishdate').val(), $dish.find('.dishcategory').val(), $(this).val(), this);
                    update_cart();
                    sync_cart_server();
                }
            });

            $('span.close-btn').click(function() {
                $dish = $(this).closest('.divTableRow');
                remove_from_cart($dish.find('.dishid').val(), $dish.find('.dishdate').val(), $dish.find('.dishcategory').val());
                $(this).closest('.divTableRow').empty();
                update_cart();
                sync_cart_server();
            });

            function add_to_cart(item, dish_date, dish_category, qty, that) {
                var index = search_in_cart(item, dish_date, dish_category);
                cart[index]["qty"] = qty;
                $(that).closest('.divTableRow').find('span.item-price').html(parseFloat(cart[index]['price'] * cart[index]['qty']).toFixed(2));
            }

            function remove_from_cart(item, dish_date, dish_category) {
                var index = search_in_cart(item, dish_date, dish_category);
                if (index != -1)
                    cart.splice(index, 1);
            }

            function search_in_cart(item, dish_date, dish_category) {
                for (i = 0; i<cart.length; i++) {
                    if (cart[i]["id"] == item) {
                        if (cart[i]["date"] == dish_date && cart[i]["category"] == dish_category)
                            return i; 
                    }
                }
                return -1;
            }


            function update_cart() {
                cart_total = 0.0;
                all_taxes = {{ $rates->all_taxes }};
                carry_bag = {{ $rates->carry_bag }};
                delivery_charge = {{ $rates->delivery_charge }};

                _.each(cart, function(item) {
                    cart_total += item['price'] * item['qty'];
                });


                $('.cart-total').html(parseFloat(cart_total).toFixed(2));
                taxes = cart_total * all_taxes / 100;
                sub_total = cart_total + taxes + carry_bag;
                $('.sub-total').html(parseFloat(sub_total).toFixed(2));

                if (cart_total != 0) {
                    // $('.delivery-charges').html('30.00');
                    $('.grand-total span').html(parseFloat(sub_total + delivery_charge).toFixed(2));
                    $('.delivery-charges').html(parseFloat(delivery_charge).toFixed(2));
                    $('.label-carry-bag').html(parseFloat(carry_bag).toFixed(2));
                    $('.label-taxes').html(parseFloat(cart_total * all_taxes / 100).toFixed(2));
                }

                $('.add-cart').html(cart.length);
            }

            init_cart_controls();
        });
    </script>
@stop
