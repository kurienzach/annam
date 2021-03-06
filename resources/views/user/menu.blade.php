@extends('user.base')
<?php use Carbon\Carbon; ?>
@section('content')
<div class="inner-page-wrap">
    @include ('user.subheader')

    <div class="alert-box">
    </div>

    <section class="space-lg bg-light" id="1">
        <div class="container">
            <div class="row text-center-sm">
            <div class="col-sm-12">
                <div class="select-category-text well text-center">Please select a time of order to todays menu</div>
                <div class="row dishes-holder">
                    
                </div>
            </div>
            <div class="cbp-l-loadMore-button">
              <a href="#" class="cbp-l-loadMore-button-link">Tomorrow's Menu 15 / 05 / 2015</a>
            </div>
        </div>
        </div>
    </section>

    <form method="post" action="{{ url('cart') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="cart" name="cart" value="123">
    </form>
</div>
@stop

@section('scripts')
@parent
    <div class="modal fade bs-example-modal-sm location-select-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="location-select-form" method="post" action="{{ url('menu') }}" name="contactform2" class="row">
                <fieldset>
                    <div class="search">
                        <input class="" name="location" type="text" id="location1" size="5" value="" placeholder="enter your location" required>
                        <button type="button" class="btn btn-dark btn-fill btn-lg update_loc" id="submit1" value="Submit">Update</button>
                    </div>
                </fieldset>
            </form>
        </div>
      </div>
    </div> 

    <form id="updatecart" method="post" action="{{ url('updatecart') }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="cart" name="cart" value="abcd">
    </form>

    <script type="text/template" id="menu_item_template">
        <div class="col-sm-4">
        <div class="iconBox">
            <span style="display:none" class="dish-id"><%= dish["id"] %></span>
            <a href="#" class="thumbnail">
                <img src="{{ asset('images/dishes/') }}<%= "/" + dish["img_url"] %>" alt="...">
            </a>
            <div class="iconBox-content">
                <h4><%= dish["name"] %></h4>
                <p class="lead-menu">
                    <%= dish["description"] %>
                </p>
                <div class="media-heading">
                    <div class="amount pull-left"><strong>Rs.<%= dish["price"] %></strong></div>
                  
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
    
    <script type="text/javascript">
        var dishes = {!! $dishes !!};
        var cart = {!! $cart !!};
        var current_hour = {{ Carbon::now('Asia/Kolkata')->format('H') }};
        var today_date = "{{ Carbon::now('Asia/Kolkata')->format('d/m/y') }}";
        var menu_date = today_date;
        var menu_category;

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

        var locations_list = {!! $locations !!};
        var locations = [];
        var locations_array = [];

        _.each(locations_list, function(location){
            temp = {};
            temp['value'] = location['name'];
            locations.push(temp);
            locations_array.push(location['name']);
        });

        $(function() {

            var dd = new DropDown($('#dd'));

            $(document).click(function() {
                // all dropdowns
                $('.wrapper-dropdown-2').removeClass('active');
            });

            $('ul.dropdown li a').click(function() {
                $(".date-dropdown")[0].childNodes[0].nodeValue = $(this).find('.day').html() + "-" + $(this).find('.date').html();

            });

            $('.location-select-modal').on('show.bs.modal', function (e) {
                $('#location1').focus();
            })

            $('#location1').autocomplete({
                lookup: locations,
                minChars: 2,
                autoSelectFirst: true,
                onSelect: function (suggestion) {
                    update_location(suggestion.value);
                },
                appendTo: $('.modal-content')[0]
            });

            $('#location-select-form').submit(function() {
                if (!(locations_array.indexOf($(this).find('.location').val()) > -1)) {
                    alert("Please select a valid location for delivery!!");
                    return false;
                }
            });

        });
    </script>
    <script src="{{ asset('js/menu.js') }}"></script>
@stop

