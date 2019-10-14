@extends('layouts.admin')

    @section('content')
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
        }
        </style>
      <section id="create_view">
              @include('includes.side')
          <div class="row">
      
              <div class="col s6  offset-s3 center-align">
              <h3>Edit Post </h3>
              <a href="{{url()->previous()}}" class="btn orange darken-1"> Back <i class="material-icons left" style="margin:0;width:20px">arrow_backward</i></a>

          </div>
      
          <div class="row center-align" style="padding: 0 1rem">
          <form action="{{route('admin.update', ['admin' => $post->id])}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
                      @csrf
                      
                      <div class="input-field col xl8 s12 left-align">
                          <input id="icon_prefix" type="text" class="validate" value="{{$post->title}}" name="title" required>
                          <label for="icon_prefix">Post Title</label>
                        </div>
      
                      <div class="input-field col xl4 s12">
                        <select name="category">
                            @foreach ($categories as $categories)
                            <option value={{$categories->type}} {{$categories->type == $post->category ? 'selected' : ''}}>{{ucfirst($categories->type)}}</option>
                              @endforeach
      
                        </select>
                        <label>Post Category</label>
                      </div>
                      <div class="col xl8 s12 left-align" >
                        <h5>Featured Image:</h5>
                          <div class="file-field input-field">
                              <div class="btn green darken-1">
                                <span>File</span>
                              <input type="file" id="InputFile" name="image">
                              </div>
                              <div class="file-path-wrapper">
                              <input class="file-path validate" value="{{$post->image}}" type="text">
                              </div>
                            </div>
                      </div>
      
                      <div class="col xl3 s12">
                         <div class="image-preview" id="imagePreview">
                           <img src="" alt="preview image" class="image-preview__image" name="img">
                           <span class="image-preview__default-text">Image Preview</span>
                         </div>
                      </div>
      
                      <div class="col xl12 s12 left-align" style="margin-top: 3rem" >
                        <h5>Post Content:</h5>
                      <textarea name="content" id="editor" >{{$post->content}}</textarea>
                      </div>
      
                     <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>

                      <div class="col xl12 s12 buttons " style="padding-top:1rem">

                    <button data-target="modal1" class="red darken-1 btn modal-trigger" style="float:left"><i class="material-icons right">delete</i> Remove</button>


                        <button type="submit" class="waves-effect waves-light btn green darken-1 " style="float:right"><i class="material-icons right">publish</i>Publish</button>

                      </div>
                    </form>
         
          </div>
      
          </section>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                              <h4 class="red-text">Warning!</h4>
                              <p>Are you sure you want to remove this post?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{route('admin.destroy', ['admin' => $post->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn-flat red-text">Yes</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat green-text">No</a>
                                  </form>
                              



                            </div>
                          </div>
           <script>
       
          document.addEventListener('DOMContentLoaded', function() {
              var elems = document.querySelectorAll('.sidenav');
              var instances = M.Sidenav.init(elems, {});
      
              var select = document.querySelectorAll('select');
              var selectInstances = M.FormSelect.init(select, {});

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
          <script src="/js/ckEditor.js">
          </script>

    @endsection