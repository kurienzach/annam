@extends('admin.template')

@section('head')
@parent
<!-- DataTables CSS -->
<link href="{{ url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="{{ url('bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Order # {{ $order->id}}<a class="btn btn-danger" style="float: right" href="{{ url('admin/dish') }}">Delete Order</a> <a class="btn btn-success" style="float: right; margin-right: 10px;" href="{{ url('admin/dish') }}">Mark Delivered</a></h1>

    <div class="col-md-12"> 
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Customer Details
                </div>
                <div class="panel-body form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Customer Name : </label>
                        <p class="col-sm-8 form-control-static">{{ $order->user()->first()->name }}</p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Mobile No : </label>
                        <p class="col-sm-8 form-control-static">{{ $order->user()->first()->mobile }}</p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Location : </label>
                        <p class="col-sm-8 form-control-static">{{ $order->delivery_address }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order Details
                </div>
                <div class="panel-body form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Devliery Time : </label>
                        <p class="col-sm-8 form-control-static">{{ $order->category }}</p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">No Items : </label>
                        <p class="col-sm-8 form-control-static">{{ $order->no_items }}</p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Price : </label>
                        <p class="col-sm-8 form-control-static">{{ $order->total_price }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order Dishes
                </div>
                <div class="panel-body form-horizontal">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Dish Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                @foreach($order->dishes()->get() as $dish)
                                <tr>
                                    <td>{{ $count }}</td>        
                                    <td>{{ $dish->dish_name }}</td>        
                                    <td>{{ $dish->dish_qty }}</td>        
                                    <td>{{ $dish->dish_price * $dish->dish_qty }}</td>        
                                </tr>
                                <?php $count += 1; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
</div>
<!-- /.col-lg-12 -->
@stop

@section('scripts')
@parent
<!-- DataTables JavaScript -->
<script src="{{ url('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
</script>
@stop
