
   <div class="__global-main-bannner" style="background-image: url({{asset('public/'.$pagename->page_banner)}})"> 
    <h3 class="banner-head">
      {{  $pagename->page_name != null ? $pagename->page_name :  'Data Not Fetched' }}
   </h3>
    @if (Route::currentRouteName() == 'front.insight' || Route::currentRouteName() == 'front.all.search'  )
         @includeIf('inc_front.searchbar')
    @endif
   </div>