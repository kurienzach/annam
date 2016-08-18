<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\DishCategory;
use Carbon\Carbon;

class DishReccuringDaysTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('dish_reccuring_days')->delete();
		DB::table('dish_reccuring_days')->insert(array(
            array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'day' => 1),
            array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'day' => 2),
            array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'day' => 3),
            array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'day' => 4),
            array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'day' => 5),
            array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'day' => 6),
            array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'day' => 7),

            array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'day' => 1),
            array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'day' => 2),
            array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'day' => 3),
            array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'day' => 4),
            array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'day' => 5),
            array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'day' => 6),
            array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'day' => 7),

            array('dish_id' => Dish::where('name', 'Upma')->first()->id, 'day' => 1),
            array('dish_id' => Dish::where('name', 'Upma')->first()->id, 'day' => 2),
            array('dish_id' => Dish::where('name', 'Upma')->first()->id, 'day' => 3),
            array('dish_id' => Dish::where('name', 'Upma')->first()->id, 'day' => 4),
            array('dish_id' => Dish::where('name', 'Upma')->first()->id, 'day' => 5)
		));
	}

}
