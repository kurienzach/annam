<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishReccuringDaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dish_reccuring_days', function(Blueprint $table)
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
		Schema::drop('dish_reccuring_days');
	}

}
