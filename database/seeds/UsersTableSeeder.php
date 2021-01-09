<?php

use App\User;
use App\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         $user = User::create([
       
            'name' => 'Sani Jani',
  
            'email' => 'admin@sanijani.com' ,
  
            'role_id' => 1, 
            
            'password' => Hash::make('sanijaniadmin@321#'),
  
         ]); 
 
         Profile::create([
  
             'user_id' =>  $user->id ,
              
             'gender' => 'male', 
  
             'avatar' => '/backend/userImages/male.png',
  
             'detail' => 'SAni jani details',
  
             'linkedin' => 'https://www.linkedin.com/',
  
         ]);
    }
}
