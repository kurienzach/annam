<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishToCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dish_to_categories', function(Blueprint $table)
		{
			$table->integer('dish_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->primary(['dish_id', 'category_id']);

            $table->foreign('dish_id')
                  ->references('id')->on('dishes')
                  ->onDelete('cascade');

            $table->foreign('category_id')
                  ->references('id')->on('dish_categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dish_to_categories');
	}

}
