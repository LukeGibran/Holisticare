  {{-- For GUEST USER --}}
  <ul id="slide-out" class="sidenav">
        <div class="nav-wrapper">
    
          <li><div class="user-view ">
              <img src="/storage/img/logo.png" class="nav-logo">
          </div>
        </li>
    
          <li><div class="divider"></div></li>
          <li>
              <form action="{{route('search')}}" method="GET">
                  @csrf
    
                  <div class="input-field " style="padding: 0px 10px;margin-right:20px">
                      <i class="material-icons prefix">search</i>
                      <input id="icon_prefix" type="text" class="validate"  name="search" placeholder="search" required>
                    </div>
                </form>
          </li>
          <li><a class="waves-effect" href="/">Home</a></li>
          <li><a href="/about" class="waves-effect">About Us</a></li>
          <li><a href="/objectives" class="waves-effect">Objectives</a></li>
          <li><a href="{{route('page', ['category' => 'holistic'])}}" class="waves-effect">Holistic Information</a></li>
          <li><a href="{{route('page', ['category' => 'testimony'])}}" class="waves-effect">Testimonies</a></li>
          <li><a href="/contact" class="waves-effect">Contact Us</a></li>
            <li><a class="dropdown-trigger2" href="#!" data-target="dropdown2">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
            <ul id='dropdown2' class='dropdown-content'>
                @foreach (session('categories') as $category)
                <li><a href="{{route('page', ['category' => $category->type])}}" class="nav-link">{{ucfirst($category->type)}}</a></li>
                @endforeach
            </ul>
          @auth
          <li><a href="/admin" class="nav-link admin" style="">ADMIN</a></li>
          @endauth
        </div>
         
      
        </ul>
      {{-- END FOR GUEST --}}