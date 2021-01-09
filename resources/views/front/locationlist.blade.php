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
      @isset($locations)
          @if ($locations->count() > 0)
              @foreach ($locations as $location)
              <div class="insight-card __with-border-and-shadow-primary">
              {{-- <span class="card-date">{{  \Carbon\Carbon::parse($location->publish_date)->format('d M Y') }}</span>     --}}
               <a href="{{ route('front.location' , [ 'slug' =>  $location->slug ]) }}" class="card-img"> <img src="{{ asset('public/'.$location->location_front_image) }}" alt="{{ ($location->front_image_alt != null) ? $location->front_image_alt : asset('public/'.$location->location_front_image) }}"></a>
               <div class="content-part">
                  {{-- <a href="{{ route('getpostbycategory' , $location->category->slug) }}" class="card-cat-head  __color-primary">{{ $location->category->name }}</a>    --}}
                  <a href="{{ route('front.location' , [ 'slug' =>  $location->slug ]) }}" class="card-content __color-primary" style="text-align: center">{{ $location->location_name }}</a>
                  <a href="{{ route('front.location' , [ 'slug' =>  $location->slug ]) }}" class="project-btn __c-p">Contact Location</a>
               </div>
               </div>
              @endforeach
          @else
             <h1 class="no-result" style="font-size: 1.8rem; text-align:center ; grid-column: 1/-1;">Sorry No Location Found ...</h1> 
          @endif
      @endisset
     
      
   </div>
   <div class="container make-btn-center"> 
         <a href="{{ route('front.contact') }}" class="project-btn __c-w">  Contact Us  &rarr; </a>
   </div>
</section>

@endsection