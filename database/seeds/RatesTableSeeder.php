<?php

use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('rates')->delete();
		DB::table('rates')->insert(array(
			array('all_taxes' => '4', 'carry_bag' => '5.00', 'delivery_charge' => '30.00')
		));
	}

}
