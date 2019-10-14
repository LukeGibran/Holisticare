@extends('layouts.app')

@section('content')

    <section id="holistic_main">
      <div class="row container">
        <h3>
          {{ucfirst($category)}}
        </h3>
        <div class="row">
          @if (count($data) == 0)
             <div class="center-align">
              <h4 style="margin-bottom:4rem">No posts yet ...</h4>
              </div>
          @else
          @foreach ($data as $custom)
          <div class="col xl4 m6 s12" >
              <div class="card" data-aos="fade-up">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="/storage/{{$custom->image}}" height="200px" width="250px"/>
                </div>
                <div class="card-content">

                  <span class="card-title activator grey-text text-darken-4"
                  >{{ $custom->title}}<i class="material-icons right">more_vert</i></span
                    >
                  <p><a href="{{route('show', ['id' => $custom->id])}}">View Post</a></p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"
                >{{strlen($custom->title) > 35 ? substr($custom->title,0,35) : $custom->title}}<i class="material-icons right">close</i></span
                  >
                  <p>
                    {!!$custom->content!!}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
          <div class="col xl12 right-align">
            {{$data->links()}}
          </div>
          @endif


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

  </body>
</html>
