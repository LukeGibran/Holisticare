@extends('layouts.app')
    @section('content')
        <section id="search">
            <div class="row container">
                <h3>
                 Search Result:
                </h3>
                @if (count($data) > 0)
                        @foreach ($data as $result)
                        <div class="col xl12">
                        <div class="card horizontal" data-aos="fade-up">
                        <div class="card-image">
                        <img class="image-layer" src="/storage/{{$result->image}}" height="280px" style="width: 300px !important"/>
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                            <div class="card-title">
                                {{$result->title}}
                            </div>
                            </div>
                            <div class="card-action">
                            <a href="{{route('show', ['id' => $result->id])}}" class="green-text">Read More</a>
                            </div>
                        </div>
                        </div>
                    </div>

                    @endforeach
                @else
                <div class="container">
                    <h4 style="margin-bottom:10rem;">No result found, please try again..</h4>
                </div>
                @endif
                
                <div class="col xl12 center-align">
                   <h4>END OF RESULTS</h4>
                  </div>
                
        
        
              </div>
        </section>
    @endsection