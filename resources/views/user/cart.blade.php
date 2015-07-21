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
                        <div class="divTableCell text-right padding-right">140.00</div>
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
                        <div class="divTableCell text-right padding-right">140.00</div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell text-right">Delivery Charge (Rs)</div>
                        <div class="divTableCell text-right padding-right">30.00</div>
                    </div>
                </div>
                <div class="total">Total <span>170.00</span>
                </div>
                <input type="submit" value="Proceed Pay" class="btn btn-dark btn-fill btn-lg proceed-pay">
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
    <script type="text/template" id="cart-item-template">
        <div class="divTable">
            <div class="divTableRow">
                <div class="divTableCell wdt30"><%= item['name'] %></div>
                <div class="divTableCell wdt30"><%= item['price'] %></div>
                <div class="divTableCell wdt10">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                        <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        </span>
                        <input type="text" name="quant[1]" class="form-control input-number form-control-menu" value="<%= item['qty'] %>" min="0" max="10">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                        <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        </span>
                    </div>
                </div>
                <div class="divTableCell wdt20"><%= item['price'] * item['qty'] %><span class="close-btn"><a href="#">x</a></span>
                </div>
            </div>
        </div>
    </script>

    <script type="text/javascript">
        var cart = {!! $cart !!};
        
        template = _.template($('#cart-item-template').html());
        _.each(cart, function(item) {
            $('.cart-items').append(template({"item": item}));
        });
    </script>
@stop

