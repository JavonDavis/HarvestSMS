<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crops', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('price');
			$table->string('days_until_harvest');
			$table->string('amount_produced');
			$table->string('crop_id');
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
		Schema::drop('crops');
	}

}
