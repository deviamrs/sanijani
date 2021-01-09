<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostDescription extends Model
{
    protected $fillable = [ 'post_id' , 'video_url' , 'additional_image' , 'additional_text' , 'description_alt_image'];
}
