@extends('layouts.app')

@section('content')

    <section id="holistic_main">
      <div class="row container">
        <h3>
          Herbal Tea and its Benefits
        </h3>
        <div class="row">
          @foreach ($data as $herbal)
          <div class="col xl4 m6 s12">
                    <div class="card">
                        <div class="card-image">
                        <img src="/storage/{{$herbal->image}}">
                          <span class="card-title">{{$herbal->title}}</span>
                        </div>
                        <div class="card-content">
                        <p>{!!substr($herbal->content, 0, 40).'...'!!}</p>
                        </div>
                        <div class="card-action">
                        <a href="{{route('show', ['id' => $herbal->id])}}">Read More</a>
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
