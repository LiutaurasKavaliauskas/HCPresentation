<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcRegionsCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_regions_cities', function(Blueprint $table)
		{
			$table->foreign('municipality_id', 'fk_hc_regions_cities_hc_regions_municipalities1')->references('id')->on('hc_regions_municipalities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_regions_cities', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_regions_cities_hc_regions_municipalities1');
		});
	}

}
