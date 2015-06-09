<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model {

    protected $fillable = ['name', 'description', 'price', 'featuren', 'nonveg', 'reccuring_availability'];

}
