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

<section class="section section__seven section__has-bg">
   <div class="container">
      <h1 class="main-heading __color-primary">Contact</h1>     
   </div>
   <div class="container contact-section-wrapper">
        <div class="contact-part --left"> 
           <div class="__address-wrapper">
             <div class="icon-box">
                <img src="{{ asset('public/img/icons/address.svg') }}" alt="address icons" class="icon">
             </div>
             <div class="contact-data">
                <p class="entry __address__entry">
                  {{ $contactData->address ?? ''  }}
                </p>
             </div>
           </div>

           <div class="__address-wrapper">
             <div class="icon-box">
                <img src="{{ asset('public/img/icons/social-network.svg') }}" alt="address icons" class="icon">
             </div>
             <div class="contact-data">
               <div class="social-part">
                  
                  {{-- <div class="social-link-wrapper">
                       <a href="{{ $contactData->linkedin ?? '' }}" class="social-link" target="_blank">
                           <i class="fab fa-linkedin"></i>
                       </a>
                  </div> --}}
                  <div class="social-link-wrapper">
                       <a href="{{ $contactData->twitter ?? '' }}" class="social-link" target="_blank">
                           <i class="fab fa-twitter"></i>
                       </a>
                  </div>
                  <div class="social-link-wrapper">
                       <a href="{{ $contactData->facebook ?? '' }}" class="social-link" target="_blank">
                        <i class="fab fa-facebook-square"></i>
                       </a>
                  </div>
                  <div class="social-link-wrapper">
                       <a href="{{ $contactData->instagram ?? '' }}" class="social-link" target="_blank">
                           <i class="fab fa-instagram"></i>
                       </a>
                  </div>
              </div>
             </div>
           </div>
            <div class="__address-wrapper">
               <div class="icon-box">
                  <img src="{{ asset('public/img/icons/phone.svg') }}" alt="address icons" class="icon">
               </div>
               <div class="contact-data">
                   <a href="tel:{{ $contactData->phone ?? '' }}" class="connect-link">{{ $contactData->phone ?? '' }}</a>
               </div>
             </div>

             <div class="__address-wrapper">
               <div class="icon-box">
                  <img src="{{ asset('public/img/icons/email.svg') }}" alt="address icons" class="icon">
               </div>
               <div class="contact-data">
                   <a href="tel:{{ $contactData->mail_id ?? '' }}" class="connect-link">{{ $contactData->mail_id ?? '' }}</a>
               </div>
             </div>

             <div class="__address-wrapper __has_map">
               <div class="iframe-wrapper">
                    <iframe src="{{ $contactData->map_url ??  'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3717.1911302362823!2d-157.85288418470188!3d21.303462783718558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c006de732215d33%3A0x6a9441cc6e7205cc!2s846%20S%20Hotel%20St%2C%20Honolulu%2C%20HI%2096813%2C%20USA!5e0!3m2!1sen!2sin!4v1606382413916!5m2!1sen!2sin' }}" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
               </div>
            </div>    
        </div>

        <div class="cotact-part --right">
         @include('inc_front.contact')  
      </div>
      
        
               
   </div>
   
</section>



@endsection