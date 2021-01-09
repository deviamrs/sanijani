<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    protected $fillable = [
         
        'service_name',
        'service_front_image',
        'front_image_alt',
        'service_front_data',
        'service_banner',
        'status_front',
        'page_title',
        'page_meta_title',
        'page_decription',
        'page_meta_decription',
        'slug',
        'status',
        'front_service_data',


    ];
}
