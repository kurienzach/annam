<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishDatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dish_dates', function(Blueprint $table)
		{
			$table->integer('dish_id')->unsigned();
            $table->date('available_date');

            $table->primary(['dish_id', 'available_date']);

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
		Schema::drop('dish_dates');
	}

}