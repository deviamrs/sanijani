<header id="header" class="header">
    <div class="container header__wrapper">
        <div class="header__logo">
            <a href="{{ route('front.home') }}">
                <img src="{{  asset('public/logo/logo.png') }}" alt="company logo">
            </a>

        </div>
        <ul class="header__list">
            <li class="header__list__item">
                <a href="{{ route('front.home') }}"
                    class="header__link" >
                    {{ $page_name[0]->page_name ?? '' }}
                 </a>
            </li>
            <li class="header__list__item">
                <a href="javascript:void(0)"
                    class="header__link">{{ $page_name[1]->page_name ?? '' }} </a> 

                    @isset($services)
                    @if ($services->count() > 0)
                    <ul class="header__sub-list">
                       @foreach ($services as $item)
                       <li class="header__sub-list__item">
                       <a href="{{ route('front.service' , $item->slug) }}" class="header__sublink">{{ $item->service_name }}</a>
                         </li>
                       @endforeach
                     </ul> 
                    @endif
                   @endisset    
            </li>
            <li class="header__list__item">
                <a href="{{ route('front.locationlist') }}"
                    class="header__link"> {{ $page_name[2]->page_name ?? '' }}
                </a>

                @isset($locations)
                @if ($locations->count() > 0)
                <ul class="header__sub-list">
                   @foreach ($locations as $item)
                   <li class="header__sub-list__item">
                   <a href="{{ route('front.location' , $item->slug) }}" class="header__sublink">{{ $item->location_name }}</a>
                     </li>
                   @endforeach
                 </ul> 
                @endif
               @endisset 
            </li>
            {{-- <li class="header__list__item">
                <a href="{{ route('front.insight') }}"
                    class="header__link">
                    {{ $page_name[3]->page_name ?? '' }} </a>
            </li> --}}

            <li class="header__list__item">
                <a href="{{ route('front.testimonials') }}"
                    class="header__link "> {{ $page_name[4]->page_name ?? '' }}
                </a>
            </li>


            <li class="header__list__item">
                <a href="{{ route('front.contact') }}"
                    class="header__link ">
                    {{ $page_name[5]->page_name ?? '' }} </a>
            </li>
        </ul>

        <div class="menu-lines" id="hamurger">
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
</header>