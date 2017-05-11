<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_posts', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->string('type');
			$table->timestamps();
			$table->softDeletes();
			$table->string('author_id', 36)->index('fk_hc_posts_hc_users1_idx');
			$table->timestamp('publish_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('expires_at')->nullable();
			$table->string('cover_photo_id', 36)->nullable()->index('fk_hc_posts_hc_resources_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_posts');
	}

}
