<?php use Carbon\Carbon; ?>
<div class="cta-1 border space-sm">
<div class="container">
<div class="row vertical-align">
    <div class="col-md-4">
    <div class="wrapper-demo">
    <div id="dd" class="wrapper-dropdown-2" tabindex="1">Today's Menu – {{ Carbon::now()->format('M dS') }}
        <ul class="dropdown">
            <li>
                <a href="#">
                    <div class="day">Today's Menu</div>
                    <div class="date">{{ Carbon::now()->format('M dS') }}</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="day">Tomorrow's Menu</div>
                    <div class="date">{{ Carbon::now()->addDay()->format('M dS') }}</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="day">{{ Carbon::now()->addDays(2)->format('l') }}'s Menu</div>
                    <div class="date">{{ Carbon::now()->addDays(2)->format('M dS') }}</div>
                </a>
            </li>
        </ul>
    </div>
    </div>
    </div>
    <div class="col-md-4">
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
    <div class="col-md-4">
        <table class="float-right">
            <tr>
                <td>
                    <input type="checkbox" name="checkboxG4" id="checkbox1" class="css-checkbox" />
                    <label for="checkbox1" class="location-label text-right">Deliver to <span>Madiwala <i class="fa fa-pencil"></i></span>
                    </label>
                </td>
            </tr>
        </table>

    </div>
</div>
</div>
</div>