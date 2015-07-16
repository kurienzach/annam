@extends('user.base')

@section('content')
<div class="inner-page-wrap">
    @include ('user.subheader')

    <section class="space-lg bg-light" id="1">
        <div class="container">
            <div class="row text-center-sm">
            <div class="col-sm-12">
                <div class="row dishes-holder">
                    
                </div>
            </div>
            <div class="cbp-l-loadMore-button">
              <a href="#" class="cbp-l-loadMore-button-link">Tomorrow's Menu 15 / 05 / 2015</a>
            </div>
        </div>
  </div>
</section>
</div>
@stop

@section('scripts')
@parent
    <script type="text/template" id="menu_item_template">
        <div class="col-sm-4">
        <div class="iconBox">
            <a href="#" class="thumbnail">
                <img src="{{ asset('images') }}<%= "/" + dish["img_url"] %>" alt="...">
            </a>
            <div class="iconBox-content">
                <h4><%= dish["name"] %></h4>
                <p class="lead-menu">
                    <%= dish["description"] %>
                </p>
                <div class="media-heading">
                    <div class="amount pull-left"><strong>Rs.<%= dish["price"] %></strong></div>
                  
                    <div class="order-now pull-right">
                        <button type="submit" class="btn btn-dark btn-fill btn-lg order-btn" id="submit" value="Submit">order now</button>
                    </div>

                    <div class="input-group pull-right">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                        <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        </span>
                        <input type="text" name="quant[1]" class="form-control input-number form-control-menu" value="0" min="0" max="10">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                        <span class="glyphicon glyphicon-plus"></span>
                        </button>
                        </span>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </script>
 
    <script src="{{ asset('js/lodash.js') }}"></script>
    <script type="text/javascript">
        var dishes = {!! $dishes !!};

        function DropDown(el) {
            this.dd = el;
            this.initEvents();
        }
        DropDown.prototype = {
            initEvents: function() {
                var obj = this;

                obj.dd.on('click', function(event) {
                    $(this).toggleClass('active');
                    event.stopPropagation();
                });
            }
        }

        $(function() {

            var dd = new DropDown($('#dd'));

            $(document).click(function() {
                // all dropdowns
                $('.wrapper-dropdown-2').removeClass('active');
            });

        });
    </script>
    <script src="{{ asset('js/menu.js') }}"></script>
@stop

