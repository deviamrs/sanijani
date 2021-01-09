@extends('layouts.front')

@section('title' , 'Faq')

@section('content')


<div class="__global-main-bannner" style="background-image:url({{asset('public/'.$faqcategory->page_banner)}})"> 
    <h3 class="banner-head">{{ $faqcategory->name }} </h3>
</div>


<div class="single-page __section_has_no_padding-top" id="single-page">
      
        
    <section class="section section__has-bg __section_has_padding-top"
    style="background-image:url({{asset('public/landing/slider-bg.png')}})">
    
    <div class="container faq-cards-wrapper __has-no-margin-bottom">
        @isset($faqs)
        @if ($faqs->count() > 0)
            @foreach ($faqs as $item)
            <div class="faq-card">
                <div class="question">
                    <div class="icons-wrap"> <span class="icon --plus">Q</span><span class="icon --minus">Q</span>
                    </div>
                <h3 class="question-data">{{ $item->question }}</h3>
                </div>
                <div class="answer-detail">
                    <div class="answer-wrap">
                        <div class="global-read-content">
                            {!! $item->answer  !!}
                        </div>
                    </div>
                    
    
                </div>
              </div>
            @endforeach
        @else
           <h3>Faq Page Not Available</h3>
        @endif
       @endisset
       
    </div>
    </section>
</div>





@endsection



@section('custom_JS')
   {{-- <script>
   
     const faqWrpBoxes = document.querySelectorAll('#single-page .faq-cards-wrapper')
     
     faqWrpBoxes.forEach((faqWrpBoxe , index) => {faqWrpBoxe.id = `faq-card-wrap-box-${index}`});
        
     faqWrpBoxes.forEach(faqWrpBoxe => {
       
        const boxID = faqWrpBoxe.getAttribute('id');

        const faqs = document.querySelectorAll(`#${boxID} .question`);

               faqs.forEach(faq => {

                     faq.addEventListener('click' , (e)=> {

                     if (e.target.classList.contains('icon') || e.target.classList.contains('question-data'))
                      {
                        faq.parentElement.classList.toggle('active');
                      }
                    })
                  });

          }); 

     
      
   </script>  --}}
@endsection