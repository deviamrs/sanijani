<?php

namespace App\Http\Controllers;

use App\Model\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.about.index')->withAbouts(About::orderBy('id' , 'desc')->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.about.create');
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
        $request->validate(['about_heading' => 'required' , 'about_content' => 'required' , 'status' => 'required']);
         
        $data['about_heading'] = $request->about_heading;

        $data['about_content'] = $request->about_content;

        $data['status']  = $request->status;

        About::create($data);

        return redirect(route('about.index'))->with('success' , 'About Section Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
        return view('admin.about.create')->withAbout($about);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //


        $request->validate(['about_headding' => 'required' , 'about_content' => 'required' , 'status' => 'required']);
         
        $data['about_heading'] = $request->about_heading;

        $data['about_content'] = $request->about_content;

        $data['status']  = $request->status;

        $about->update($data);

        return redirect(route('about.index'))->with('success' , 'About Section Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
       $about->delete();
       
       return redirect(route('about.index'))->with('success' , 'About Section Deleted Successfully');

    }
}
