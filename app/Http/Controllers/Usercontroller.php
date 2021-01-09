<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{      
    
    public function __construct(){


       
        $this->middleware('admin')->except(['passwordreset' , 'passwordchange']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.user.index')->with('users' , User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.user.create');
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
        
        $request->validate([ 'name' => 'required' , 'email' => 'required|email|unique:users' , 'gender' => 'required']);


        $user = User::create([
       
            'name' => $request->name,
  
            'email' => $request->email ,
            
            'password' => Hash::make('admin@321#'),
  
         ]); 

         $data = [];
         
         if($request->gender == 'male'){
         
             $data['gender'] = '/backend/userImages/male.png';


         }
         else{
            $data['gender'] = '/backend/userImages/female.png';

         }

         Profile::create([

            'user_id' =>  $user->id ,
            
            'gender' => $request->gender,

            'avatar' => $data['gender'],
 
            'detail' => 'You are Not The High Comman user',
 
            // 'facebook' => 'https://www.facebook.com',
 
            // 'instagram' => 'https://www.instagram.com',

          

            'linkedin' => 'https://www.linkedin.com',
 
        ]);


        session()->flash('success' , 'User Created Successfully');


        return redirect(route('user.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
            
        $user = User::find($id);
           
        if($user->posts->count() > 0){

         session()->flash('danger' , 'You can not delete this user because this user is associated with '. $user->posts->count() .' posts');   
            
         return redirect()->back();

        }

        $user->profile->delete();

        $user->delete();
        
        session()->flash('success' , 'User Terminated Successfully');

        return redirect(route('user.index'));
    }
   


    public function passwordreset(){
         
        return view('admin.user.passwordreset');

    }
    public function passwordchange(Request $request, $id){
        
        
        $user = User::findOrFail($id);

        $request->validate( [ 'password' => 'required|string|min:8|confirmed']); 
        
        $password = Hash::make($request->password);
        
        $user->password = $password;

        $user->save();
         
        return redirect()->route('login')->with('success' , 'Password Updated Successfully Please Login To Continue');

        // return view('admin.user.passwordreset');

    }

    public function makeAdmin($id){

          
        $user = User::find($id);


        $user->role_id = 1;

        $user->save();

        session()->flash('success' , 'Permission Granted Successfuly');
        

        return redirect()->back();

    }

    public function killAdmin($id){
        $user = User::find($id);
        $user->role_id = 0;
        $user->save();
        session()->flash('success' , 'Permission Removed Successfuly');
        return redirect()->back();
    }
}