@extends('layouts.front') 
@section('title')@if($pagename->page_title != null) {{ $pagename->page_title  }}
@else{{ $pagename->page_name  }}@endif @endsection
@section('meta_tag')
<meta property="og:type" content="web" />
<meta name="facebook:card" content="summary" / <meta property="og:title"
    content="{{ $pagename->page_meta_title }}" />
<meta property="og:description" content="{{ $pagename->page_og_description }}" />
<meta property="description" content="{{ $pagename->page_description }}" />
<meta property="og:image" content="{{ asset('public/'.$pagename->og_share_image) }}>
      <meta name=" twitter:card" content="summary" />
<meta name="twitter:image" content="{{ asset('public/'.$pagename->og_share_image) }}" />
@endsection

@section('content')

@include('inc_front.banner')


<section class="section  __main-page" style="background-image:url({{asset('public/landing/insigts_repeaat.png')}})">
   <div class="container insight-cards-wrapper">
      @isset($posts)
          @if ($posts->count() > 0)
              @foreach ($posts as $post)
              <div class="insight-card __with-border-and-shadow-primary">
              <span class="card-date">{{  \Carbon\Carbon::parse($post->publish_date)->format('d M Y') }}</span>    
               <a href="{{ route('getsinglepost' , [ 'id' =>  $post->slug ]) }}" class="card-img"> <img src="{{ asset('public/'.$post->image) }}" alt="{{ ($post->post_alt_image != null) ? $post->post_alt_image : asset('public/'.$post->image) }}"></a>
               <div class="content-part">
                  <a href="{{ route('getpostbycategory' , $post->category->slug) }}" class="card-cat-head  __color-primary">{{ $post->category->name }}</a>   
                  <a href="{{ route('getsinglepost' , [ 'id' =>  $post->slug ]) }}" class="card-content __color-primary">{{ $post->title }}</a>
                  <a href="{{ route('getsinglepost' , [ 'id' =>  $post->slug ]) }}" class="card-read-more-btn  __color-primary">+ Read More</a>
               </div>
               </div>
              @endforeach
          @else
             <h1 class="no-result" style="font-size: 1.8rem; text-align:center ; grid-column: 1/-1;">Sorry No Post Found ...</h1> 
          @endif
      @endisset
     
      
   </div>
   <div class="container make-btn-center"> 
         <a href="{{ route('front.about') }}" class="project-btn __c-w">  View More  &rarr; </a>
   </div>
</section>

@endsection