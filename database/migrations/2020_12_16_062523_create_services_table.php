<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('service_name');
            $table->string('service_front_image');
            $table->string('front_image_alt')->nullable();
            $table->text('front_service_data');
            $table->boolean('status_front'); 
            $table->longText('service_front_data');
            $table->string('service_banner');   
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
        Schema::dropIfExists('services');
    }
}
