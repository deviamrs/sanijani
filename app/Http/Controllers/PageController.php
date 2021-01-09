<?php

namespace App\Http\Controllers;

use App\Model\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //

        
         
        return view('admin.page.index')->with('pages' , Page::all());
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.create');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
        return view('admin.page.create')->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
         $request->validate([
            'page_name' =>'required',
         ]);

         $data = [];

         $data['page_name'] = $request->page_name;

         if ($request->has('page_title')) { $data['page_title'] = $request->page_title ; }
         if ($request->has('page_meta_title')) { $data['page_meta_title'] = $request->page_meta_title ; }
         if ($request->has('page_description')) { $data['page_description'] = $request->page_description ; }
        
          if ($request->has('page_banner')) {
             
            $request->validate([ 'page_banner' => 'required|mimes:jpg,jpeg,png,webp|max:400',]);
            
            $file_name = time().'.'.$request->file('page_banner')->getClientOriginalExtension();
    
            $path = Storage::putFileAs('backend/pageBannerImages', $request->file('page_banner') , $file_name);
    
            $data['page_banner'] = $path;

            try {  
                if ( Storage::exists($page->page_banner)) {
                    Storage::delete($page->page_banner);
                }
                 
            }      
             catch (\Throwable $th) {  } 
             
          }

          if ($request->has('banner_head')) { $data['banner_head'] = $request->banner_head ; }


          if ($request->has('og_share_image')) {

            $request->validate([ 'og_share_image' => 'required|mimes:jpg,jpeg,png,webp|max:150',]);
              
            $file_name_og = time().$request->file('og_share_image')->getClientOriginalName();
    
            $path_og = Storage::putFileAs('backend/pageBannerImages', $request->file('og_share_image') , $file_name_og);
    
            $data['og_share_image'] = $path_og;

            try {  
                if ( Storage::exists($page->og_share_image)) {
                    Storage::delete($page->og_share_image);
                }
                 
            }      
             catch (\Throwable $th) {  } 
             
          }

          if ($request->has('page_og_description')) { $data['page_og_description'] = $request->page_og_description ; }


          $page->update($data);

          return redirect(route('page.index'))->with('success' , 'Page Data Updated Successully');
           

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
