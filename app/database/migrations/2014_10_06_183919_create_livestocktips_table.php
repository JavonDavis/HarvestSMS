<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivestocktipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('livestocktips', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description');
			$table->string('content');
			$table->integer('livestock_id')->unsigned();
			$table->foreign('livestock_id')->references('id')->on('livestocks');			
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
		Schema::drop('livestocktips');
	}

}
