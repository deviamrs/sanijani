<?php

namespace App\Http\Controllers;

use App\Model\Post;
use App\Model\PostDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postid)
    {
        //
        $post = Post::findOrFail($postid); 
        return view('admin.postdescription.index')->withPostdescriptions(PostDescription::where('post_id' , $postid)->get())->withPost($post);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($postid)
    {
        //
         
       $post = Post::findOrFail($postid); 

       return view('admin.postdescription.create')->withPost($post); 



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $postid)
    {
        //

        $data = [];
         
        if ($request->has('video_url')) {
              
            if (strlen($request->video_url)  >  20  ) {
                    
                      $request->validate([ 'video_url' => 'url' ]);


                      parse_str(parse_url($request->video_url , PHP_URL_QUERY ) , $vidid );
 
                     
                      
                        $data['video_url']  =  $vidid['v'];

            }  
            
            else{

                $data['video_url']  = null;

            }
                
            
        }

         if($request->hasFile('additional_image')){

            $request->validate(['additional_image'  => 'required|image|mimes:jpg,png,jpeg|max:1000']);

            $additional_image = time().$request->file('additional_image')->getClientOriginalName();
    
            $path = Storage::putFileAs('backend/postImages', $request->file('additional_image') , $additional_image);
             
            $data['additional_image'] = $path;

        }

         if($request->has('additional_text')){

            $data['additional_text']  = $request->additional_text;
          }


         if($request->has('description_alt_image')){

            $data['description_alt_image']  = $request->description_alt_image;
          }

           

         
        $data['post_id'] = $postid;
          
          
        PostDescription::create($data);   

         return redirect(route('postdescription.index' , $postid ))->with('success' , 'Addtional Description Added Successfully');  

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PostDescription  $postDescription
     * @return \Illuminate\Http\Response
     */
    public function show(PostDescription $postDescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PostDescription  $postDescription
     * @return \Illuminate\Http\Response
     */
    public function edit(PostDescription $postDescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PostDescription  $postDescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $postid ,  $postDescription)
    {
        //

        $desc = PostDescription::findOrFail($postDescription);

        // dd($desc);


        $data = [];
         
        if ($request->has('video_url')) {
              
            if (strlen($request->video_url)  >  20  ) {
                    
                      $request->validate([ 'video_url' => 'url' ]);


                      parse_str(parse_url($request->video_url , PHP_URL_QUERY ) , $vidid );
 
                     
                      
                        $data['video_url']  =  $vidid['v'];

            }  
            
            else{

                $data['video_url']  = null;

            }
                
            
        }

         if($request->hasFile('additional_image')){

            $request->validate(['additional_image'  => 'required|image|mimes:jpg,png,jpeg|max:1000']);

            $additional_image = time().$request->file('additional_image')->getClientOriginalName();
    
            $path = Storage::putFileAs('backend/postImages', $request->file('additional_image') , $additional_image);
             
            $data['additional_image'] = $path;



            try {
                if ( Storage::exists($desc->additional_image)) {
                    Storage::delete($desc->additional_image);
                }
            } catch (\Throwable $th) {
                 
            }   

        }

         if($request->has('additional_text')){

            $data['additional_text']  = $request->additional_text;
          }

          if($request->has('description_alt_image')){

            $data['description_alt_image']  = $request->description_alt_image;
          }

         
        // $data['post_id'] = $postid;
          
          
         $desc->update($data);   

         return redirect(route('postdescription.index' , $postid ))->with('success' , 'Addtional Description Updated Successfully');  

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\PostDescription  $postDescription
     * @return \Illuminate\Http\Response
     */
    public function destroy($postid , $postDescriptionid )
    {   

       $desc =   PostDescription::findOrFail($postDescriptionid);
       
        try {
            if ( Storage::exists($desc->additional_image)) {
                Storage::delete($desc->additional_image);
            }
        } catch (\Throwable $th) {
             
        }   
        
        
        $desc->delete();

        return redirect()->back()->with('success' , 'Addtional Description Deleted Successfully');  
    }
}
