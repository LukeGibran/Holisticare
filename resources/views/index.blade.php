@extends('layouts.app')
    @section('content')

    <!-- MAIN Section -->
    <section id="main">
      <div class="row container ">
        <div  class="col s6">
          <h3 data-aos="fade-up">Center of Holistic Care</h3>
          <blockquote data-aos="fade-up" data-aos-delay="50">
            CHHC is oriented to the promotion of wellness through the use of
            natural food in the diet that derived from plants and herbs which
            are rich in nutrients, high in phytochemicals and free from toxic
            additives
          </blockquote>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            The Center for Holistic Health Care (CHHC) is an expression of care
            in building a Culture of Dialogue, Path to Peace in our society in
            line with Vision – Mission of Silsilah that promotes a style of life
            guided by the spirituality of life-in-dialogue according to each
            one’s own religion.
          </blockquote>
          {{-- <a class="waves-effect waves-light btn green darken-1">Read More</a> --}}
        </div>
      </div>
    </section>
    <!-- End of MAIN section-->

    <!-- NEWS Section -->
    <section id="news">
      <div class="row container center-align">
        <i class="small material-icons green-text darken-1">library_books</i>
        <h4>Holistic News</h4>
        <span class="divider"></span>
    @if (count($news) < 0)
        <div class="center-align">
        <h4>No post yet</h4>
        </div>
    @else
        
    @foreach ($news as $key => $news)

      <div class="col xl12 " data-aos="fade-up" data-aos-delay="{{$key * 50}}">
      <div class="card horizontal" >
        <div class="card-image">
        <img class="image-layer" src="/storage/{{$news->image}}" height="230px" width="300px"/>

        </div>
        <div class="card-stacked">
          <div class="card-content" >
            <div class="card-title">
            {{-- <h5>{{strlen($news->title) > 30 ? substr($news->title, 0,30). '...' : $news->title}}</h5> --}}
            <h5>{{$news->title}}</h5>
            </div>
          </div>
          <div class="card-action">
          <a href="{{route('show', ['id' => $news->id])}}" class="green-text"> Read More</a>
          </div>
        </div>
      </div>
    </div>
       
    @endforeach
    <div class="col xl12" style="padding-top: 2rem" data-aos="fade-up">
    <a href="{{route('page', ['category' => 'news'])}}" class="green-text btn-flat"><h5>More news <i class="material-icons">arrow_forward</i></h5></a>
    </div>
    @endif
       
      </div>
    </section>
    <!-- End of NEWS section -->

    <!-- INFORMATION section -->
    <section id="information">
      <div class="row container center-align">
        <i class="small material-icons white-text">info_outline</i>
        <h4 class="white-text">Holisticare Information</h4>
        <span class="divider white"></span>

        @if (count($holistics) <= 0)
        <div class="center-align">
          <h4 class="white-text">No post yet</h4>
          </div>
        @else
            
        @foreach ($holistics as $key => $holistic)
            
        <div class="col xl4 m6 s12" data-aos="fade-up"  data-aos-delay="{{50 * $key}}">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="/storage/{{$holistic->image}}" height="200px" width="250px"/>
            </div>
            <div class="card-content">
              {{-- <span class="card-title activator grey-text text-darken-4"
            >{{strlen($holistic->title) > 20 ? substr($holistic->title,0,20).'...' : $holistic->title}}<i class="material-icons right">more_vert</i></span
              > --}}
              <span class="card-title activator grey-text text-darken-4"
              >{{ $holistic->title}}<i class="material-icons right">more_vert</i></span
                >
              <p><a href="{{route('show', ['id' => $holistic->id])}}">View Post</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"
            >{{strlen($holistic->title) > 35 ? substr($holistic->title,0,35) : $holistic->title}}<i class="material-icons right">close</i></span
              >
              <p>
                {!!$holistic->content!!}
              </p>
            </div>
          </div>
        </div>
        @endforeach

      
        <div class="col xl4" style="padding-top: 2rem" data-aos="fade-up">
        <a href="{{route('page', ['category' => 'holistic'])}}" class="white-text btn-flat"><h5>More Posts <i class="material-icons">arrow_forward</i></h5></a>
        </div>
        @endif

      </div>
    </section>
    <!-- End of INFORMATION section -->
    <!-- HERBAL TEA AND BENEFITS -->
    <section id="HTB">
      <div class="row container ">
        <div class="center-align">
          <i class="small material-icons">info_outline</i>
          <h4 class="">Herbal Tea and its Benefits</h4>
          <span class="divider"></span>
        </div>
        @if (count($herbals) <= 0)
        <div class="center-align">
          <h4>No post yet</h4>
          </div>
        @else
            
        @foreach ($herbals as $key => $herbal)
         <div class="col xl3 m6 s12" data-aos="fade-right" data-aos-delay="{{50 * $key}}">
           <a href="{{route('show', ['id' => $herbal->id])}}">
             <div class="card">
               <div class="card-image">
               <img src="/storage/{{$herbal->image}}" height="200px" width="200px"/>
               <span class="card-title black-text">{{$herbal->title}}</span>
               </div>
             </div>
           </a>
         </div>
        @endforeach 
 
           <div class="col xl3 12" style="padding-top: 2rem">
         <a href="{{route('page', ['category' => 'herbal'])}}" class="btn-flat green-text"><h5>Read More<i class="material-icons">arrow_forward</i></h5></a>
         </div>
        @endif
      </div>
    </section>
    <!-- End of HERBAL TEA AND BENEFITS -->
    <div class="parallax-container">
      <div class="parallax"><img src="/storage/img/parallax.jpg" /></div>
      <div class="center-align parallax-text">
        <i class="material-icons medium">view_headline</i>

        <h2>Stories of Life from soil to soil</h2>
      </div>
    </div>
    <section id="stories">
      <div class="row container">
        <div class="center-align">
          <div class="card text-title" data-aos="fade-up">
            <div class="card-content">
              <h5>
                DISCOVERING THE CENTER FOR HOLISTIC HEALTH CARE (CHHC) IN
                HARMONY VILLAGE ON THE BENEFITS OF PHILIPPINE PLANTS TO ANY
                NOURISH LIFE
              </h5>
            </div>
          </div>
        </div>

        <h5 data-aos="fade-up">
          The CHHC is a new experience and service of Silsilah Dialogue Movement
        </h5>

        <ul class="collection" data-aos="fade-up">
          <li class="collection-item avatar">
            <i class="material-icons circle green">grade</i>
            <p>
                It started fifteen years ago with the desire to share the benefits
                of nature linked with a specific pillar of Culture of Dialogue
                which is the Dialogue with Creation.
            </p>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">grade</i>
            <p>
                Here we present an on – going research done by our researcher Mary Josephine Cagurangan, well known by many as “Jojo” or “Mother Earth”. It is a compilation of research action experiences on the benefits of Philippine native plants to heal and nourish life.

            </p>
          </li>
          <li class="collection-item avatar">
            <i class="material-icons circle green">grade</i>
            <p>
                The stories of healing recorded here are all true even if some are not recorded with a specific name, to respect the privacy of those who do not like to share their identity as persons who have benefited by the CHHC services and the advise of “Jojo”.
            </p>
          </li>
        </ul>

        @if (count($testimonies) <= 0)
        <div class="center-align">
          <h4>No post yet</h4>
          </div>
        @else
            
        @foreach ($testimonies as $key => $testimony)
         <div class="col xl4 sm6 s12">
            <div class="card"  data-aos="fade-up" data-aos-delay="{{50 * $key}}">
                <div class="card-image">
                <img src="/storage/{{$testimony->image}}" width="300px" height="200px">

                </div>
                <div class="card-content" >
                    <span class="card-title testimony-title" id="cardTitle">{{$testimony->title}}</span>
                </div>
                <div class="card-action">
                <a href="{{route('show', ['id' => $testimony->id])}}">View Post</a>
                    </div>
              </div>
          </div>    
        @endforeach
       
      
          <div class="col xl4" style="padding-top: 2rem">
        <a href="{{route('page', ['category' => 'testimony'])}}" class="btn-flat green-text"><h5>More Stories <i class="material-icons">arrow_forward</i></h5></a>
        </div>
        @endif
      </div>
    </section>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, { responsiveThreshold: 1 });
      });
    </script>
    @endsection
