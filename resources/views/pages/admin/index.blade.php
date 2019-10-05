@extends('layouts.admin')

@section('content')
<style>
  #cardTitle{
    background: #2e7d32;
    padding: 10px;
  
  }
</style>
<section id="create_view">
        @include('includes.side')
        {{-- Start Nav --}}
        <div class=" hide-on-med-and-down">
            <nav class="white black-text " >
             
                    <div class="nav-wrapper" style="padding: 0 2rem;">
                      <img src="/storage/img/logo.png" alt="logo" class="nav-logo left" style="padding-right: 3rem;width:230px" />

                            <!-- Right Side Of Navbar -->
                            <ul  id="nav-mobile" >
                              <li >Search:</li>
                              <form action="{{route('admin.index')}}" method="GET">

                                <li>
                                        <div class="input-field" style="padding: 5px 8px" >
                                          <input name="search" id="search" type="search" style="background:#e0e0e0 !important;height:50px !important;" name="search" >
                                          <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                                          <i class="material-icons">close</i>
                                        </div>
                                    </li> 
                                <li style="padding: 0 1rem">
                                    <div class="input-field">
                                        <select name="category">
                                          <option value="" disabled selected>All Category</option>
                                          <option value="news">Holistic News</option>
                                          <option value="holistic">Holistic Information</option>
                                          <option value="testimony">Testimony</option>
                                          <option value="herbal">Herbal Tea</option>
                                        </select>
                                       
                                      </div>
                                </li>
                                <li><Button class="btn green darken-1 "> GO!</Button></li>
                              </form>
                            </ul>
            
                    </div>
                </nav>
            
            </div>
            {{-- END NAV --}}
        <div class="row">

          <div class="col s6 offset-s3 center-align">
            <h3 style="margin-bottom:1px;">All Posts</h3>
            <h6 style="margin:0">({{$category}})</h6>
          </div>
        </div>
    <div class="row center-align" style="padding: 0 2rem">
      
    <hr>
    
    {{-- session alerts --}}
    @include('includes.messages')
    @if (count($posts) > 0)
      @foreach ($posts as $post)
      <div class="col xl4 m6 s12">
        <div class="card">
          <div class="card-image">
          <img src="/storage/{{$post->image}}" width="300px" height="200px">
          <span class="card-title" id="cardTitle">{{substr($post->title,0,15)}}</span>
          <a href="{{route('admin.edit', ['admin' => $post->id])}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>
          </div>
          <div class="card-content" >
            Posted By: {{$post->user->name}}
          </div>
          <div class="card-action">
          <a href="{{route('show', ['id' => $post->id])}}">View Post</a>
              </div>
        </div>
      </div>
      @endforeach
        
    @else
        <div class="center-align">
          <h4>No posts found...</h4>
        </div>
    @endif

    <div class="col xl12 right-align">
      {{$posts->links()}}
    </div>
    </div>
    </section>
     <script>
 
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {});

        
        var select = document.querySelectorAll('select');
        var selectInstances = M.FormSelect.init(select, {});
      });
    </script>
    <script>
     const alert = document.querySelector('#alert');

     if(alert){
       setTimeout(() => {
        alert.style.display = 'none';
        console.log('alert is gone');
       }, 3550)
     }
    </script>

@endsection