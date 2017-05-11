<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_galleries', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->timestamp('publish_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('expires_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_galleries');
	}

}
