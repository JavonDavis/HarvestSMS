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
			$table->decimal('price');
			$table->integer('days_until_harvest');
			$table->integer('amount_produced');
			$table->integer('crop_id');
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
