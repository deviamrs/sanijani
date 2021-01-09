<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
       
        ['testimonial_content' , 'name' , 'place' ,'status' , 'featured'];

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->longText('testimonial_content');
            $table->string('name');
            $table->string('place');
            $table->boolean('status');
            $table->boolean('featured')->default(0);
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
        Schema::dropIfExists('testimonials');
    }
}
