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
    <h1 class="page-header">Orders - Delivered</h1>
    
    @if(!$orders->isEmpty())
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="overdue_orders">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Delivery Date</th>
                        <th>Delivery Time</th>
                        <th>Customer</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>No Items</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = True ?>
                    @foreach ($orders as $order)
                        @if ($count)
                        <tr class="odd">
                        @else
                        <tr class="even">
                        @endif
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->category }}</td>
                            <td>{{ $order->user()->first()->name }}</td>
                            <td>{{ $order->user()->first()->mobile }}</td>
                            <td>{{ $order->delivery_address }}</td>
                            <td>{{ $order->no_items }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td style="text-align: center"><a class="btn btn-info btn-sm" href="{{ url('admin/orders/' . $order->id) }}">View</a></td>
                        </tr>
                        <?php $count = !$count ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    <!-- /.table-responsive -->
    @endif
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
    $('table').DataTable({
            responsive: true
    });
});
</script>
@stop
