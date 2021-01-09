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


<section class="section section__one landing__section section__has-bg" style="background-image:url({{asset('public/landing/3906546.jpg')}})">
   <div class="container section__wrapper__landing">
      <div class="section__side section__side_one">
         {{-- <div class="main-head __color-sec">
            Sani Jani
         </div> --}}
         <ul class="case__handle">
            <li class="case__handle__item">
               {{-- <span class="counter  __color-sec">34 </span> <br> --}}
               {{-- <span class="counter__text  __color-sec">Sani-Jani Disinfecting Services,</span>   --}}
               <div class="landing-logo-image">
                  <img src="{{  asset('public/logo/logo.png') }}" alt="company logo">
               </div>
            </li>
            <li class="case__handle__item">
               <span class="counter  __color-green">Contact Us  </span> <br> <br>
            <span class="counter__text  __color-green">{{ $contactData->phone ?? '' }}</span>  
            </li>
         </ul>
         <div>
           <a href="{{ route('front.contact') }}" class="project-btn __c-w">
               Contact 	&rarr;
            </a>
         </div>

      </div>

   </div>
</section>


<section class="section section__two section__has-bg">
   <div class="container">
            <h1 class="main-heading __color-sec with-bg">About</h1>     
      </div> 

  <div class="container landing__about-section">
       
       <div class="content-part">
             {{-- <div class="sub-head">{{ $aboutData->about_heading ?? '' }} </div> --}}
             <div class="about-data">
                <div class="global-read-content --white-col">
                   {!!  $aboutData->about_content ?? ''  !!}
                </div>
              
             </div>

       </div>

       <div class="self-center">
         <a href="{{ route('front.contact') }}" class="project-btn __c-w">
             Contact &rarr;
          </a>
       </div>

  </div>


</section>

<section class="section section__three section__has-bg" style="background-image:url({{asset('public/landing/slider-bg.png')}})" id="tax-practice-areas">

   <div class="container">
      <h1 class="main-heading __color-primary">
          Services
      </h1>     
   </div> 

   <div class="container practice-cards-wrapper">
       @isset($services)
           @if ($services->count() > 0)
               @foreach ($services as $item)
               <a href="{{ route('front.service' , $item->slug) }}" class="law-practice-card">
                  <div class="icon-wrapper">
                      <img src="{{ asset('public/'.$item->service_front_image) }}" alt="$item->front_image_alt">
                  </div>
               <h3 class="practice-head">{{ $item->service_name }}</h3> 
                </a>  
               @endforeach
           @endif
       @endisset 
   </div>
</section>
<section class="section section__four">
   <div class="container">
      <h1 class="main-heading __color-sec with-bg">Locations</h1>     
   </div>

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
     @endif
     @endisset 
       
   </div>

   <div class="container make-btn-center">
      
         <a href="{{ route('front.locationlist') }}" class="project-btn __c-w">
              View More 	&rarr;
          </a>
     
   </div>
</section>


<section class="section section__six" >
   <div class="container">
      <h1 class="main-heading __color-sec with-bg">Testimonials</h1>     
   </div>
   
   <div class="container testimonials-icons-wrapper">
        <span class="quote --left"><i class="fas fa-quote-left"></i></span>
        <span class="quote --right"><i class="fas fa-quote-right"></i></span>
        <div class="testimonials-wrapper">
            <div class="owl-carousel owl-theme">
               @isset($testimonials)
                  @if ($testimonials->count() > 0)
                    @foreach ($testimonials as $item)
                    <div class="item">
                     <div class="testimonial-card">
                           <div class="content-part">
                              <div class="global-read-content --white-col">
                                  {!! $item->testimonial_content !!}
                              </div>
                           </div>
                           <div class="user-data">
                              <span class="name __color-sec">{{ $item->name }}</span> <br>
                           <span class="place">{{$item->place}}</span>
                           </div>
                        </div>   
                     </div> 
                    @endforeach    
                  @endif
               @endisset 

               <div class="item">
                  <div class="testimonial-card">
                        <div class="content-part">
                           <div class="global-read-content">
                              <p>
                                 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit ratione modi quasi distinctio vitae cupiditate expedita? Explicabo harum quidem voluptatibus.
                              </p>
                           </div>
                        </div>
                        <div class="user-data">
                           <span class="name __color-sec">Name</span> <br>
                        <span class="place">place</span>
                        </div>
                     </div>   
                  </div> 

                  <div class="item">
                     <div class="testimonial-card">
                           <div class="content-part">
                              <div class="global-read-content">
                                 <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit ratione modi quasi distinctio vitae cupiditate expedita? Explicabo harum quidem voluptatibus.
                                 </p>
                              </div>
                           </div>
                           <div class="user-data">
                              <span class="name __color-sec">Name</span> <br>
                           <span class="place">place</span>
                           </div>
                        </div>   
                     </div> 
         </div> 
        </div>
   </div>

   <div class="container make-btn-center">
      
      <a href="{{ route('front.testimonials') }}" class="project-btn __c-p">
           View More 	&rarr;
       </a>
  
   </div>
</section>

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


@section('custom_Css')
<link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css') }}" />
<link rel="stylesheet" href=" {{ asset('public/css/owl.theme.default.css') }}" />
@endsection

@section('custom_JS')
   {{-- <script>
     const faqs = document.querySelectorAll('#faq-list-wrap .question');
     faqs.forEach(faq => {
     faq.addEventListener('click' , (e)=> {
     if (e.target.classList.contains('icon') || e.target.classList.contains('question-data')) {
     faq.parentElement.classList.toggle('active'); }
     })
     });
      
   </script>  --}}
   
   <script src="{{asset('public/js/jquery.min.js')}}"></script>
   <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
   <script>
     
     $('.owl-carousel').owlCarousel({
    loop:true,
    margin: 40,
    autoplay: true,
    autoplayTimeout: 3000,
      autoplayHoverPause: true,
      smartSpeed: 1000,
      paginationSpeed: 1000,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            // nav:true
        },
        
    }
   })
      


   </script> 
@endsection