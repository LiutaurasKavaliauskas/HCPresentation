<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcTrackAuthorConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_track_author_connections', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('track_id', 36)->index('fk_hc_track_author_connections_hc_tracks1_idx');
			$table->string('author_id', 36)->index('fk_hc_track_author_connections_hc_users1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_track_author_connections');
	}

}
