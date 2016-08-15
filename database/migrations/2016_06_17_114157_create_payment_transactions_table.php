<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('payment_transactions');
		Schema::create('payment_transactions', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('type');
			$table->string('expirery');
			$table->string('number');
			$table->string('description');
			$table->decimal('amount',8,2);
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				  ->references('id')->on('users');
			$table->integer('properties_id')->unsigned();
			$table->foreign('properties_id')
				  ->references('id')->on('properties');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment_transactions');
    }
}
