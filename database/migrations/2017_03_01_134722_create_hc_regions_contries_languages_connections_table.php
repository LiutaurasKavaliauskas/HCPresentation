<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcRegionsContriesLanguagesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_regions_contries_languages_connections', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamps();
			$table->string('country_id', 36)->index('fk_hc_regions_contries_languages_connections_hc_regions_count1');
			$table->string('language_id', 36)->index('fk_hc_regions_contries_languages_connections_hc_languages1_idx');
			$table->boolean('official')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_regions_contries_languages_connections');
	}

}
