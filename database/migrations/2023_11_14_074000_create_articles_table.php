<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('articles', function (Blueprint $table) {
			$table->id();
			$table->string('udid')->nullable(false)->default('')->comment('唯一ID');
			$table->string('title')->nullable(false)->default('')->comment('标题');
			$table->text('body')->nullable(false)->comment('内容');
			$table->dateTime('created_at')->nullable()->useCurrent();
			$table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
			$table->dateTime('deleted_at')->nullable();
		});
		Schema::create('article_tag', function (Blueprint $table) {
			$table->unsignedBigInteger('article_id')->nullable(false)->default(0)->comment('');
			$table->unsignedBigInteger('tag_id')->nullable(false)->default(0)->comment('');
			$table->unique(['article_id','tag_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('articles');
		Schema::dropIfExists('article_tag');
	}
};
