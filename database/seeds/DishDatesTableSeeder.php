<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\DishCategory;
use Carbon\Carbon;

class DishDatesTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('dish_dates')->delete();
		DB::table('dish_dates')->insert(array(
            array('dish_id' => Dish::where('name', 'Puttu + Kadala')->first()->id, 'available_date' => Carbon::parse('17-7-2015')->toDateString())
		));
	}

}
