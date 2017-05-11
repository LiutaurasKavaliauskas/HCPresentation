<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcAppsTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_apps_tokens', function(Blueprint $table)
		{
			$table->foreign('app_id', 'fk_hc_apps_tokens_hc_apps')->references('id')->on('hc_apps')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_apps_tokens', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_apps_tokens_hc_apps');
		});
	}

}
