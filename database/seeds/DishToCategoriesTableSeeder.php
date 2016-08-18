<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\DishCategory;

class DishToCategoriesTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('dish_to_categories')->delete();
		DB::table('dish_to_categories')->insert(array(
			array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'category_id' => DishCategory::where('name', 'Lunch')->first()->id),
			array('dish_id' => Dish::where('name', 'Chapathi')->first()->id, 'category_id' => DishCategory::where('name', 'Dinner')->first()->id),
			array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'category_id' => DishCategory::where('name', 'Lunch')->first()->id),
			array('dish_id' => Dish::where('name', 'Kerala Meals')->first()->id, 'category_id' => DishCategory::where('name', 'Dinner')->first()->id),
			array('dish_id' => Dish::where('name', 'Puttu + Kadala')->first()->id, 'category_id' => DishCategory::where('name', 'Breakfast')->first()->id),
			array('dish_id' => Dish::where('name', 'Upma')->first()->id, 'category_id' => DishCategory::where('name', 'Breakfast')->first()->id),
			array('dish_id' => Dish::where('name', 'Upma')->first()->id, 'category_id' => DishCategory::where('name', 'Dinner')->first()->id)
		));
	}

}
