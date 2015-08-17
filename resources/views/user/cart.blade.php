@extends('user.base')
@section('content')
<div class="inner-page-wrap">
<div class="inner-hero bg-image overlay" data-image-src="images/home-3.jpg" data-stellar-background-ratio="0.8" style="background:url(images/home-3.jpg) cover no-repeat;">
<div class="container">
<div class="row">
<div class="col-md-12 col-md-offset-0 text-center">

    <div class="col-md-12 text-center">
        <div class="pricing-table">
            <h3 class="cart"><img src="images/cart.png" class="cart-contain"> Your Cart Contains</h3>
            <div class="price-bill">

                <div class="divTable">
                    <div class="divTableRow">
                        <div class="divTableCell wdt30"><b>Item Name</b>
                        </div>
                        <div class="divTableCell wdt30"><b>Unit Price (Rs)</b>
                        </div>
                        <div class="divTableCell wdt10 padding-left"><b>Qty</b>
                        </div>
                        <div class="divTableCell wdt20"><b>Price (Rs)</b>
                        </div>
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
                <!--input type="submit" value="Proceed Pay" class="btn btn-dark btn-fill btn-lg proceed-pay"-->
                <a href="placeorder" class="btn btn-dark btn-fill btn-lg proceed-pay">Proceed Pay</a>
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
        
        template = _.template($('#cart-item-template').html());

        $(document).ready(function(){
            _.each(cart, function(item) {
                $('.cart-items').append(template({"item": item}));
            });

            update_cart();
        });

        $('.input-number').change(function() {
            minValue =  parseInt($(this).attr('min'));
            maxValue =  parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());
            if(valueCurrent >= minValue && valueCurrent <= maxValue) {
                add_to_cart($(this).closest('.divTableRow').find('.dishid').val(), $(this).val(), this);
                update_cart();
                sync_cart_server();
            }
        });

        $('span.close-btn').click(function() {
            remove_from_cart($(this).closest('.divTableRow').find('.dishid').val());
            $(this).closest('.divTableRow').empty();
            update_cart();
            sync_cart_server();
        });

        function add_to_cart(item, qty, that) {
            var index = search_in_cart(item);
            cart[index]["qty"] = qty;
            $(that).closest('.divTableRow').find('span.item-price').html(parseFloat(cart[index]['price'] * cart[index]['qty']).toFixed(2));
        }

        function remove_from_cart(item) {
            var index = search_in_cart(item);
            if (index != -1)
                cart.splice(index, 1);
        }

        function search_in_cart(item) {
            for (i = 0; i<cart.length; i++) {
                if (cart[i]["id"] == item) {
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
        }

        init_cart_controls();
    </script>
@stop

