<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcShortUrlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_short_url', function(Blueprint $table)
		{
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->integer('count', true);
			$table->string('url', 768);
			$table->string('short_url_key', 768);
			$table->integer('clicks');
			$table->text('description')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});

		//TODO url description
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_short_url');
	}

}
