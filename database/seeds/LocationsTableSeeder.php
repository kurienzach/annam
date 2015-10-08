<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('locations')->delete();
		DB::table('locations')->insert(array(
			array('name' => 'Madiwala', 'city' => 'Bangalore', 'state' => 'Karnataka'),
			array('name' => 'Ejipura', 'city' => 'Bangalore', 'state' => 'Karnataka'),
			array('name' => 'Domlur', 'city' => 'Bangalore', 'state' => 'Karnataka'),
			array('name' => 'Electronic City', 'city' => 'Bangalore', 'state' => 'Karnataka')
		));
	}

}
