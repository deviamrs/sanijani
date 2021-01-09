<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    //
   
    protected $fillable = [
    
         'other_head',
         'other_content',
         'page_banner',
         'banner_head',
         'page_title',
         'page_meta_title',
         'page_description',
         'slug',
         'status',

    ];

}
