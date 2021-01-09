<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    //

    protected $fillable = ['name' ,
     'slug' ,
     'page_banner' ,
     'page_title' ,
     'page_meta_title' ,
     'page_description' ,
     'status'];
    
     public function faqs()
     {
         return $this->hasMany(Faq::class);
     }


}
