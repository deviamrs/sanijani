<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //
        
     if(Auth::user()->role_id){

        return view('admin.post.index')->with('posts' , Post::orderBy('id' , 'desc')->get());   

    }
    
    else{
       
    
        $query =   Post::orderBy('id' , 'desc')->where('user_id' , Auth::user()->id )->get();      
    
        return view('admin.post.index')->with('posts' , $query);


    }
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();
        
        // return dd($tags->count());

        if(count($categories) == 0 ){    
             session()->flash('warning' , 'Seems Like You dont have any Category to create blog');
             return redirect()->route('category.create');   
          
        }
        if(count($tags) == 0){
            session()->flash('warning' , 'Seems Like You dont have any Tags to create blog');
            return redirect()->route('tag.create'); 
        }
        return view('admin.post.create')->with('categories' , Category::all())->with('tags' , Tag::all());
    }

    
  



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    

       
        
        $request->validate(['title' => 'required|unique:posts' , 
                           'category_id' => 'required' ,
                           'small_description' => 'required' ,     
                           'image'  => 'required|mimes:jpg,png,jpeg|max:1000',
                            'tags' => 'required',
  
        ]);
    

        $file_name = time().$request->file('image')->getClientOriginalName();
    
        $path = Storage::putFileAs('backend/postImages', $request->file('image') , $file_name);
        $supercategory_id = Category::find($request->category_id)->supercategory_id;
       
        $data = [ 'title' => $request->title,
  
        'category_id' => $request->category_id,
        
        'small_desc' => $request->small_description, 

        'user_id' => Auth::user()->id,

        'image' =>  $path, 

        // 'full_desc'  => $request->full_description,

    ];

       if ($request->has('slug')) {
          
           if ($request->slug != null) {
               $request->validate(['slug' => 'unique:posts']);
              
               $data['slug'] = Str::slug($request->slug , '-');

           }

           else{

               $data['slug'] = Str::slug($request->title , '-');

           }

       }    


        if($request->has('post_meta')){
               
            $data['post_meta'] = $request->post_meta;
 

        }
        if($request->has('post_title')){
            $data['post_title'] = $request->post_title;
        }
        


        if($request->has('post_meta_title')){
            $data['post_meta_title'] = $request->post_meta_title;
        }


        if($request->has('post_alt_image')){
            $data['post_alt_image'] = $request->post_alt_image;
        }
         
     
         $post = Post::create($data);
    
     
         $post->save();

         if($request->tags){
            $post->tags()->attach($request->tags); 
 
         }






         session()->flash('success' , 'Blog Post Created Successfully');

         return redirect()->route('post.show' , $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
         return view('admin.post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.post.create')->with('categories' , Category::all())->with('tags' , Tag::all())->with('post' , $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        

         $request->validate(['title' => 'required' , 'category_id' => 'required' ,  'small_description' => 'required' ,  'tags' => 'required'
 
        ]);

        $supercategory_id = Category::find($request->category_id)->supercategory_id;
        
        $data =   $request->only([ 'title' , 'category_id' , 'small_description' ,]);



        if($request->has('post_meta')){
               
            $data['post_meta'] = $request->post_meta;
 

        }

        if($request->hasFile('image')){

            $request->validate(['image'  => 'required|image|mimes:jpg,png,jpeg|max:1000']);

            $file_name = time().$request->file('image')->getClientOriginalName();
    
            $path = Storage::putFileAs('backend/postImages', $request->file('image') , $file_name);
             
            $data['image'] = $path;

            try {  
                if ( Storage::exists($post->image)) {
                    Storage::delete($post->image);
                }
                 
            }      
             catch (\Throwable $th) {  } 

        }
        
        

       

        $data['supercategory_id'] = $supercategory_id; 
        
        $data['small_desc'] = $request->small_description;

        // $data['full_desc'] = $request->full_description;


        
        if($request->has('post_title')){
            $data['post_title'] = $request->post_title;
        }

        if($request->has('post_meta_title')){
            $data['post_meta_title'] = $request->post_meta_title;
        }


        if($request->has('post_alt_image')){
            $data['post_alt_image'] = $request->post_alt_image;
        }


        
        if ($request->has('slug')) {
          
            if ($request->slug != null) {
            
                $data['slug'] = Str::slug($request->slug , '-');
            }

            else{
 
                $data['slug'] = Str::slug($request->title , '-');
 
            }
 
        }

        if($request->tags){
             
          
            $post->tags()->sync($request->tags); 
    
        }  
          $post->update($data);


         session()->flash('success' , 'Blog Post Updated Successfully');

         return redirect()->route('post.index');
        
    }
     

    public function setfeatured($id){
         
        $post = Post::find($id);

        $post->featured = 1;

        $post->save();

        session()->flash('success' , 'Post Set To Featured Successfuly');
        
        return redirect()->back();
      

    }
    public function removefeatured($id){
         
        $post = Post::find($id);

        $post->featured = 0;

        $post->save();

        session()->flash('success' , 'Post Remove From Featured Successfully');
        
        return redirect()->back();
    
    }

    public function setpublish($id){
         
         
        $post = Post::find($id);


        $publishdate = Carbon::now();
  
        $post->publish_date = $publishdate;

        $post->publish = 1;

        $post->save();

        session()->flash('success' , 'Post Published Successfuly'); 
        
        return redirect()->back();
      

    }

    public function removepublish($id){
         
        
        




        $post = Post::find($id);
        
        // if ($post->postposition) {
        //     return redirect()->back()->with('danger' , 'Change the  '. $post->postposition->position_name .' blog in   that postion Then Try Again');
        // }

        $post->publish = 0;

        $post->save();

        session()->flash('success' , 'Post Has Been Set To Draft Successfuly'); 

        return redirect()->back();
      

    }


    public function getfeatured(){
        
         $posts = Post::where('featured' , 1 )->orderBy('id' , 'desc' )->get();           
        
         $featured = 'Featured';

         return view('admin.post.index')->withPosts($posts)->withFeatured($featured);
         


    }
    public function getpublished(){
        
        $posts = Post::where('publish' , 1 )->orderBy('id' , 'desc' )->get();           
        
         $featured = 'Published';

         return view('admin.post.index')->withPosts($posts)->withPublished($featured);
         


    }
    public function getdraftPost(){
        
         $posts = Post::where('publish' , 0 )->orderBy('id' , 'desc' )->get();           

         $featured = 'Draft';

         return view('admin.post.index')->withPosts($posts)->withDraft($featured);
         


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
       
        // if ($post->postposition) {
        //     return redirect()->back()->with('danger' , 'Change the  '. $post->postposition->position_name .' blog in   that postion Then Try Again');
        // }
        // else{
            $tags = $post->tags;

            $post->tags()->detach($tags);
            try {  
                if ( Storage::exists($post->image)) {
                    Storage::delete($post->image);
                }
             
               
                 
            }     
             catch (\Throwable $th) {   }
            
            if($post->postdescriptions->count() > 0){
              
               foreach ($post->postdescriptions as $key => $desc) {
                 
                  try {
                    if ( Storage::exists($desc->additional_image)) {
                                Storage::delete($desc->additional_image);
                            }
                  } catch (\Throwable $th) {
                      //throw $th;
                  }
                 
                  $desc->delete();

               }    
                
            }
            $post->delete();
            session()->flash('success' , 'Blog Post Deleted Successfully');   
            return redirect()->back();
        // 


       
    }

    public function bycategory($id){

        if(Auth::user()->role_id){

            return view('admin.post.index')->with('posts' ,  Post::where('category_id' , $id)->orderBy('id' , 'desc')->get());   
        }
        
        else{
           
            $query =    Post::where('category_id' , $id)->where( 'user_id' , Auth::user()->id )->orderBy('id' , 'desc')->get();      
        
            return view('admin.post.index')->with('posts' , $query);
  
        }

    }

    public function byUser($id){
       
       return view('admin.post.index')->withPosts(User::find($id)->posts()->orderBy('id' , 'desc')->get())->withUsername(User::find($id)->name);
    
    } 

    public function bytag($id){
       
       return view('admin.post.index')->withPosts(Tag::find($id)->posts()->orderBy('id' , 'desc')->where('user_id' , Auth::user()->id)->get())->withTagname(Tag::find($id)->name);
    
    }
}
