<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcTrackAuthorConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_track_author_connections', function(Blueprint $table)
		{
			$table->foreign('track_id', 'fk_hc_track_author_connections_hc_tracks1')->references('id')->on('hc_tracks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('author_id', 'fk_hc_track_author_connections_hc_users1')->references('id')->on('hc_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_track_author_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_track_author_connections_hc_tracks1');
			$table->dropForeign('fk_hc_track_author_connections_hc_users1');
		});
	}

}
