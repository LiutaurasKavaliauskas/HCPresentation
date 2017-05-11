<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcPagesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_pages_translations', function(Blueprint $table)
		{
			$table->foreign('language_code', 'fk_hc_pages_translations_hc_languages1')->references('id')->on('hc_languages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('record_id', 'fk_hc_pages_translations_hc_pages1')->references('id')->on('hc_pages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('cover_photo_id', 'fk_hc_pages_translations_hc_resources1')->references('id')->on('hc_resources')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('author_id', 'fk_hc_pages_translations_hc_users1')->references('id')->on('hc_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_pages_translations', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_pages_translations_hc_languages1');
			$table->dropForeign('fk_hc_pages_translations_hc_pages1');
			$table->dropForeign('fk_hc_pages_translations_hc_resources1');
			$table->dropForeign('fk_hc_pages_translations_hc_users1');
		});
	}

}
