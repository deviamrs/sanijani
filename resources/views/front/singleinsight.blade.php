@extends('layouts.front')

@section('meta_tag')
<meta property="og:title" content="{{ ($post->post_meta_title != null) ? $post->post_meta_title : $post->title }} |   {{ env('APP_NAME') }}" />
<meta property="og:description" content="{{ $post->small_desc }}" />
<meta property="description" content="{{ $post->post_meta }}" />
<meta property="og:image" content="{{ asset('public/'.$post->image) }}">
<meta name="twitter:card" content="summary" />
<meta name="twitter:image" content="{{ asset('public/'.$post->image) }}" />
@endsection

@section('title' , ($post->post_title != null) ? $post->post_title : $post->title)

@section('content')


<div class="tbt-sigle-view" id="tbt-single-view">
    <div class="main-tbt-img">
        <img src="{{ asset('public/'.$post->image) }}" alt="{{ ($post->post_alt_image != null) ? $post->post_alt_image : asset('public/'.$post->image) }}" />
    </div>

    <div class="single-view-content container">
        <h1 class="main-head single-view-head">{{ $post->title }} </h1>
           
        <div class="published-bar">
        <span class="publish"><span class="color-change">{{ $post->category->name }}</span>
            </span>
            <span class="publish">Published on <span class="color-change">{{  \Carbon\Carbon::parse($post->publish_date)->format('d M Y') }}</span>
            </span>
        </div>

        <div class="tbt-user-detail-bar">
            <div class="u-img-detail">
                <img src="{{ asset('public/'.$post->user->profile->avatar) }}" alt="image_not_loaded" class="u-img" />
                <div class="u-detail">
                    <a class="name" href="javascript:void(0)">{{ $post->user->name }}</a> <br />
                </div>
            </div>
                <a href="javascript:void" class="u-article-count"><span class="number">{{ $post->user->posts->count() }}</span> Articles</a>  
        </div>

        <div class="share-box">
        <span class="share-head">
            Share To: 
         </span> <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}" class="share-icon"  target="_blank"><i class="fab fa-facebook"></i></a>
         <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" class="share-icon"  target="_blank"><i class="fab fa-linkedin"></i></a>
         <a href="http://twitter.com/share?url={{ url()->current() }}" target="_blank" class="share-icon"><i class="fab fa-twitter"></i></a>   
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
                        <img src="{{ asset('public/'.$item->additional_image) }}" alt="{{ $item->description_alt_image != null ? $item->description_alt_image : 'image_not_loaded' }}" />
                        </div>
                    @endif 

                    @if ($item->additional_text != null)
                    <div dir="ltr" class="global-read-content">
                        {!!  $item->additional_text !!}
                        </div>
                    @endif 

              </section>


           @endforeach  



         @endif

    
        <hr>
        
        @if ($post->tags->count() > 0)
        <div class="related-tags-section">
            
            <h1 class="realted-main-head">Related Tags </h1>
            
            <aside class="relatd-tag-linnk-holder">
              
               @foreach ($post->tags as $tag)
           
                   <a href="{{ route('getpostbytag' , $tag->slug ) }}" class="realted-tag"> {{$tag->name}} </a>
 
               @endforeach 
                   
            </aside>      
               
        </div>
        <hr> 
        @endif
        
        
        
    </div>

  

</div>

 <section id="related-post-section" class="related-post-section">
     <div class="section-wrapper">
         
        <h1 class="main-head big">Related Post</h1>

          @isset($featuredposts)

             @if ($featuredposts->count() > 0)
             <div id="related-post-carouel" class="owl-carousel owl-theme  related-post-carousel">
                @foreach ($featuredposts as $post)
                    
                  <div class="item">
                    <div class="related-post-card">
                    <img src="{{ asset('public/'.$post->image) }}" alt="{{ ($post->post_alt_image != null) ? $post->post_alt_image : asset('public/'.$post->image) }}" class="post-image">
                      <a href="{{ route('getsinglepost' , ['id' =>  $post->slug ]) }}" class="post-head">
                          {{  $post->title }} 
                      </a>
                    <p class="post-conent">{{ Str::limit($post->small_desc, 60 , '...') }}</p>
                      <div class="publsiishdate"><span class="publish"></span><span class="date">Published At:</span>{{ $post->created_at->format('d M Y') }}</div>
                      <a href="{{ route('getsinglepost' , [ 'id' =>  $post->slug ]) }}" class="read-btn">Read</a> 
                  </div> 
                 </div>

                @endforeach
          
               </div>    
               
               @else
                
                <h3 class="main-head">Sorry No Related Post Found :) </h3>


             @endif
              
          @endisset  


     </div>
 </section>






    @endsection

    @section('custom_JS')
   
    <script>

$("#related-post-carouel").owlCarousel({
  
  loop: true,
  margin: 20,
 
  dots: false,
  autoplay: true,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  smartSpeed: 1000,
  paginationSpeed: 1000,
  responsive : {
      0 : {
          items: 1,
      },
      480 : {
          items: 1,
          nav: false,
          
      },
      768 : {
          items: 4,
          nav: true,
      }
  }
 
 });

   
   try {
       const inframebox = document.querySelectorAll('.article-iframe');
          
       inframebox.forEach( frame => {
         
          let boxdimen = frame.getBoundingClientRect();

           const w  = boxdimen.width;
           
           const h = w / 16 * 9 ; 
   
           frame.style.height = `${h}px`;


       })

   } catch (error) {
       
   }



    </script>


    @endsection
