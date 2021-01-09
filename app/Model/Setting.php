<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //

    protected $fillable = [

        'address',
        'map_url',
        'phone',
        'mail_id',
        'linkedin',
        'facebook',
        'instagram',
        'twitter',


    ];
}
