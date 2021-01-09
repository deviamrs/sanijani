@extends('layouts.front')
@section('title')@if($pagename->page_title != null) {{ $pagename->page_title  }}
@else{{ $pagename->page_name  }}@endif @endsection
@section('meta_tag')
<meta property="og:type" content="web" />
<meta name="facebook:card" content="summary" / <meta property="og:title" content="{{ $pagename->page_meta_title }}" />
<meta property="og:description" content="{{ $pagename->page_og_description }}" />
<meta property="description" content="{{ $pagename->page_description }}" />
<meta property="og:image" content="{{ asset('public/'.$pagename->og_share_image) }}>
      <meta name=" twitter:card" content="summary" />
<meta name="twitter:image" content="{{ asset('public/'.$pagename->og_share_image) }}" />
@endsection

@section('content')

@include('inc_front.banner')

<div class="single-page">
    <div class="container">
        <div class="testimonial-cards-wrapper">
            @isset($testimonials)
            @if ($testimonials->count() > 0)
            @foreach ($testimonials as $item)
            <div class="testimonial--card __with-border-and-shadow-primary">
                <div class="wrapar">
                    <div class="test-cont has-quote">
                        <span class="quote-icon --left">
                            <i class="fas fa-quote-left" aria-hidden="true"></i>
                        </span>
                        <div class="global-read-content">{!! $item->testimonial_content !!}</div>
                        <span class="quote-icon --right">
                            <i class="fas fa-quote-right" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div>
                        <span class="name">{{ $item->name }}, {{ $item->place }}.</span>
                    </div>
                   

                </div>
            </div>
            @endforeach
            @endif
            @endisset
        </div>
    </div>
</div>
@endsection
