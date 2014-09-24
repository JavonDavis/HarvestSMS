<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropPestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crop_pest', function(Blueprint $table)
		{
			$table->integer('crop_id')->unsigned();
			$table->foreign('crop_id')->references('id')->on('crops');
			$table->integer('pest_id')->unsigned();
			$table->foreign('pest_id')->references('id')->on('pests');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crop_pest');
	}

}
