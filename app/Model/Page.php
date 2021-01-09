<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = [

         'page_name',
         'page_title',
         'page_meta_title',
         'page_description',
         'page_banner',
         'banner_head',
         'og_share_image',
         'page_og_description',
         'slug'
 
 
     ];
}
