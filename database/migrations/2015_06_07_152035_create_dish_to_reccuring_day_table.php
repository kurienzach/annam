<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishToReccuringDayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dish_to_reccuring_day', function(Blueprint $table)
		{
			$table->integer('dish_id')->unsigned();
            $table->tinyInteger('day');

            $table->primary(['dish_id', 'day']);

            $table->foreign('dish_id')
                  ->references('id')->on('dishes')
                  ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dish_to_reccuring_day');
	}

}
