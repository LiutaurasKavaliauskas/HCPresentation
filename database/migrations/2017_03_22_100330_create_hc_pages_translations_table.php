<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHcPagesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_pages_translations', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('record_id', 36)->index('fk_hc_pages_translations_hc_pages1_idx');
			$table->string('language_code', 36)->index('fk_hc_pages_translations_hc_languages1_idx');
			$table->string('title');
			$table->string('slug')->index('fk_hc_pages_slug');
			$table->text('summary', 65535)->nullable();

			$table->text('intro_section_icon')->nullable();
			$table->text('intro_section_summary')->nullable();
			$table->text('intro_section_content')->nullable();
			$table->text('about_section_title')->nullable();
			$table->text('about_section_summary')->nullable();
			$table->text('about_section_button_href')->nullable();
			$table->text('about_section_button_text')->nullable();
			$table->text('contact_section_title')->nullable();
			$table->text('contact_section_number')->nullable();
			$table->text('contact_section_email')->nullable();

			$table->string('cover_photo_id', 36)->nullable()->index('fk_hc_pages_translations_hc_resources1_idx');
			$table->string('author_id', 36)->nullable()->index('fk_hc_pages_translations_hc_users1_idx');
			$table->timestamp('publish_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('expires_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_pages_translations');
	}

}
