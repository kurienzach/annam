@extends('admin.template')

@section('content')
<div class="col-lg-12">
    <h1 class="page-header">Add / Edit Dish</h1>
    
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form role="form" method="post" action="{{ url('admin/storedish') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $dish->id or Null}}">
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label>Dish Name</label>
                    <input class="form-control" name="name" type="text" required value="{{ $dish->name or Null }}">
                </div>
                <div class="form-group">
                    <label>Dish Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ $dish->description or Null }}</textarea>
                </div>
                <div class="form-group">
                    <label>Dish Price</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" name="price" class="form-control" value="{{ $dish->price or Null }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Enabled</label>
                    <label class="checkbox-inline" style="margin-left: 9px">
                        <input name="enabled" type="checkbox" @if (isset($dish) && $dish->enabled) checked @endif>&nbsp
                    </label>
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                    <label>Dish Image</label>
                    @if (isset($dish->img_url))
                    <img class="img-responsive" src="{{ url('images/dishes/' . $dish->img_url) }}" style="margin-bottom: 10px">
                    @endif
                    <input type="file" name="dish_img">
                </div>
            </div>
        </div>

        <div class="row text-center">
            <!-- Add / Edit button -->
            <input name="save" class="btn btn-success" type="submit" value="<?php isset($dish)?print('Save'):print('Add') ?> Dish">
            
            <!-- Delete button -->
            @if (isset($dish))
            <input id="btnDelete" name="delete" class="btn btn-danger" type="submit" value="Delete Dish">
            @endif
        </div>
    </form>
</div>
<!-- /.col-lg-12 -->
@stop

@section('scripts')
@parent
<script type="text/javascript">
    $('#btnDelete').click(function(e) {
        var cfm = confirm('Are you sure to delete the dish?');
        if (!cfm) {
            e.preventDefault();
            return false;
        }
    })
</script>
@stop