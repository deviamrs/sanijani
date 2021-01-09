<?php



namespace App\Model;

use App\User;

use App\Model\Supercategory;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ 'title' , 'category_id' , 'supercategory_id' ,'small_desc', 'featured' ,'user_id', 'image' ,'full_desc' ,  'slug' , 'post_title', 'post_meta' , 'post_meta_title' , 'post_alt_image' , 'publish_date' ];

    
    protected $casts = [
        'additonal_data' => 'array'
    ];

    protected $dates = [
        'created_at' ,  'updated_at' ,  'publish_date', 
    ];


    
    public function category(){

          
        return $this->belongsTo(Category::class);


    }
    
    public function supercategory(){

          
        return $this->belongsTo(Supercategory::class);


    }


    public function tags(){

       
        return $this->belongsToMany(Tag::class);


    }

    

    public function hasTag($tagId){

      
        return in_array($tagId , $this->tags->pluck('id')->toArray() );


    }


    public function user(){
    
          
         return $this->belongsTo(User::class);
          

    }


    public function postdescriptions(){
           
        return $this->hasMany(PostDescription::class);


    }

    public function postposition(){
           
        return $this->hasOne(Postposition::class);


    }

    


    
}
