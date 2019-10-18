@extends('layouts.app')

@section('content')
    <style>
      img.image-layer{
        width: 350px !important;
      }
    </style>
    <section id="news_main">
      <div class="row container">
        <h3>
          Holistic News
        </h3>
        <div class="row">
          @foreach ($data as $news)
          <div class="col xl12 s12">
              <div class="card horizontal" data-aos="fade-up">
                  <div class="card-image">
                    <img class="image-layer" src="/storage/{{$news->image}}" height="300px" width="300px"/>
                  </div>
                  <div class="card-stacked">
                    <div class="card-content">
                      <div class="card-title">
                        {{$news->title}}
                      </div>
                    </div>
                    <div class="card-action">
                    <a href="{{route('show', ['id' => $news->id])}}" class="green-text">Read More</a>
                    </div>
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

  </body>
</html>
