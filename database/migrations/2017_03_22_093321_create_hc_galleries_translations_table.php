<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcGalleriesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_galleries_translations', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('record_id', 36)->index('fk_hc_galleries_translations_hc_galleries1_idx');
			$table->string('language_code', 36)->index('fk_hc_galleries_translations_hc_languages1_idx');
			$table->string('title');
			$table->string('slug')->index('fk_hc_galleries_translations_slug');
			$table->text('content', 65535)->nullable();
			$table->string('location')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_galleries_translations');
	}

}
