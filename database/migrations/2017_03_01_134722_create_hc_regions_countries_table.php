<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcRegionsCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_regions_countries', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('region_id', 36)->index('fk_hc_regions_countries_hc_regions_continents_idx');
			$table->string('common_name')->nullable();
			$table->string('official_name')->nullable();
			$table->string('translation_key');
			$table->string('iso_3166_1_alpha2', 2);
			$table->string('iso_3166_1_alpha3', 3);
			$table->string('flag_id', 36)->nullable()->index('fk_hc_regions_countries_hc_resources1_idx');
		});

        DB::statement("ALTER TABLE `hc_regions_countries` ADD `geo_data` LONGBLOB NULL DEFAULT NULL");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_regions_countries');
	}

}
