{{-- For ADMIN USER --}}
<ul id="slide-out" class="sidenav sidenav-fixed">
    <li><div class="user-view ">
      <div class="background">
        <img src="/storage/img/home_banner.jpg" height="180px" width="300px">
      </div>
      <a href="#user"><img class="circle" src="/storage/img/user.png"></a>
      <a href="#name"><span class="black-text name">{{Auth::user()->name}}</span></a>
    <a href="#email"><span class="black-text email">{{Auth::user()->email}}</span></a>
    </div></li>
    <li><a href="/admin"><i class="material-icons">home</i>All Posts</a></li>
    <li><a href="/admin/create"><i class="material-icons">add_circle</i>Create Post</a></li>
    <li><div class="divider"></div></li>
    <li><a class="waves-effect" href="/">Home</a></li>
    <li><a href="/about" class="waves-effect">About Us</a></li>
    <li><a href="/objectives" class="waves-effect">Objectives</a></li>
    <li><a href="/holistic" class="waves-effect">Holistic Information</a></li>
    <li><a href="/testimonies" class="waves-effect">Testimonies</a></li>
    <li><a href="/contact" class="waves-effect">Contact Us</a></li>
    <li><a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
        <i class="material-icons">logout</i> {{ __('Logout') }}
     </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
     </form></li>

  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons green-text">menu</i></a>
  {{-- END OF ADMIN --}}


  