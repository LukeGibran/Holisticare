@extends('layouts.admin')
    @section('content')

        <section id="user_admin">
            @extends('includes.side')

            <div class="row">
                <div class="col s12 container">
                    @include('includes.messages')
                  </div>
                <div class="col s6 offset-s3 center-align" id="user_title">
                    <h3 style="margin-bottom:1px;">Edit Information</h3>
                  </div>
                  

            </div>

            <div class="col s12 container" data-aos="fade-up">
                <div class="card horizontal">
                  <div class="card-stacked">
                    <div class="card-content">  
                    
                      <img
                        src="{{Auth::user()->image == null ? '/storage/img/user.png' : '/storage/uploads/'.Auth::user()->image}}"
                        id="about_image"
                        height="200px"
                        width="200px"

                        style="min-height:200px;"
                      />
                      <div class="col s12 " id="Block" style="height:100px;"></div>

                        <div class="card-title" style="margin-bottom:2rem">
                          <h5>
                              {{Auth::user()->name}}

                          </h5>
                          <span style="display:block">
                          ({{Auth::user()->email}})
                          </span>
                        </div>
                      <div class="hide-on-med-and-up col s12" style="height:40px;"></div>
                    <form action="{{route('user.update', ['id' => Auth::user()->id])}}" method="post" id="form" enctype="multipart/form-data">
                          @csrf
                              <div class="non-confidential row" style="margin-bottom:2rem">

                                  <div class="input-field col xl6 s12">
                                    <i class="material-icons prefix">account_circle</i>
                                   <input id="input_name" type="text" value="{{old('name') ?? Auth::user()->name}}"  name="name" required>
                                    <label for="input_name">Your name</label>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="red-text">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                  </div>
                                  <div class="input-field col xl6 s12">
                                    <i class="material-icons prefix">email</i>
                                    <input id="input_email" type="email" value="{{old('email') ?? Auth::user()->email   }}"  name="email" required>
                                    <label for="input_email">Your email</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="red-text">{{ $message }}</strong>
                                    </span>
                                   @enderror
                                  </div>
                              </div>

                              <h5 >Set a New Password</h5>
                              <div class="confidential row" style="margin-bottom:2rem">

                                  <div class="input-field col xl6 s12">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="input_pw" type="password"   name="pw1" minlength="8">
                                        <label for="input_pw">Your password</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="red-text">{{ $message }}</strong>
                                        </span>
                                       @enderror
                                       <span class="invalid-feedback alert-pw" role="alert" style="display:none">
                                          <strong class="red-text">Passwords do not match</strong>
                                      </span>
                                      </div>
                                      <div class="input-field col xl6 s12">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="input_pw2" type="password"   name="pw2" minlength="8">
                                            <label for="input_pw2">Confirm password</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert" >
                                                <strong class="red-text">{{ $message }}</strong>
                                            </span>
                                           @enderror
                                           <span class="invalid-feedback alert-pw" role="alert" style="display:none">
                                              <strong class="red-text">Passwords do not match</strong>
                                           </span>
                                          </div>
                              </div>

                              <h5>Choose a Profile Pic</h5>
                              <div class="files row" style="margin-bottom:2rem">
                                    <div class=" col xl8 s12 file-field input-field">
                                            <div class="btn green darken-1">
                                              <span>File</span>
                                              <input type="file" id="InputFile" name="image" >
                                            </div>
                                            <div class="file-path-wrapper">
                                              <input class="file-path validate" type="text">
                                            </div>
                                          </div>
                                          <div class="col xl3 s12">
                                                <div class="image-preview" id="imagePreview" style="min-height:200px;width:200px">
                                                  <img src="" alt="preview image" class="image-preview__image" name="img" >
                                                  <span class="image-preview__default-text">Image Preview</span>
                                                </div>
                                             </div>
                              </div>
                              <input type="password" name="mirror_pw" id="mirror_pw" hidden>

                              <div class="buttons row">
                                <div class="col s12">
                                    <a href="{{url()->previous()}}" class="btn red darken-1 left"> Cancel <i class="material-icons left" style="margin:0;width:20px">arrow_backward</i></a>

                                    <a class="waves-effect waves-light btn blue lighten-1 modal-trigger right" id="submit_btn" href="#modal1"><i class="material-icons right">send</i> Update</a>

                                </div>
                              </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </section>

        <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4 class="blue-text" style="margin-bottom:1rem">Confirm Password</h4>

                  
                  <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input id="confirm_pw" type="password"   name="confirm_pw" >
                        <label for="confirm_pw">Confirm password</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong class="red-text">{{ $message }}</strong>
                        </span>
                       @enderror
                      </div>
                </div>
                <div class="modal-footer">
                        <button id="update_btn" class="btn-flat waves-effect waves-blue blue-text">Submit</button>
                        <a href="#!" class="modal-close waves-effect waves-red btn-flat red-text">Close</a>
                </div>
              </div>

        <script>
                  document.addEventListener('DOMContentLoaded', function() {
              var elems = document.querySelectorAll('.sidenav');
              var instances = M.Sidenav.init(elems, {});
      

              var modal = document.querySelectorAll('.modal');
              var modalInstances = M.Modal.init(modal, {});
            });
        </script>
        <script>
                const inputFile = document.getElementById('InputFile');
                const imgContainer = document.getElementById('imagePreview');
                const previewImg = document.querySelector('.image-preview__image');
                const previewText = document.querySelector('.image-preview__default-text');
        
                inputFile.addEventListener('change', function() {
                  const file = this.files[0];
        
                  if(file){
                    const reader = new FileReader();
        
                    previewText.style.display = 'none';
                    previewImg.style.display = 'block';
        
                    reader.addEventListener('load', function() {
                      previewImg.setAttribute('src', this.result);
                    })
        
                    reader.readAsDataURL(file)
                  }else{
                    previewText.style.display = null;
                    previewImg.style.display = null;
        
                    previewImg.setAttribute('src', '')
                  }
                });
        
            </script>

            <script>
                const updateBtn = document.querySelector('#update_btn');
                const form = document.getElementById('form');
                const confirmPw = document.querySelector('#confirm_pw');  
                const mirrorPw = document.querySelector('#mirror_pw');
                const newForm = new FormData(form);
                const pw = document.querySelector('#input_pw');
                const pw2 = document.querySelector('#input_pw2');
                const alertPw = document.querySelectorAll('.alert-pw');
                const submitBtn = document.querySelector('#submit_btn');
                const passwords = [pw, pw2];
  
                confirmPw.addEventListener('input', () => {
                  mirrorPw.value = confirmPw.value;
                })

                updateBtn.addEventListener('click', e => {
                    e.preventDefault();
                    
                    
                    form.submit();
                });

                passwords.forEach(password => {
                  password.addEventListener('input', () => {
                  if(pw.value != pw2.value){
                    alertPw.forEach(alert => alert.style.display = 'block');
                    submitBtn.classList.add('disabled');
                  } else{
                    alertPw.forEach(alert => alert.style.display = 'none')
                    submitBtn.classList.remove('disabled');
                  }
                })
                })

            </script>
    @endsection