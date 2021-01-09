<?php

namespace App\Http\Controllers;

use App\Model\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.testimonial.index')->withTestimonials(Testimonial::orderBy('id' , 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.testimonial.create');
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
            
            'testimonial_content' => 'required' ,
            'name' => 'required' , 
            'status' => 'required' ,
            'place' => 'required' ,
            
        ]);  
          
        $data['testimonial_content'] = $request->testimonial_content;
        $data['name'] = $request->name;
        $data['place'] = $request->place;
        $data['status'] = $request->status;
        if ($request->has('featured')) {
            $data['featured'] = $request->featured;
        }


        Testimonial::create($data);


              
        return redirect(route('testimonial.index'))->with('success' , 'testimonial created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        //
        return view('admin.testimonial.create')->withTestimonial($testimonial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //

        $request->validate([ 
            
            'testimonial_content' => 'required' ,
            'name' => 'required' , 
            'status' => 'required' ,
            'place' => 'required' ,
            
        ]);  
          
        $data['testimonial_content'] = $request->testimonial_content;
        $data['name'] = $request->name;
        $data['place'] = $request->place;
        $data['status'] = $request->status;
        if ($request->has('featured')) {
            $data['featured'] = $request->featured;
        }


        $testimonial->update($data);

      
        return redirect(route('testimonial.index'))->with('success' , 'testimonial updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
        $testimonial->delete();

        return redirect(route('testimonial.index'))->with('success' , 'testimonial deleted Successfully');
    }
}
