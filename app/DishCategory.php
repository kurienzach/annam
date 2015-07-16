<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model {

	//
    //

    public function dishes()
    {
        return $this->belongsToMany('App\Dish', 'dish_to_categories', 'category_id');
    }

}
