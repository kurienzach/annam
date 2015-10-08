<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->date('order_date');
            $table->string('category');
            $table->smallInteger('no_items')->unsigned();
            $table->decimal('total_price', 5, 2);
            $table->integer('user_id')->unsigned();
            $table->string('user_name');
            $table->string('mobile_no');
            $table->text('delivery_address', 200);
            $table->text('delivery_city', 50);
            $table->text('delivery_state', 50);
            $table->text('delivery_country', 50);
            $table->text('delivery_pincode', 50);

            $table->boolean('delivered')->default('0');

            $table->foreign('user_id')
                  ->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
