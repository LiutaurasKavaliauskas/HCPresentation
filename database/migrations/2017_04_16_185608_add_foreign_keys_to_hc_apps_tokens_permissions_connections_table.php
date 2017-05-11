<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcAppsTokensPermissionsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_apps_tokens_permissions_connections', function(Blueprint $table)
		{
			$table->foreign('permission_id', 'fk_hc_apps_tokens_permissions_connections_hc_acl_permissions1')->references('id')->on('hc_acl_permissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('token_id', 'fk_hc_apps_tokens_permissions_connections_hc_apps_tokens1')->references('id')->on('hc_apps_tokens')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_apps_tokens_permissions_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_apps_tokens_permissions_connections_hc_acl_permissions1');
			$table->dropForeign('fk_hc_apps_tokens_permissions_connections_hc_apps_tokens1');
		});
	}

}
