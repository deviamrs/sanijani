<?php

namespace App\Http\Controllers;

use App\Model\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.service.index')->withServices(Service::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

        
        // dd($request->all());   

        $request->validate([
         'service_name' => 'required|unique:services' ,
         'service_front_image' => 'required|mimes:jpg,jpeg,png,webp|max:500' ,
         'service_front_data' => 'required' ,
         'service_banner' => 'required|mimes:jpg,jpeg,png,webp|max:500' ,
         'status' => 'required',
         'status_front' => 'required',
         'front_service_data' => 'required',
        ]);
     

    

        $data = [];

        $data['service_name'] = $request->service_name;

        $file_name = time().$request->file('service_front_image')->getClientOriginalName();
    
        $path = Storage::putFileAs('backend/serviceImages', $request->file('service_front_image') , $file_name);

        $data['service_front_image'] = $path;

        if ($request->has('front_image_alt')) {  $data['front_image_alt'] =  $request->front_image_alt ;  }

        $data['service_front_data'] = 	$request->service_front_data;

        $file_name_banner = time().$request->file('service_banner')->getClientOriginalName();
    
        $path_banner = Storage::putFileAs('backend/serviceBannerImages', $request->file('service_banner') , $file_name_banner);
           
        $data['service_banner'] = $path_banner;  

        $data['status_front'] = $request->status_front;

        if ($request->has('page_title')) {  $data['page_title'] =  $request->page_title ;  }

        if ($request->has('page_meta_title')) {  $data['page_meta_title'] =  $request->page_meta_title ;  }
        
        if ($request->has('page_decription')) {  $data['page_decription'] =  $request->page_decription ;  }

        if ($request->has('page_meta_decription')) {  $data['page_meta_decription'] =  $request->page_meta_decription;  }

        $data['slug'] =  Str::slug($data['service_name']) ;

        $data['status'] = $request->status;

        $data['front_service_data'] = $request->front_service_data;

        Service::create($data);

        return redirect(route('service.index'))->with('success' , 'Service created  successfully' );




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('admin.service.create')->withService($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $request->validate([
            'service_name' => 'required' ,
           
            'service_front_data' => 'required' ,
            'status' => 'required',
            'status_front' => 'required',
            'front_service_data' => 'required',
           ]);
        
         $data = [];  

         $data['service_name'] = $request->service_name;

         if ($request->has('service_front_image')) {
          
             $request->validate([ 'service_front_image' => 'required|mimes:jpg,jpeg,png,webp|max:500' ,]);

            $file_name = time().$request->file('service_front_image')->getClientOriginalName();
    
            $path = Storage::putFileAs('backend/serviceImages', $request->file('service_front_image') , $file_name);
    
            $data['service_front_image'] = $path;

            try {
                if ( Storage::exists($service->service_front_image)) {Storage::delete($service->service_front_image);   }  
            } catch (\Throwable $th) { }
         }
         if ($request->has('front_image_alt')) {  $data['front_image_alt'] =  $request->front_image_alt ;  }
         
         $data['service_front_data'] = 	$request->service_front_data;

         $data['status_front'] = $request->status_front;
         
         if ($request->has('service_banner')) {
             
            $request->validate([ 'service_banner' => 'required|mimes:jpg,jpeg,png,webp|max:500' ,]);

            $file_name_banner = time().$request->file('service_banner')->getClientOriginalName();
    
            $path_banner = Storage::putFileAs('backend/serviceBannerImages', $request->file('service_banner') , $file_name_banner);
               
            $data['service_banner'] = $path_banner; 

            try {
                if ( Storage::exists($service->service_banner)) {Storage::delete($service->service_banner);   }  
            } catch (\Throwable $th) { }
         }

 
         if ($request->has('page_title')) {  $data['page_title'] =  $request->page_title ;  }
 
         if ($request->has('page_meta_title')) {  $data['page_meta_title'] =  $request->page_meta_title ;  }
         
         if ($request->has('page_decription')) {  $data['page_decription'] =  $request->page_decription ;  }
 
         if ($request->has('page_meta_decription')) {  $data['page_meta_decription'] =  $request->page_meta_decription;  }
 
         $data['slug'] =  Str::slug($data['service_name']) ;
 
         $data['status'] = $request->status;

         $data['front_service_data'] = $request->front_service_data;

         $service->update($data);

         return redirect(route('service.index'))->with('success' , 'Service Updated  successfully' );

           


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
       try {
        if ( Storage::exists($service->service_front_image)) {Storage::delete($service->service_front_image);   }  
        if ( Storage::exists($service->service_banner)) {Storage::delete($service->service_banner);   }  
     

       } catch (\Throwable $th) { }

       $service->delete();

       return redirect(route('service.index'))->with('success' , 'Service Deleted  successfully' );
    }
}
