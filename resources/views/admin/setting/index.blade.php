@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')


<div class="card col-md-5">
   <div class="d-flex justify-content-end pt-3" >
      <a href="{{ route('setting.edit' , $setting->id) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>   
      </div>  
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">General Settings</h6>
   </div>
   <div class="table-responsive">
     <table class="table align-items-center table-flush">
       <thead class="thead-light">
         <tr>
           <th><i class="fas fa-cog"></i> Setting Name </th>
           <th>Detail</th>
         </tr>
       </thead>
       <tbody>  
         <tr>
           <td><i class="far fa-envelope"></i> Address</td>
            <td>{{ $setting->address }}</td> 
         </tr>  
         <tr>
           <td><i class="far fa-envelope"></i> Phone</td>
            <td>{{ $setting->phone }}</td> 
         </tr> 
         <tr>
           <td><i class="far fa-envelope"></i> Mail Id</td>
            <td>{{ $setting->mail_id }}</td> 
         </tr>
         <tr>
           <td><i class="fab fa-facebook"></i> Facebook</td>
            <td>{{ $setting->facebook }}</td> 
         </tr>
         <tr>
           <td><i class="fab fa-twitter"></i> Twitter</td>
            <td>{{ $setting->twitter }}</td> 
         </tr>
         <tr>
           <td><i class="fab fa-instagram"></i> Instagram</td>
            <td>{{ $setting->instagram }}</td> 
         </tr>
       
       </tbody>
     </table>
   </div>
 </div>


@endsection