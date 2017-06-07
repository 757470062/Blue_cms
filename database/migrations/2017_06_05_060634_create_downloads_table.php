<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('downloads', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->nullable();
            $table->integer('download_tag_id')->nullable();
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->string('form')->nullable();
            $table->string('sky_drive_name')->nullable();
            $table->string('sky_drive_src')->nullable();
            $table->string('sky_drive_psw')->nullable();
            $table->string('content')->nullable();
            $table->string('src')->nullable();
            $table->string('photo')->nullable();
            $table->integer('state');
            $table->integer('sort');
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
		Schema::drop('downloads');
	}

}
