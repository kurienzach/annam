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
                    <div class="divTable border-bottom padding-10">
                      <div class="divTableRow">
                        <div class="divTableCell wdt20 text-left"><b>Saturday, September 19 <i class="fa fa-pencil"></i></b></div>
                      </div>
                    </div>

                <div class="cart-items"></div>

                <div class="divTable tax">
                    <div class="divTableRow">
                        <div class="divTableCell text-right">Item Total (Rs)</div>
                        <div class="divTableCell text-right padding-right cart-total">0.00</div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell text-right">All Taxes (Rs)</div>
                        <div class="divTableCell text-right padding-right">0.00</div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell text-right">Carry Bag cost (Rs)</div>
                        <div class="divTableCell text-right padding-right">0.00</div>
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
                <div class="total grand-total">Total <span>0.00</span>
                </div>
                <form id="form-order" method="post" action="{{ url('placeorder') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="order-cart" name="cart" value="">
                    <input id="btnOrder" type="submit" value="Proceed Pay" class="btn btn-dark btn-fill btn-lg proceed-pay">
                </form>
                <!--a href="placeorder" class="btn btn-dark btn-fill btn-lg proceed-pay">Proceed Pay</a-->
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
                <div class="divTableCell wdt30"><%= item['name'] %></div>
                <div class="divTableCell wdt30"><%= item['price'] %></div>
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
                <div class="divTableCell wdt20"><span class="item-price"><%= parseFloat(item['price'] * item['qty']).toFixed(2) %></span><span class="close-btn"><a href="#">x</a></span>
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

            _.each(date_grouped_cart, function(dishes_on_date, date){
                $cart_items.append('<div class="cart-date-row">' + date + '</div>');
                // Group by category now
                cat_grouped_cart = _.groupBy(dishes_on_date, 'category');

                _.each(cat_grouped_cart, function(dishes, category) {
                    $cart_items.append('<div class="cart-category-row">' + category + '</div>');

                    _.each(dishes, function(item) {
                        $cart_items.append(template({"item": item}));
                    });
                });
            });

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

                _.each(cart, function(item) {
                    cart_total += item['price'] * item['qty'];
                });


                $('.cart-total').html(parseFloat(cart_total).toFixed(2));
                $('.sub-total').html(parseFloat(cart_total).toFixed(2));

                if (cart_total != 0) {
                    $('.delivery-charges').html('30.00');
                    $('.grand-total span').html(parseFloat(cart_total + 30).toFixed(2));
                }
                else {
                    $('.delivery-charges').html('0.00');
                    $('.grand-total span').html('0.00');
                } 

                $('.add-cart').html(cart.length);
            }

            init_cart_controls();
        });
    </script>
@stop
