<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCroptipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('croptips', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description');
			$table->string('content');
			$table->integer('crop_id')->unsigned();
			$table->foreign('crop_id')->references('id')->on('crops');
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
		Schema::drop('croptips');
	}

}
