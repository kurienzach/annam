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
    <h1 class="page-header">Dishes <a class="btn btn-success" style="float: right" href="{{ url('admin/dish') }}">Add Dish</a></h1>
    
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Enabled</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = True ?>
                @foreach ($dishes as $dish)
                    @if ($count)
                    <tr class="odd">
                    @else
                    <tr class="even">
                    @endif
                        <td class="dish-img"><img src="{{ url('images/dishes/' . $dish->img_url) }}"></td>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish->price }}</td>
                        <td><?php $dish->enabled?print('Yes'):print('No') ?></td>
                        <td style="text-align: center"><a class="btn btn-info btn-sm" href="{{ url('admin/dish/' . $dish->id) }}">Edit</a></td>
                    </tr>
                    <?php $count = !$count ?>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
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