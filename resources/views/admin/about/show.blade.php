@section('title' , \Request::route()->getName() )
    

@extends('layouts.app')

@section('content')


<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
  <h6 class="m-0 font-weight-bold text-primary">Post Preview</h6>
    
    <a href="{{ route('post.edit' , $post->id ) , }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit post</a>   
  </div>    

</div>
<div class="card ">
 
     <div class="mr-auto p-5" style="max-width: 1199px">
      <h6> Main Image </h6>
      <img class="card-img-top" src="{{ asset('public/'.$post->image) }}" alt="Card image cap" class="" style="max-width: 400px">

     <div class="mt-3 text-danger h6" > 
       Size :  {{  Storage::size($post->image) * 0.001 }} kb  || Dimensions :  
       
       {{-- {{  getimagesize(asset('public/'.$post->image))[3]   }} --}}
      
       
      </div>
      <div class="card-body p-0 mt-4">

          <h6 class="font-weight-bold text-primary"> Post Title </h6>
          <h1> {{ $post->title }} </h1>

          <h6 class="font-weight-bold text-primary"> Post Small Description About Post </h6>
          <blockquote>
            {{ $post->small_desc }}
          </blockquote>  
           

          <h6 class="font-weight-bold text-primary"> Post Main Description </h6>
          <div title="description">
              {!!   $post->full_desc    !!}
          </div>

            
          @if ($post->postdescriptions->count() > 0)
          
           @foreach ($post->postdescriptions as $item)
              
              <section id="artica-Box" class="artical-box">
                    @if ($item->video_url != null)
                    <div class="article-iframe">
                        <iframe width="100%"  src="https://www.youtube.com/embed/{{$item->video_url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    @endif 

                    @if ($item->additional_image != null)
                        <div class="second-image-container">
                            <img src="{{ asset('public/'.$item->additional_image) }}" alt="image_not_loaded"  style="max-width: 400px"/>
                        </div>
                        <div class="mt-3 text-danger h6" > 
                          Size :  {{  Storage::size($item->additional_image) * 0.001 }} kb  || Dimensions : 
                          
                          {{-- {{  getimagesize(asset('public/'.$item->additional_image))[3]   }} --}}
                         
                          
                         </div>
                    @endif 

                    @if ($item->additional_text != null)
                    <div dir="ltr" class="tbt-global-read-content">
                        {!!  $item->additional_text !!}
                        </div>
                    @endif 

              </section>


             



           @endforeach  



         @endif    
          
          
          
      </div> 
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <a href="{{ route('post.index') }}" class="btn btn-primary btn-icon-split btn-sm">
          <span class="icon text-white-50">
             <i class="fas fa-pen"></i>
          </span>
          <span class="text">Finalize The Post</span>
        </a> 
        <a href="{{ route('post.edit' , $post->id) }}" class="btn btn-primary btn-icon-split btn-sm">
          <span class="icon text-white-50">
             <i class="fas fa-pen"></i>
          </span>
          <span class="text">Edit This Post</span>
        </a> 

        <a href="{{ route('postdescription.create' , $post->id) }}" class="btn btn-primary btn-icon-split btn-sm">
          <span class="icon text-white-50">
             <i class="fas fa-pen"></i>
          </span>
          <span class="text">Add Addtional Rows This Post</span>
        </a> 
       
     </div>    
   
     </div>        
     </div>
           
          
    
       

  
</div>





@endsection


