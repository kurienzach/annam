<?php

use Illuminate\Database\Seeder;

class DishCategoriesTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('dish_categories')->delete();
		DB::table('dish_categories')->insert(array(
			array('name' => 'Breakfast'),
			array('name' => 'Lunch'),
			array('name' => 'Dinner')
		));
	}

}
