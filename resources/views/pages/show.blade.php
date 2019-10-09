@extends('layouts.app')

@section('content')
<style>
  p, li{
    font-size: 20px;
  }

  img{
    max-width: 100%;
  }
</style>
<section id="holistic_view">
        <div class="parallax-container">
            <div class="parallax"><img src="/storage/{{$data->image}}" /></div>
        </div>

        <div class="row container" id="contents">
            <div class="col xl3 m4 s12" id="content_img">
                <img
                  class="materialboxed"
                    src="/storage/{{$data->image}}"
                    id="view_image"
                  height="200px" width="200px"/>
            </div>
            <div class="col s12 hide-on-med-and-up" id="Block" style="height:100px;"></div>
            <div class="col xl8 m8 s12" id="content_title">
            <h4>{{$data->title}}</h4>
            </div>

            <div class="col xl12" style="padding-top:3rem;">
                @include('includes.messages')
            </div>
            <div class="col xl12 s12" id="content_body" style="padding-top:3rem;">
                {{-- <div class="col s6">
                    <img src="/storage/img/view_pic.jpg" alt="" style="width:100%">
                </div> --}}
                <div class="col x12">
                <p style="font-size:32px" class="flow-text">{!!$data->content!!}</p>
                </div>
            </div>

               <div class="col xl12 lef-align" style="padding-top:3rem">
                <a href="{{url()->previous()}}" class="btn-flat"> Back <i class="material-icons left" style="margin:0;width:20px">arrow_backward</i></a>
               </div>
        </div>
    </section>
     <script>
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, { responsiveThreshold: 1 });


      });
    </script>
    <script>
          document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, {});
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