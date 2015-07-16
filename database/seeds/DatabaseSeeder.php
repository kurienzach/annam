<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('DishCategoriesTableSeeder');
        $this->call('DishesTableSeeder');
        $this->call('DishToCategoriesTableSeeder');
        $this->call('DishDatesTableSeeder');
        $this->call('DishReccuringDaysTableSeeder');
	}

}
