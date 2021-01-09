<?php

namespace App\Http\Controllers;

use App\Model\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.setting.index')->withSetting(Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
        return view('admin.setting.create')->with( 'setting' ,  $setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //



        $request->validate([

        'address'          => 'required',
        'map_url'          => 'required|url',
        'phone'            => 'required',
        'mail_id'      => 'required|email',
        'linkedin'         => 'required|url',
      

        ]);

        $data = [
        'address'         => $request->address ,
        'map_url'         => $request->map_url ,
        'phone'           => $request->phone ,
        'mail_id'         => $request->mail_id ,
        'linkedin'        => $request->linkedin ,
        'instagram'        => $request->instagram ,
        'facebook'        => $request->facebook ,
        'twitter'        => $request->twitter ,
    
    
    
     ];
       

        $setting->update($data);

        return redirect()->route('setting.index')->with('success' , 'Setting Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
