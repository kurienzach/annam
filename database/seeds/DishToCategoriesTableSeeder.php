<?php

use Illuminate\Database\Seeder;

class DishToCategoriesTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('dish_to_categories')->delete();
		DB::table('dish_to_categories')->insert(array(
			array('name' => 'Breakfast'),
			array('name' => 'Lunch'),
			array('name' => 'Dinner')
		));
	}

}
