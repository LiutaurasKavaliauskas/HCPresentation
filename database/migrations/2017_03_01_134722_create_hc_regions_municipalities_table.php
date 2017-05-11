<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcRegionsMunicipalitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_regions_municipalities', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('country_id', 36)->index('fk_hc_regions_municipalities_hc_regions_countries1_idx');
			$table->string('name');
			$table->string('translation_key')->nullable();
			$table->unique(['id','country_id'], 'id_country_UNIQUE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_regions_municipalities');
	}

}
