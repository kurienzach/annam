<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDishesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_dishes', function(Blueprint $table)
		{
            $table->integer('order_id')->unsigned();
            $table->integer('dish_id')->unsigned();
            $table->string('dish_name');
            $table->string('dish_price');
            $table->string('dish_qty');

            $table->primary(['order_id', 'dish_id']);

            $table->foreign('order_id')
                  ->references('id')->on('orders')
                  ->onDelete('cascade');

            $table->foreign('dish_id')
                  ->references('id')->on('dishes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_dishes');
	}

}
