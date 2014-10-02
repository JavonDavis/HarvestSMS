<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropFertilizerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crop_fertilizer', function(Blueprint $table)
		{
			$table->integer('crop_id')->unsigned();
			$table->foreign('crop_id')->references('id')->on('crops');
			$table->integer('fertilizer_id')->unsigned();
			$table->foreign('fertilizer_id')->references('id')->on('fertilizers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crop_fertilizer');
	}

}
