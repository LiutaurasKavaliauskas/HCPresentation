<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcPagesCategoriesConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_pages_categories_connections', function(Blueprint $table)
		{
			$table->foreign('page_id', 'fk_hc_pages_categories_connections_hc_pages1')->references('id')->on('hc_pages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('category_id', 'fk_hc_pages_categories_connections_hc_pages_categories1')->references('id')->on('hc_pages_categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_pages_categories_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_pages_categories_connections_hc_pages1');
			$table->dropForeign('fk_hc_pages_categories_connections_hc_pages_categories1');
		});
	}

}
