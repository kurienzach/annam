<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishesTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('dishes')->delete();
        Dish::create(['name' => 'Chapathi', 'description' => 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.', 'img_url' => 'food-tile-1.jpg', 'price' => 10.00, 'featured' => true, 'nonveg' => false, 'reccuring_availability' => true, 'enabled' => true]);
        Dish::create(['name' => 'Kerala Meals', 'description' => 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.', 'img_url' => 'food-tile-2.jpg', 'price' => 60.00, 'featured' => true, 'nonveg' => false, 'reccuring_availability' => true, 'enabled' => true]);
        Dish::create(['name' => 'Puttu + Kadala', 'description' => 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.', 'img_url' => 'food-tile-1.jpg', 'price' => 40.00, 'featured' => false, 'nonveg' => false, 'reccuring_availability' => false, 'enabled' => true]);
		Dish::create(['name' => 'Upma', 'description' => 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus. Nullam bibendum porta magna.', 'img_url' => 'food-tile-2.jpg', 'price' => 25.00, 'featured' => true, 'nonveg' => false, 'reccuring_availability' => true, 'enabled' => true]);		
	}

}
