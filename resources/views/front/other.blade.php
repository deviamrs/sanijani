

@extends('layouts.front')

@section('title' , 'Home')

@section('content')

<div class="__global-main-bannner" style="background-image:url({{asset('public/'.$other->page_banner)}})"> 
    <h3 class="banner-head">{{ $other->other_head }} </h3>
</div>



<div class="single-page" id="single-page">
 

   <div class="about-content-wrapper">

      <div class="container">
      <div class="read-content-wrapper __shrinked">
              <div class="global-read-content">
                {!! $other->other_content !!}
              </div>
          </div>
  
 
      </div>

      <div class="container make-btn-center read-more-btn-wrapper">
          <a href="javascript:void(0)" class="project-btn __c-p">Read More &darr;</a>    
       </div>
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


