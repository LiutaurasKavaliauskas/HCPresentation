<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcTracksPlaylistsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_tracks_playlists_connections', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('playlist_id', 36)->index('fk_hc_tracks_playlists_connections_hc_playlists1_idx');
			$table->string('track_id', 36)->index('fk_hc_tracks_playlists_connections_hc_tracks1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_tracks_playlists_connections');
	}

}
