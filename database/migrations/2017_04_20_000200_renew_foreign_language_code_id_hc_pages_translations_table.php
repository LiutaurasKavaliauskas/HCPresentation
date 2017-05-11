<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use interactivesolutions\honeycomblanguages\app\models\HCLanguages;
use interactivesolutions\honeycombpages\app\models\HCPagesTranslations;
class RenewForeignLanguageCodeIdHcPagesTranslationsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hc_pages_translations', function(Blueprint $table)
        {
            $list = HCPagesTranslations::get();
            foreach ($list as $key => $value)
                HCPagesTranslations::where('id', $value->id)->update(['language_code' => HCLanguages::find($value->language_code)->iso_639_1]);
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
            $list = HCPagesTranslations::get();
            foreach ($list as $key => $value)
                HCPagesTranslations::where ('id', $value->id)->update (['language_code' => HCLanguages::where ('iso_639_1', $value->language_code)->first()->id]);
        });
    }
}