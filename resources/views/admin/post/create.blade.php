

@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')


<div class="card col-md-12 col-lg-9 mb-4">
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
     <h6 class="m-0 font-weight-bold text-primary">{{ isset($post) ? 'Edit' : 'Add'}} Post </h6>
   </div>
   <div class="card-body">
   <form action="{{ isset($post) ? route('post.update' , $post->id) : route('post.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @isset($post)
         @method('PUT')
      @endisset     

      <div class="row">
         <div class="col-md-6">
            <div class="form-group">
               <label for="exampleInputPassword1">Front Title ( <small>This will also be the h1 tag of the page </small> )</label>
               <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title"  value="{{ isset($post) ? $post->title : old('title') }}"> 
               @error('title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div> 
            <div class="form-group">
               <label for="exampleInputPassword1">Title Tag (For SEO)( <small>This will set the page title in html </small> )</label>
               <input type="text" class="form-control @error('post_title') is-invalid @enderror" placeholder="title tag data" name="post_title"  value="{{ isset($post) ? $post->post_title : old('post_title') }}"> 
               @error('post_title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
             </div> 
             <div class="form-group">
               <label for="subheading">Post Meta Title (For SEO)</label>
               <input type="text" class="form-control @error('post_meta_title') is-invalid @enderror" placeholder="post meta title" name="post_meta_title"  value="{{ isset($post) ? $post->post_meta_title : old('post_meta_title') }}"> 
               @error('post_meta_title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
             <div class="form-group">
               <label for="subheading">Post Slug </label>
               <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="post slug" name="slug"  value="{{ isset($post) ? $post->slug : old('slug') }}"> 
               @error('slug')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
             <div class="form-group">
               <label for="head">Select Blog category With Supercategory</label>
                <select name="category_id" id="" class="form-control" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if (isset($post))  @if ($category->id == $post->category_id)  selected @endif @endif >{{ $category->name }} </option> 
                    @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
             </div> 
            
            
         </div>
           <div class="col-md-6">
            @isset($post)
            @if ($post->image != null)
            <div class="form-group">
               <label for="" class="d-block">Current Image </label>   
            <img src="{{ asset('public/'.$post->image) }}" alt=""  width="120">
            </div>   
            @endif
           @endisset   
            <div class="form-group">
               <label for="subheading">Post Image</label>
               <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror">
               @error('image')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group">
               <label for="subheading">Image Alt Description (For SEO)</label>
               <input type="text" class="form-control @error('description_alt_image') is-invalid @enderror" placeholder="image description" name="post_alt_image"  value="{{ isset($post) ? $post->post_alt_image : old('post_alt_image') }}"> 
               @error('description_alt_image')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>

            <div class="form-group">
               <label for="head">Select Tags For Post</label> 
                <select name="tags[]" id="post-tags" class="form-control" multiple required>
                    @foreach ($tags as $tag)
                <option value="{{ $tag->id }}"
                 @if (isset($post))
         
                    @if ($post->hasTag($tag->id))
                       selected   
                    @endif           
                 @endif
                 >{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
         
            <div class="form-group">
                <label for="">Post Meta Tag (For SEO)( <small>Please fill this for SEO purpose </small> )</label>
                <input type="text" name="post_meta" id="" class="form-control" value="{{  isset($post) ? $post->post_meta : ' '}} ">
            </div>
            <div class="form-group">
               <label for="head">Small Description ( <small> This will be set as the small Description Of the post </small> ) </label>
               <textarea name="small_description" id="" cols="30" rows="3" class="form-control @error('small_description') is-invalid @enderror">{{ isset($post) ? $post->small_desc : old('small_description') }}</textarea>
               @error('small_description')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>

         </div>

        
      </div>
   
     
      


      <button type="submit" class="btn btn-primary btn-block" id="">Submit</button>
      
    

       

   </form>
   @isset($post)


   <a href="{{ route('postdescription.create' , $post->id) }}" class="btn btn-block btn-secondary my-2">Add Additional Rows To Post</a> 
   <a href="{{ route('postdescription.index' , $post->id) }}" class="btn btn-block btn-secondary my-2">Addtional Rows List For This Post</a> 


@endisset
   </div>
</div>
@endsection


@section('custom_Css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('style_inner')
<style>
   
   
   
   
   </style>
@endsection

@section('custom_JS')

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> 
{{-- <script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>  --}}

<script>
$(document).ready(function() {
    $('#post-tags').select2();
});
</script>

{{-- <script>
  
  CKEDITOR.replace('blog_content', {
      extraPlugins: 'uploadimage,image2',
      height: 300,

  })
</script> --}}


    


@endsection







              

              <!-- Form Basic -->
        

         
             
           