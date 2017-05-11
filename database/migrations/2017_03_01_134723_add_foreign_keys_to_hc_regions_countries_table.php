<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcRegionsCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_regions_countries', function(Blueprint $table)
		{
			$table->foreign('region_id', 'fk_hc_regions_countries_hc_regions_continents')->references('id')->on('hc_regions_continents')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('flag_id', 'fk_hc_regions_countries_hc_resources1')->references('id')->on('hc_resources')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_regions_countries', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_regions_countries_hc_regions_continents');
			$table->dropForeign('fk_hc_regions_countries_hc_resources1');
		});
	}

}
