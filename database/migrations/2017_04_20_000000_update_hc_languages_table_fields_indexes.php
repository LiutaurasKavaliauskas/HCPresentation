<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use interactivesolutions\honeycomblanguages\app\models\HCLanguages;
use interactivesolutions\honeycombpages\app\models\HCPagesCategoriesTranslations;

class UpdateHcLanguagesTableFieldsIndexes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('hc_languages', function(Blueprint $table)
        {
            $table->index('iso_639_1');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('hc_languages', function(Blueprint $table)
        {
            $table->dropIndex('hc_languages_iso_639_1_index');
        });
	}

}
