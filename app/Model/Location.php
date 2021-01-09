<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

    protected $fillable = [
         
        'location_name',
        'location_front_image',
        'front_image_alt',
        'location_front_data',
        'location_banner',
        'status_front',
        'page_title',
        'page_meta_title',
        'page_decription',
        'page_meta_decription',
        'slug',
        'status',
        'front_location_data',
    ];
}
