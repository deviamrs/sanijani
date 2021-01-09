<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('front.home') }}" tabindex="_blank">
     <div class="sidebar-brand-text mx-3">{{config('app.name', 'Laravel') }}</div>
   </a>
   <hr class="sidebar-divider my-0">
   <li class="nav-item active">
     <a class="nav-link" href="{{ route('back.home') }}">
       <i class="fas fa-fw fa-tachometer-alt"></i>
       <span>Dashboard</span></a>
   </li>
   <hr class="sidebar-divider">
   <div class="sidebar-heading">
     Features
   </div>
   <li class="nav-item">
   <a class="nav-link" href="{{ route('setting.index') }}">
      <i class="fas fa-cog"></i>
      <span>General Settings</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('page.index') }}">
       <i class="fas fa-cog"></i>
       <span>Main Pages</span>
     </a>
   </li>
   <hr class="sidebar-divider">
   <div class="sidebar-heading">
     Panel Features
  </div>
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage49" aria-expanded="true"
       aria-controls="collapsePage">
       <i class="fas fa-fw fa-columns"></i>
       <span>About Section</span>
     </a>
     <div id="collapsePage49" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">About Section</h6>
       <a class="collapse-item" href="{{ route('about.index') }}">All About Listing</a>
       <a class="collapse-item" href="{{ route('about.create') }}">Add About</a>
       </div>
     </div>
   </li>
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage50" aria-expanded="true"
       aria-controls="collapsePage">
       <i class="fas fa-fw fa-columns"></i>
       <span>Services</span>
     </a>
     <div id="collapsePage50" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Services</h6>
          <a class="collapse-item" href="{{ route('service.index') }}">All service Listing</a>
          <a class="collapse-item" href="{{ route('service.create') }}">Add service</a>
       </div>
     </div>
   </li>
   <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage51" aria-expanded="true"
       aria-controls="collapsePage">
       <i class="fas fa-fw fa-columns"></i>
       <span>Location</span>
     </a>
     <div id="collapsePage51" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Services</h6>
          <a class="collapse-item" href="{{ route('location.index') }}">All Location Listing</a>
          <a class="collapse-item" href="{{ route('location.create') }}">Add Location</a>
       </div>
     </div>
   </li>
   <hr class="sidebar-divider">
   <div class="version" id="version-ruangadmin"></div>
 </ul>