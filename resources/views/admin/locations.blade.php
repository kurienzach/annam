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
    <h1 class="page-header">Locations <a class="btn btn-success" style="float: right" href="{{ url('admin/location') }}">Add Location</a></h1>
    
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = True ?>
                @foreach ($locations as $location)
                    @if ($count)
                    <tr class="odd">
                    @else
                    <tr class="even">
                    @endif
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->city }}</td>
                        <td>{{ $location->state }}</td>
                        <td style="text-align: center"><a class="btn btn-info btn-sm" href="{{ url('admin/location/' . $location->id) }}">Edit</a></td>
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