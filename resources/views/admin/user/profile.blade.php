@extends('layouts.app')


@section('content')


 <div class="card p-5">
  <div class="d-flex justify-content-between">

    <a href="{{ route('profile.edit' , $user->id ) }}" class="btn btn-primary align-self-center">
      Edit @if (Auth::user()->id == $user->id)   {{ 'My' }} Profile @else {{ $user->name }} Profile @endif  
      </a>
    <h5>
      @if (Auth::user()->id == $user->id)
      {{ 'My' }} Profile
     @else
     {{ $user->name }} Profile
     @endif     
    </h5>
    </div>
 
   
 
    <hr>
    
     <div class="row p-1">
        <div class="col-md-6">
           <div class="table-responsive">
            <table class="table table-hover">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Details</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Name</th>
                  <td> {{ $user->name }}</td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td> {{ $user->email }}</td>
                </tr>
                <tr>
                  <th scope="row">About</th>
                  <td> {{ $user->profile->detail }}</td>
                </tr>
                {{-- <tr>
                  <th scope="row">Insta</th>
                  <td> {{ $user->profile->instagram }}</td>
                </tr>
                <tr>
                  <th scope="row">FaceBook</th>
                  <td> {{ $user->profile->facebook }}</td>
                </tr> --}}
                <tr>
                  <th scope="row">Linkedin</th>
                  <td> {{ $user->profile->linkedin }}</td>
                </tr>
              </tbody>
            </table>
           </div>
        </div>
        <div class="col-md-6 text-center">
         <h3 >Profile Image </h3>  
         <img src="{{ asset('public'.$user->profile->avatar) }}" alt="" class="w-50 mx-auto">
        </div>
     </div>
   

 </div> 



@endsection