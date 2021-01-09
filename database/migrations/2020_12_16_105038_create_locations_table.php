<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->string('location_front_image');
            $table->string('front_image_alt')->nullable();
            $table->text('front_location_data');
            $table->boolean('status_front'); 
            $table->longText('location_front_data');
            $table->string('location_banner');   
            $table->string('page_title')->nullable();
            $table->string('page_meta_title')->nullable();
            $table->string('page_decription')->nullable();
            $table->string('page_meta_decription')->nullable();
            $table->string('slug');
            $table->boolean('status');
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
        Schema::dropIfExists('locations');
    }
}
