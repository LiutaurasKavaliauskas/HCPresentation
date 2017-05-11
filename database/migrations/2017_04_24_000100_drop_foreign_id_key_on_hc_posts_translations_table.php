<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use interactivesolutions\honeycomblanguages\app\models\HCLanguages;
use interactivesolutions\honeycombposts\app\models\HCPostsTranslations;

class DropForeignIdKeyOnHcPostsTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_posts_translations', function(Blueprint $table)
		{
            $table->dropForeign('fk_hc_posts_translations_hc_languages1');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('hc_posts_translations', function(Blueprint $table)
        {
            $table->foreign('language_code', 'fk_hc_posts_translations_hc_languages1')->references('id')->on('hc_languages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
	}
}
