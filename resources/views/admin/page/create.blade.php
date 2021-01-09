

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')


<div class="card col-md-12 col-lg-9 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($page) ? 'Edit' : 'Add'}} page </h6>
   </div>
   <div class="card-body">
   <form action="{{ isset($page) ? route('page.update' , $page->id) : route('page.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @isset($page)
         @method('PUT')
      @endisset     

      <div class="row">
         <div class="col-md-6">
            <div class="form-group">
               <label for="page Main Heading"> Page Main Head</label>
               <input type="text" class="form-control @error('page_name') is-invalid @enderror" placeholder="page Heading" name="page_name"  value="{{ isset($page) ? $page->page_name : old('page_name ') }}"> 
               @error('page_name')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div>     
            <div class="form-group">
               <label for="page Main Heading"> Page Title (For SEO)</label>
               <input type="text" class="form-control @error('page_title') is-invalid @enderror" placeholder="Page Main Title" name="page_title"  value="{{ isset($page) ? $page->page_title : old('page_title ') }}"> 
               @error('page_title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div>   
            <div class="form-group">
               <label for="page Main Heading"> Page Meta Title (For SEO)</label>
               <input type="text" class="form-control @error('page_meta_title') is-invalid @enderror" placeholder="Page Meta Title" name="page_meta_title"  value="{{ isset($page) ? $page->page_meta_title : old('page_meta_title ') }}"> 
               @error('page_meta_title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div>   
            <div class="form-group">
               <label for="page Main Heading"> Page Description (For SEO)</label>
               <textarea type="text" class="form-control @error('page_description') is-invalid @enderror" placeholder="Page Meta Title" name="page_description"  value="">{{ isset($page) ? $page->page_description : old('page_description ') }} </textarea>
               @error('page_description')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div>   

             @isset($page)
                 @if ($page->big_bold_head != null)
                  <div class="form-group">
                     <label for="page Main Heading"> Big Bold Text</label>
                     <input type="text" class="form-control @error('banner_head') is-invalid @enderror" placeholder="page Heading" name="banner_head"  value="{{ isset($page) ? $page->big_bold_head : old('banner_head ') }}"> 
                     @error('banner_head')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>  
                 @endif
             @endisset
           
         </div>
           <div class="col-md-6">
            @isset($page)
            @if ($page->page_banner != null)
            <div class="form-group">
               <label for="" class="d-block">Current Image </label>   
               <img src="{{ asset('public/'.$page->page_banner) }}" alt=""  width="120">
            </div>   
            @endif
           @endisset 
            
           @isset($page)
               @if ($page->page_banner != null)
                  <div class="form-group">
                     <label for="subheading">Page Banner</label>
                     <input type="file" name="page_banner" id="" class="form-control @error('page_banner') is-invalid @enderror">
                     @error('page_banner')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               @endif
           @endisset
           @isset($page)
           @if ($page->og_share_image != null)
           <div class="form-group">
              <label for="" class="d-block">Og Share Current Image </label>   
              <img src="{{ asset('public/'.$page->og_share_image) }}" alt=""  width="120">
           </div>   
           @endif
                  <div class="form-group">
                     <label for="subheading">Og Share Image</label>
                     <input type="file" name="og_share_image" id="" class="form-control @error('og_share_image') is-invalid @enderror">
                     @error('og_share_image')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
          @endisset 

           <div class="form-group">
            <label for="page Main Heading"> Page Og Description (For SEO)</label>
            <textarea type="text" class="form-control @error('page_og_description') is-invalid @enderror" placeholder="Page Meta Title" name="page_og_description"  value="">{{ isset($page) ? $page->page_og_description : old('page_og_description ') }} </textarea>
            @error('page_og_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>   
         </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block" id="">Submit</button>
      
   </form>
  
   </div>
</div>
@endsection











              

              <!-- Form Basic -->
        

         
             
           