@extends('layouts.front')

@section('title')@if($service->page_title != null) {{ $service->page_title  }}
@else{{ $service->page_name  }}@endif @endsection

@section('meta_tag')
<meta property="og:type" content="web" />
<meta name="facebook:card" content="summary" / <meta property="og:title"
    content="{{ $service->page_meta_title }}" />
<meta property="og:description" content="{{ $service->page_og_description }}" />
<meta property="description" content="{{ $service->page_description }}" />
<meta property="og:image" content="{{ asset('public/'.$service->og_share_image) }}>
      <meta name=" twitter:card" content="summary" />
<meta name="twitter:image" content="{{ asset('public/'.$service->og_share_image) }}" />
@endsection






@section('content')

<div class="__global-main-bannner" style="background-image: url({{asset('public/'.$service->service_banner)}})"> 
    <h3 class="banner-head">
      {{  $service->service_name != null ? $service->service_name :  'Data Not Fetched' }}
   </h3>
    @if (Route::currentRouteName() == 'front.insight' || Route::currentRouteName() == 'front.all.search'  )
         @includeIf('inc_front.searchbar')
    @endif
</div>

<div class="single-page" id="single-page">
   
    @isset($abouts)
        @if ($abouts->count() > 0)
            @foreach ($abouts as $key=>$item)
             @if ($item->id !== 3)
             <div class="about-content-wrapper">
                <div class="container read-content-wrapper">
                <h1 class="main-heading __color-primary __small-version">{{ $item->about_heading }}</h1>
                </div>
                <div class="container">
                <div class="read-content-wrapper __shrinked">
                        <div class="global-read-content">{!! $item->about_content  !!}</div>
                </div>
                </div>
        
                <div class="container make-btn-center read-more-btn-wrapper">
                    <a href="javascript:void(0)" class="project-btn __c-p">Read More &darr;</a>    
                 </div>
            </div>
             @endif
            @endforeach
        @endif
    @endisset
    

    <div class="about-content-wrapper">
        <div class="container">
        <div class="services-box-grid">
            <div class="read-content-wrapper">
                <div class="global-read-content">{!! $service->service_front_data  !!}</div>
             </div>
            
             <div class="contact-form-wrap">
                 @include('inc_front.contact')
             </div>

        </div>
            

       
        </div>

        {{-- <div class="container make-btn-center read-more-btn-wrapper">
            <a href="javascript:void(0)" class="project-btn __c-p">Read More &darr;</a>    
         </div>--}}
    </div> 
</div>
@endsection


@section('custom_JS')
   <script>
   
      const aboutSections = document.querySelectorAll('.about-content-wrapper');
      aboutSections.forEach((section , index) => {section.id = `about-read-seciton-${index}` });
          
     

      aboutSections.forEach(section => {
          section.addEventListener('click' , (e) => {  
               
              if(e.target.classList.contains('project-btn'))
                  
                  section.classList.toggle('active');
               
                  const projectBtn = section.querySelector(`#${section.getAttribute('id')} .project-btn`);
                  
                  section.classList.contains('active') ? projectBtn.innerHTML = `Minimize &uarr;` : projectBtn.innerHTML = `Read More &rarr;`;
                
            })
      });

     
      
   </script> 
@endsection
