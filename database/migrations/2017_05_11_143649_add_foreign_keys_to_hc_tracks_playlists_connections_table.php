<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcTracksPlaylistsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_tracks_playlists_connections', function(Blueprint $table)
		{
			$table->foreign('track_id', 'fk_hc_tracks_playlists_connections_hc_tracks1')->references('id')->on('hc_tracks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('playlist_id', 'fk_hc_tracks_playlists_connections_hc_playlists1')->references('id')->on('hc_playlists')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_tracks_playlists_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_tracks_playlists_connections_hc_playlists1');
			$table->dropForeign('fk_hc_tracks_playlists_connections_hc_tracks1');
		});
	}

}
