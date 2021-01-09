
<section class="search-bar">
   <div class="section-wrapper">
      <div class="bread-crumb">
       <span class="text"> {{ isset($title) ? 'Search Results For : ' : ''  }}  {{ isset($tagname) ?  $tagname : '' }}  {{  isset($title) ? $title : ''  }} {{ isset($supername) ? $supername : '' }}</span>
   </div>    
   <form action="{{ route('front.all.search')}}" method="GET" class="search-query-form" role="search">    
       <input type="text" name="title" id="" class="search-input" placeholder="type something .." value="{{ isset($title) ? $title : '' }}"> 
         <button class="search-submit" type="submit">Search</button>
      </form>
   </div>
</section>
