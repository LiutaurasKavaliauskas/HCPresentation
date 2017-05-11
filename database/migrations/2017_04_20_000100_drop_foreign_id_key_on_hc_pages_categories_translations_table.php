<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use interactivesolutions\honeycomblanguages\app\models\HCLanguages;
use interactivesolutions\honeycombpages\app\models\HCPagesCategoriesTranslations;

class DropForeignIdKeyOnHcPagesCategoriesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_pages_categories_translations', function(Blueprint $table)
		{
            $table->dropForeign('fk_hc_pages_categories_translations_hc_languages1');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('hc_pages_categories_translations', function(Blueprint $table)
        {
            $table->foreign('language_code', 'fk_hc_pages_categories_translations_hc_languages1')->references('id')->on('hc_languages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
	}
}
