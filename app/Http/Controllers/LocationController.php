<?php

namespace App\Http\Controllers;

use App\Model\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.location.index')->withlocations(Location::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'location_name' => 'required|unique:locations' ,
            'location_front_image' => 'required|mimes:jpg,jpeg,png,webp|max:500' ,
            'location_front_data' => 'required' ,
            'location_banner' => 'required|mimes:jpg,jpeg,png,webp|max:500' ,
            'status' => 'required',
            'status_front' => 'required',
            'front_location_data' => 'required',
           ]);
        
   
       
   
           $data = [];
   
           $data['location_name'] = $request->location_name;
   
           $file_name = time().$request->file('location_front_image')->getClientOriginalName();
       
           $path = Storage::putFileAs('backend/locationImages', $request->file('location_front_image') , $file_name);
   
           $data['location_front_image'] = $path;
   
           if ($request->has('front_image_alt')) {  $data['front_image_alt'] =  $request->front_image_alt ;  }
   
           $data['location_front_data'] = 	$request->location_front_data;
   
           $file_name_banner = time().$request->file('location_banner')->getClientOriginalName();
       
           $path_banner = Storage::putFileAs('backend/locationBannerImages', $request->file('location_banner') , $file_name_banner);
              
           $data['location_banner'] = $path_banner;  
   
           $data['status_front'] = $request->status_front;
   
           if ($request->has('page_title')) {  $data['page_title'] =  $request->page_title ;  }
   
           if ($request->has('page_meta_title')) {  $data['page_meta_title'] =  $request->page_meta_title ;  }
           
           if ($request->has('page_decription')) {  $data['page_decription'] =  $request->page_decription ;  }
   
           if ($request->has('page_meta_decription')) {  $data['page_meta_decription'] =  $request->page_meta_decription;  }
   
           $data['slug'] =  Str::slug($data['location_name']) ;
   
           $data['status'] = $request->status;
   
           $data['front_location_data'] = $request->front_location_data;
   
           Location::create($data);
   
           return redirect(route('location.index'))->with('success' , 'location created  successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
        return view('admin.location.create')->withLocation($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
        $request->validate([
            'location_name' => 'required' ,
           
            'location_front_data' => 'required' ,
            'status' => 'required',
            'status_front' => 'required',
            'front_location_data' => 'required',
           ]);
        
         $data = [];  

         $data['location_name'] = $request->location_name;

         if ($request->has('location_front_image')) {
          
             $request->validate([ 'location_front_image' => 'required|mimes:jpg,jpeg,png,webp|max:500' ,]);

            $file_name = time().$request->file('location_front_image')->getClientOriginalName();
    
            $path = Storage::putFileAs('backend/locationImages', $request->file('location_front_image') , $file_name);
    
            $data['location_front_image'] = $path;

            try {
                if ( Storage::exists($location->location_front_image)) {Storage::delete($location->location_front_image);   }  
            } catch (\Throwable $th) { }
         }
         if ($request->has('front_image_alt')) {  $data['front_image_alt'] =  $request->front_image_alt ;  }
         
         $data['location_front_data'] = 	$request->location_front_data;

         $data['status_front'] = $request->status_front;
         
         if ($request->has('location_banner')) {
             
            $request->validate([ 'location_banner' => 'required|mimes:jpg,jpeg,png,webp|max:500' ,]);

            $file_name_banner = time().$request->file('location_banner')->getClientOriginalName();
    
            $path_banner = Storage::putFileAs('backend/locationBannerImages', $request->file('location_banner') , $file_name_banner);
               
            $data['location_banner'] = $path_banner; 

            try {
                if ( Storage::exists($location->location_banner)) {Storage::delete($location->location_banner);   }  
            } catch (\Throwable $th) { }
         }

 
         if ($request->has('page_title')) {  $data['page_title'] =  $request->page_title ;  }
 
         if ($request->has('page_meta_title')) {  $data['page_meta_title'] =  $request->page_meta_title ;  }
         
         if ($request->has('page_decription')) {  $data['page_decription'] =  $request->page_decription ;  }
 
         if ($request->has('page_meta_decription')) {  $data['page_meta_decription'] =  $request->page_meta_decription;  }
 
         $data['slug'] =  Str::slug($data['location_name']) ;
 
         $data['status'] = $request->status;

         $data['front_location_data'] = $request->front_location_data;

         $location->update($data);

         return redirect(route('location.index'))->with('success' , 'location Updated  successfully' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
        try {
            if ( Storage::exists($location->location_front_image)) {Storage::delete($location->location_front_image);   }  
            if ( Storage::exists($location->location_banner)) {Storage::delete($location->location_banner);   }  
           } catch (\Throwable $th) { }
           $location->delete();
    
           return redirect(route('location.index'))->with('success' , 'location Deleted  successfully' );
    }
}
