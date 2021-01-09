<?php

namespace App\Http\Controllers;

use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.tag.index')->with('tags' , Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tag.create');
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
        
        $request->validate([ 'name' => 'required|unique:tags' ]);

        Tag::create([ 'name' => $request->name  , 'slug'  => Str::slug($request->name , '-')  ]);

        return redirect()->route('tag.index')->with('success' , 'Tag Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //

        return view('admin.tag.create')->with('tag' , $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $request->validate([ 'name' => 'required' ]);

        

        $tag->update(
          [
             'name' => $request->name,

             'slug'  => Str::slug($request->name , '-')

          ]

        );

        session()->flash('success' , 'Tag Updated Successfully');

        return redirect()->route('tag.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
         

        if(count($tag->posts) > 0 ){

            session()->flash('warning' , 'Tag Can not be deleted because ' . count($tag->posts) .' post are  associated with this Tag');

            return redirect()->back();

        }

        $tag->delete();

        session()->flash('success' , 'Tag Deleted Successfully');

        return redirect()->route('tag.index');

    }
}
