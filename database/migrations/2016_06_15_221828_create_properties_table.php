<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('properties');
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
			
			$table->string('purpose_of_account');
			$table->string('grantee');
			$table->string('plot_no');
			$table->string('description');
			$table->string('term');
			$table->string('acres');
			$table->string('file_no');
			$table->string('remarks');
			$table->string('lease_no');
			$table->string('date_of_inst');
			$table->string('inst');
			$table->string('grantor');
			$table->string('consid');
			$table->string('front_view');
			$table->string('back_view');
			$table->string('ariel_view');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users');
			
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
        Schema::drop('properties');
    }
}
