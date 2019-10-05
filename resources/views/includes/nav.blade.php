<div class="navbar-fixed">
<nav class="white dark-text " >
 
        <div class="nav-wrapper " style="padding: 0 2rem;">
            <img src="/storage/img/logo.png" alt="logo" class="nav-logo" />


                <!-- Right Side Of Navbar -->
                <ul  id="nav-mobile" class="right hide-on-med-and-down">
                    <!-- Authentication Links -->
                    <li><a class="nav-link" href="/">Home</a></li>
                    <li><a href="/about" class="nav-link">About Us</a></li>
                    <li><a href="/objectives" class="nav-link">Objectives</a></li>
                    <li><a href="{{route('page', ['category' => 'holistic'])}}" class="nav-link">Holistic Information</a></li>
                    <li><a href="{{route('page', ['category' => 'testimony'])}}" class="nav-link">Testimonies</a></li>
                    <li><a href="/contact" class="nav-link">Contact Us</a></li>
                    <li>
                        <form action="{{route('search')}}" method="GET">
                            @csrf
                            <div class="input-field" style="padding: 5px 8px" >
                              <input id="search" type="search" style="background:#e0e0e0 !important;height:50px !important;" name="search" required>
                              <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                              <i class="material-icons">close</i>
                            </div>
                          </form>
                    </li>
                    @auth
                    <li><a href="/admin" class="nav-link admin">ADMIN</a></li>
                    @endauth

       
                </ul>

        </div>
    </nav>

</div>