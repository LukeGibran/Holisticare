@extends('layouts.app')

@section('content')

    <section id="objecives_main">
      <div class="row container">
        <h3>
        Contact Us
        </h3>
        @include('includes.messages')
        <div class="col xl8 m6 s12">
          <div class="card horizontal" data-aos="fade-up">

            <div class="card-stacked">
              <div class="card-content">
              <form method="POST" action="{{route('contact.store')}}">
                @csrf
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                 <input id="input_name" type="text" value="{{old('name')}}"  name="name" required>
                  <label for="input_name">Your name</label>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong class="red-text">{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="input_email" type="email" value="{{old('email')}}"  name="email" required>
                  <label for="input_email">Your email</label>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong class="red-text">{{ $message }}</strong>
                  </span>
                 @enderror
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">subject</i>
                  <input id="input_subject" type="text" value="{{old('subject')}}" name="subject"  required>
                  <label for="input_subject">Your Subject</label>
                  @error('subject')
                  <span class="invalid-feedback" role="alert">
                      <strong class="red-text">{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">message</i>
                  <textarea id="message" class="materialize-textarea" name="message">{{old('message')}}</textarea>
                  <label for="message">Your Message</label>
                  @error('message')
                  <span class="invalid-feedback" role="alert">
                      <strong class="red-text">{{ $message }}</strong>
                  </span>
                   @enderror
                </div>
              </div>
                <div class="card-action right-align">
                  <button href="#" class="waves-effect waves-light btn green darken-1"><i class="material-icons right">send</i>Send</button>

                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="col xl4 m6 s12">
          <div class="card horizontal" data-aos="fade-up">
              <div style="padding:1rem">
              <div class="address">
                    <h5> <i class="material-icons">home</i> Address: </h5>
                    <p>Harmony Village, Pitogo, Sinunuc, Zamboanga City, Philippines</p> 
              </div>
              <hr>
              <div class="telno">
                    <h5> <i class="material-icons">phone</i> Tel no: </h5>
                    <p>983-0014 or 983-0155</p>
              </div>
              <hr>
              <div class="email">
                    <h5> <i class="material-icons">email</i> Email Address: </h5>
                    <p>holisticare8@gmail.com</p>
              </div>

              </div>
          </div>
        </div>

      </div>
    </section>
@endsection
    <script src="js/materialize.min.js"></script>
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
