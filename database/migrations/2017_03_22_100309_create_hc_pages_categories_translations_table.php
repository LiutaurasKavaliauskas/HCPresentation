<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcPagesCategoriesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_pages_categories_translations', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('record_id', 36)->index('fk_hc_pages_categories_translations_hc_pages_categories1_idx');
			$table->string('language_code', 36)->index('fk_hc_pages_categories_translations_hc_languages1_idx');
			$table->string('title');
			$table->string('slug')->index('fk_hc_pages_categories_translations_slug');
			$table->text('content', 65535)->nullable();
			$table->string('cover_photo_id', 36)->nullable()->index('fk_hc_pages_categories_translations_hc_resources1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_pages_categories_translations');
	}

}
