<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcLanguagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_languages', function(Blueprint $table)
		{
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->integer('count', true);
			$table->string('language_family');
			$table->string('language');
			$table->string('native_name');
			$table->string('iso_639_1');
			$table->string('iso_639_2');
			$table->boolean('front_end')->default(0);
			$table->boolean('back_end')->default(0);
			$table->boolean('content')->default(0);
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
		Schema::drop('hc_languages');
	}

}
