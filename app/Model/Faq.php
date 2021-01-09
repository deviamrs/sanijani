<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //

    protected $fillable = ['faq_category_id' , 'question' , 'answer' , 'status' , 'featured'];

    public function user()
    {
        return $this->belongsTo(FaqCategory::class);
    }
}
