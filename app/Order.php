<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	//
    public function dishes() 
    {
        return $this->hasMany('App\OrderDish', 'order_id');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

}
