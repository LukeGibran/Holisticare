@extends('layouts.app')

@section('content')

    <section id="holistic_main">
      <div class="row container">
        <h3>
          Holistic Information
        </h3>
        <div class="row">
          @foreach ($data as $holistic)
          <div class="col xl4 m6 s12" >
              <div class="card" data-aos="fade-up">
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
          <div class="col xl12 right-align">
            {{$data->links()}}
          </div>


        </div>

      </div>
    </section>
   @endsection

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, { responsiveThreshold: 1 });
      });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>
