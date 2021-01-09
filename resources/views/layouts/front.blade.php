<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') - {{ env('APP_NAME') }} Disinfactant Services </title>
     
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="shortcut icon" href="{{  asset('public/logo/logo.png') }}" type="image/x-icon">
    @yield('meta_tag')
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    @yield('custom_Css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <link rel="stylesheet" href=" {{ asset('public/css/project.css')   }} " />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
 
    @includeIf('inc_front.header')
    
    @yield('content')
 
    @includeIf('inc_front.footer')
    {{-- <a href="#top" class="scroll-to-top-page" id="scroll-to-top-page" title="got to top"> 
        <i class="fas fa-arrow-circle-up"></i> 
    </a>  --}}
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- <script src="{{asset('public/js/project.js')}}"></script> --}}
    <script>  AOS.init();</script>
    <script>   
        const header = document.querySelector('#header');
        const hamurger = header.querySelector('#hamurger');
        
        hamurger.addEventListener('click' , () => { 
            header.querySelector('.header__list').classList.toggle('__active')
            hamurger.classList.toggle('__active')
        });
        window.addEventListener('click', function(e){   
            if (document.getElementById('header').contains(e.target)){
               return
            }
            else{
                header.querySelector('.header__list').classList.remove('__active')
                hamurger.classList.remove('__active')
            }
        });
    </script>
    @yield('custom_JS')
</body>

</html>
