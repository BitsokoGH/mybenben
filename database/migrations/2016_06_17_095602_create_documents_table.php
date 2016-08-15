<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('documents');
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
			$table->string('doc_type');
			$table->string('doc_description');
			$table->string('doc_status');
			$table->string('doc_url');
			$table->integer('properties_id')->unsigned();
			$table->foreign('properties_id')
				  ->references('id')
				  ->on('properties');
			$table->string('downloaded');
			$table->string('download_key');
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
        Schema::drop('documents');
    }
}
