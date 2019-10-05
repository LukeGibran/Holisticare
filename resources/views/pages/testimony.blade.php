@extends('layouts.app')

@section('content')
    <section id="objecives_main">
      <div class="row container">
        <h3>
        Stories of Life from Soil to Soul

        </h3>

        @foreach ($data as $testimony)
            
        <div class="col xl12">
        <div class="card horizontal" data-aos="fade-up">
          <div class="card-image">
          <img class="image-layer" src="/storage/{{$testimony->image}}" style="height:300px !important; width: 400px"/>
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <div class="card-title">
                {{$testimony->title}}
              </div>
              <p>
                {!!substr($testimony->content,0,250).'...'!!}
              </p>
            </div>
            <div class="card-action">
            <a href="{{route('show', ['id' => $testimony->id])}}" class="green-text">Read More</a>
            </div>
          </div>
        </div>
      </div>
        @endforeach
        <div class="col xl12 right-align">
            {{$data->links()}}
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
