<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVidioSourcesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vidio_sources', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('vidio_id');
            $table->string('name');
            $table->string('definition');
            $table->string('size');
            $table->string('src');
            $table->string('photo');
            $table->string('intro');
            $table->text('content');
            $table->text('code');
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
		Schema::drop('vidio_sources');
	}

}
