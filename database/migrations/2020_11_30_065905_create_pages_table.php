<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('page_title')->nullable();
            $table->string('page_meta_title')->nullable();
            $table->text('page_description')->nullable();
            $table->string('page_banner')->default('backend/pageBanner/bannerfst.jpg')->nullable();
            $table->text('banner_head')->nullable();
            $table->string('og_share_image')->nullable();
            $table->text('page_og_description')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('pages');
    }
}
