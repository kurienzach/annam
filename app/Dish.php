<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model {

    protected $fillable = ['name', 'description', 'price', 'featuren', 'nonveg', 'reccuring_availability'];

    public function categories() 
    {
        return $this->belongsToMany('App\DishCategory', 'dish_to_categories', 'dish_id', 'category_id');
    }

    public function dates() 
    {
        return $this->hasMany('App\DishDate', 'dish_id');
    }

    public function reccuring_days() 
    {
        return $this->hasMany('App\DishReccuringDay', 'dish_id');
    }

}
