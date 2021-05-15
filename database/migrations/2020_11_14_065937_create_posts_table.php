<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->default(0);
            $table->unsignedInteger('category_id')->default(0);
            $table->string('title');
            $table->string('slug')->unique()->comment('SEO优化');
            $table->string('subtitle')->default('');
            $table->string('keyword')->default('');
            $table->string('description')->default('');
            $table->string('thumbnail')->default('');
            $table->text('content');
            $table->unsignedInteger('visited')->default(0);
            $table->boolean('is_draft')->default(false)->comment('该文章是否是草稿');
            $table->softDeletes();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
