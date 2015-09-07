<div class="col-sm-4">
<div class="iconBox">
    <span style="display:none" class="dish-id">{{ $dish->id }}</span>
    <a href="#" class="thumbnail">
        <img src="{{ asset('images/dishes/') ."/" . $dish->img_url }}" alt="...">
    </a>
    <div class="iconBox-content">
        <h4>{{ $dish->name }}</h4>
        <p class="lead-menu">
            {{{ $dish->description }}}
        </p>
        <div class="media-heading">
            <div class="amount pull-left"><strong>Rs.{{ $dish->price }}</strong></div>
          
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
