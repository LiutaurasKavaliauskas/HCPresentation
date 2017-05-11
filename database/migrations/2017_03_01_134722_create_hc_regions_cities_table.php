<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcRegionsCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_regions_cities', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('municipality_id', 36)->index('fk_hc_regions_cities_hc_regions_municipalities1_idx');
			$table->string('name');
			$table->string('translation_key')->nullable();
			$table->unique(['id','municipality_id'], 'id_country_UNIQUE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_regions_cities');
	}

}
