<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcAppsTokensPermissionsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_apps_tokens_permissions_connections', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('token_id', 36)->index('fk_hc_apps_tokens_permissions_connections_hc_apps_tokens1_idx');
			$table->string('permission_id', 36)->index('fk_hc_apps_tokens_permissions_connections_hc_acl_permission_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_apps_tokens_permissions_connections');
	}

}
