<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcPagesGalleriesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_pages_galleries_connections', function(Blueprint $table)
		{
			$table->foreign('gallery_id', 'fk_hc_pages_galleries_connections_hc_galleries1')->references('id')->on('hc_galleries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('page_id', 'fk_hc_pages_galleries_connections_hc_pages1')->references('id')->on('hc_pages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_pages_galleries_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_pages_galleries_connections_hc_galleries1');
			$table->dropForeign('fk_hc_pages_galleries_connections_hc_pages1');
		});
	}

}
