<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcSlugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_slugs', function(Blueprint $table)
		{
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->integer('count', true);
			$table->string('path', 768);
			$table->string('slug', 768);
			$table->integer('slug_count');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_slugs');
	}

}
