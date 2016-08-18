<?php use Carbon\Carbon; ?>
<div class="cta-1 border space-am">
<div class="container">
<div class="row vertical-align">
    <div class="col-md-4 col-xs-12">
    <div class="wrapper-demo">
    <div id="dd" class="wrapper-dropdown-2 date-dropdown" tabindex="1">Today's Menu – {{ Carbon::now('Asia/Kolkata')->format('M dS') }}
        <ul class="dropdown">
            <li>
                <a href="#" id="menu-today" class="menu-date-select" data-date="{{ Carbon::now('Asia/Kolkata')->format('d/m/y') }}">
                    <div class="day">Today's Menu</div>
                    <div class="date">{{ Carbon::now('Asia/Kolkata')->format('M dS') }}</div>
                </a>
            </li>
            <li>
                <a href="#" id="menu-tomorrow" class="menu-date-select" data-date="{{ Carbon::now('Asia/Kolkata')->addDay()->format('d/m/y') }}">
                    <div class="day">Tomorrow's Menu</div>
                    <div class="date">{{ Carbon::now('Asia/Kolkata')->addDay()->format('M dS') }}</div>
                </a>
            </li>
            <li>
                <a href="#" id="menu-dayafter" class="menu-date-select" data-date="{{ Carbon::now('Asia/Kolkata')->addDays(2)->format('d/m/y') }}">
                    <div class="day">{{ Carbon::now('Asia/Kolkata')->addDays(2)->format('l') }}'s Menu</div>
                    <div class="date">{{ Carbon::now('Asia/Kolkata')->addDays(2)->format('M dS') }}</div>
                </a>
            </li>
        </ul>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-xs-12">
    <div class="wrapper-demo">
        <table>
            <tr>
                <td>
                    <input type="checkbox" name="category" id="checkbox1" class="css-checkbox category-select" value="Breakfast"/>
                    <label for="checkbox1" class="css-label">Breakfast</label>
                </td>
                <td class="menu-options">
                    <input type="checkbox" name="category" id="checkbox2" class="css-checkbox category-select" value="Lunch"/>
                    <label for="checkbox2" class="css-label">Lunch</label>
                </td>
                <td class="menu-options">
                    <input type="checkbox" name="category" id="checkbox3" class="css-checkbox category-select" value="Dinner"/>
                    <label for="checkbox3" class="css-label">Dinner</label>
                </td>
            </tr>
        </table>
    </div>
    </div>
    <div class="col-md-4 col-xs-12 disable">
        <table class="float-right">
            <tr>
                <td>
                    <input type="checkbox" name="checkboxG4" id="checkbox1" class="css-checkbox" />
                    <label for="checkbox1" class="location-label text-right"><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">Deliver to <span><span>{{ $location }}</span> <i class="fa fa-pencil"></i></span></a>
                    </label>

                    <form id="updatelocation" method="post" action="{{ url('updatelocation') }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="txtlocation" name="location" value="{{ $location }}">
                    </form>
                </td>
            </tr>
        </table>

    </div>
</div>
</div>
</div>
