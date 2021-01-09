<footer id="footer" class="footer">
    <div class="icon __left"><i class="fas fa-spray-can"></i>   </div>
      
 
    <div class="icon __right">   <i class="fas fa-spray-can"></i>  </div>
   
  


      <div class="footer-wrapper">
         <div class="footer-data __left">
            <h3 class="head"> Address</h3>
            <div class="footer-box">
               <div class="addres-line">
                  {{ $setting->address ?? ''  }} 
               </div>


            </div>

            <div class="social-part">
               <div class="social-link-wrapper">
                    {{-- <a href="" class="social-link" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a> --}}
                    <a href="{{ $setting->twitter ?? '' }}" class="social-link" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ $setting->facebook ?? '' }}" class="social-link" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="{{ $setting->instagram ?? '' }}" class="social-link" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
               </div>
           </div>
         </div>
         <div class="footer-data __right">
            <h3 class="head">Locations</h3>

            <ul class="expert-list">
               @isset($locations)
                   @if ($locations->count() > 0)
                       @foreach ($locations as $item)
                            <li class="item"><a href="{{ route('front.location', $item->slug) }}" class="item-link @if($loop->first || $item->location_name == 'South Carolina')font-bold @endif" >{{ $item->location_name }}</a>
                           </li>
                       @endforeach
                   @endif
               @endisset
            </ul>
         </div>
         <div class="footer-data __right">
            <h3 class="head">Important Links</h3>
            <ul class="expert-list">
               
               <li class="item"><a href="{{ route('front.home') }}" class="item-link">Home</a></li>
               <li class="item"><a href="{{ route('front.locationlist') }}" class="item-link">Locations</a></li>
               <li class="item"><a href="{{ route('front.contact') }}" class="item-link">Contact</a></li>
               <li class="item"><a href="{{ route('front.testimonials') }}" class="item-link">Testimonials</a></li>
              
            </ul>
         </div>
         
      </div>

  


 
   <div class="footer__side __side_one">
      ©{{ date("Y") }}, {{ env('APP_NAME') }} All Rights Reserved.
   </div>
</footer>