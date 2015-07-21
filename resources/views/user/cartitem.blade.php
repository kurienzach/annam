<div class="divTable">
    <div class="divTableRow">
        <div class="divTableCell wdt30">{{ $item->name }}</div>
        <div class="divTableCell wdt30">{{ $item->price }}</div>
        <div class="divTableCell wdt10">
            <div class="input-group">
                <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number form-control-menu" value="{{ $item->qty }}" min="0" max="10">
                <span class="input-group-btn">
                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>
        </div>
        <div class="divTableCell wdt20">{{ number_format((float)$item->price * $item->qty, 2, '.', '') }}<span class="close-btn"><a href="#">x</a></span>
        </div>
    </div>
</div>