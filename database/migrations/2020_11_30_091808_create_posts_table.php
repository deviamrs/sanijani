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
            $table->text('title');
            $table->integer('user_id');
            $table->boolean('featured')->default(0);
            $table->boolean('publish')->default(0);
            $table->integer('category_id');
            $table->text('small_desc');
            $table->string('image');
            $table->text('slug');
            $table->string('post_meta')->nullable();
            $table->string('post_title')->nullable(); 
            $table->string('post_meta_title')->nullable();
            $table->string('post_alt_image')->nullable();
            $table->timestamp('publish_date')->nullable();
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
