@extends('admin.template')

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Add / Edit Location</h1>
    
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form role="form" method="post" action="{{ url('admin/storelocation') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $location->id or Null}}">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="form-group">
                    <label>Location Name</label>
                    <input class="form-control" name="name" type="text" required value="{{ $location->name or Null }}" required maxlength="100">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input class="form-control" name="city" type="text" required value="{{ $location->city or Null }}" required maxlength="100">
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input class="form-control" name="state" type="text" required value="{{ $location->state or Null }}" required maxlength="100">
                </div>
            </div>

            <div class="col-md-offset-3 col-md-6 text-center">
                <!-- Add / Edit button -->
                <input name="save" class="btn btn-success" type="submit" value="<?php isset($location)?print('Save'):print('Add') ?> Location">
                
                <!-- Delete button -->
                @if (isset($location))
                <input id="btnDelete" name="delete" class="btn btn-danger" type="submit" value="Delete Location">
                @endif
            </div>
        </div>
    </form>
</div>
<!-- /.col-lg-12 -->
@stop

@section('scripts')
@parent
<script type="text/javascript">
    $('#btnDelete').click(function(e) {
        var cfm = confirm('Are you sure to delete the location?');
        if (!cfm) {
            e.preventDefault();
            return false;
        }
    })
</script>
@stop