<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHcPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('hc_posts', function(Blueprint $table)
		{
			$table->foreign('cover_photo_id', 'fk_hc_posts_hc_resources')->references('id')->on('hc_resources')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('author_id', 'fk_hc_posts_hc_users1')->references('id')->on('hc_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('hc_posts', function(Blueprint $table)
		{
			$table->dropForeign('fk_hc_posts_hc_resources');
			$table->dropForeign('fk_hc_posts_hc_users1');
		});
	}

}
