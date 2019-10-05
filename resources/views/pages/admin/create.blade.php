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

        <div class="col s6 offset-s3 center-align">
                <h3>Create a Post</h3>
        </div>
        
    </div>

    <div class="row center-align" style="padding: 0 1rem">
    <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="input-field col xl8 s12 left-align">
                    <input id="icon_prefix" type="text" class="validate" value="{{old('title')}}" name="title" required>
                    
                    <label for="icon_prefix">Post Title</label>
                  </div>

                <div class="input-field col xl4 s12">
                  <select name="category">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="news">Holistic News</option>
                    <option value="holistic">Holistic Information</option>
                    <option value="testimony">Testimony</option>
                    <option value="herbal">Herbal Tea</option>
                  </select>
                  <label>Post Category</label>
                </div>
                <div class="col xl8 s12 left-align" >
                  <h5>Featured Image:</h5>
                    <div class="file-field input-field">
                        <div class="btn green darken-1">
                          <span>File</span>
                          <input type="file" id="InputFile" name="image" required>
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
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
                  <textarea name="content" id="editor" value="{{old('content')}}" ></textarea>
                </div>

               <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
               
                <div class="col xl12 s12 buttons right-align" style="padding-top:1rem">
                  <button type="submit" class="waves-effect waves-light btn green darken-1"><i class="material-icons right">publish</i>Publish</button>
                </div>
              </form>
   
    </div>

    </section>
     <script>
 
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {});

        var select = document.querySelectorAll('select');
        var selectInstances = M.FormSelect.init(select, {});
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
    <script src="/js/ckEditor.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script> --}}

@endsection