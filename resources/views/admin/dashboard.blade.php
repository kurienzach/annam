@extends('admin.template')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Welcome Annam Admin</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <!-- Total Orders -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $total_orders }}</div>
                        <div>Total Orders!</div>
                    </div>
                </div>
            </div>
            <a href="{{ url('/admin/orders/all') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- /Total Orders -->

    <!-- Orders Today -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $orders_today }}</div>
                        <div>Orders Placed Today</div>
                    </div>
                </div>
            </div>
            <a href="{{ url('/admin/orders/all') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- /Orders Today -->

    <!-- Deliveries for Today -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $deliveries_today }}</div>
                        <div>Deliveries for Today</div>
                    </div>
                </div>
            </div>
            <a href="{{ url('/admin/orders/today') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- /Deliveries for Today -->

    <!-- Overdue Orders -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $overdue_orders }}</div>
                        <div>Overdue Orders</div>
                    </div>
                </div>
            </div>
            <a href="{{ url('/admin/orders/today') }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <!-- /Overdue Orders -->
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update Pricing Rates
            </div>
            <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tax Rate</label>
                            <input type="text" name="all_taxes" class="form-control" value="{{ $rates->all_taxes }}">
                        </div>  
                        <div class="form-group">
                            <label>Carry Bag Charges</label>
                            <input type="text" name="carry_bag" class="form-control" value="{{ $rates->carry_bag }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Delivery Charges</label>
                            <input type="text" name="delivery_charge" class="form-control" value="{{ $rates->delivery_charge }}">
                        </div>
                        <div class="form-group" style="text-align: right;">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- /.col-lg-12 -->
@stop

@section('scripts')
@parent

@stop
