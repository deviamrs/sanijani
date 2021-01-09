<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use  Auth;

class ProfileController extends Controller
{
    //

    public function index(){

            
        return view('admin.user.profile')->with('user' , Auth::user());


    }
    public function edit($userid){
       
        if (Auth::user()->role_id) {
             
            
            $user  = User::findOrFail($userid); 
         
            return view('admin.user.create')->with('user' , $user);


        }

        else{
            return view('admin.user.create')->with('user' , Auth::user());
        }


       


    }
    public function updateuser(Request $request , $id){
      
        // return $request->all(); 

     
            
            $user = User::findOrFail($id);

            $request->validate([ 'name' => 'required' , 'email' => 'required|email' , 'gender'=> 'required', 'linkedin' => 'required|url'


                                //   'facebook' => 'required|url' , 'instagram' => 'required|url'
                                  
                                  ]);

        // dd($user);

        if($request->hasFile('avatar')){

              $avatar_name = time().$request->avatar->getClientOriginalName();

              $request->avatar->move(   public_path().'/backend/userImages' , $avatar_name);

              $user->profile->avatar = '/backend/userImages/'.$avatar_name;

              $user->profile->save();
 
        }

        $user->name = $request->name;

        $user->email = $request->email;

        $user->profile->gender = $request->gender;

        // $user->profile->facebook = $request->facebook;
        
        // $user->profile->instagram = $request->instagram;

        $user->profile->linkedin = $request->linkedin;

        $user->profile->detail = $request->detail;

        $user->save();

        $user->profile->save();

        if (Auth::user()->role_id) {
            return redirect(route('user.index'))->with('success' , 'profile Updated Successfully');
        }        
        return redirect()->route('profile')->with('success' , 'profile Updated Successfully');
        

    }
}
