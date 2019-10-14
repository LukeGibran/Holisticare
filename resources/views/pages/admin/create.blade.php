@extends('layouts.admin')

@section('content')

<section id="create_view">
        @include('includes.side')
    <div class="row">

        <div class="col s6 offset-s3 center-align">
                <h3>Create a Post</h3>
        </div>
       

    </div>

    <div class="row center-align" style="padding: 0 1rem">
          {{-- session alerts --}}
        @include('includes.messages')

    <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="input-field col xl8 s12 left-align">
                    <input id="icon_prefix" type="text" class="validate" value="{{old('title')}}" name="title" required>
                    
                    <label for="icon_prefix">Post Title</label>
                  </div>

                <div class="input-field col xl3 s10">
                  <select name="category">
                    <option value="" disabled selected>Choose your option</option>

                    @foreach ($categories as $category)
                    <option value={{$category->type}}>{{ucfirst($category->type)}}</option>
                      @endforeach
                  </select>
                  <label>Post Category</label>
                </div>

                <div class="col xl1 s2" style="height:70px;padding-top:25px">
                  {{-- modal trigger --}}
                  <a href="#modal1" class="btn yellow darken-4 modal-trigger"><i class="material-icons">add_circle</i></a>


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
                  <textarea name="content" id="summary-ckeditor" value="{{old('content')}}" ></textarea>
                </div>

               <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
               
                <div class="col xl12 s12 buttons " style="padding-top:1rem">
                    <a href="{{url()->previous()}}" class="btn orange darken-1 left"> Back <i class="material-icons left" style="margin:0;width:20px">arrow_backward</i></a>
                  <button type="submit" class="waves-effect waves-light btn green darken-1 right"><i class="material-icons right">publish</i>Publish</button>
                </div>
              </form>
   
    </div>

                        <!-- Modal Structure -->
                  <div id="modal1" class="modal">
                      <div class="modal-content" style="padding-bottom:0">
                        <h4 style="margin-bottom:2rem">New Category</h4>
                      <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="input-field">
                            <input placeholder="category" id="category" type="text" class="validate" name="type" required>
                            <label for="category">Category</label>
                        </div>
                      </div>
                      <div class="right-align">

                        <button class="btn-flat waves-effect green-text">Add</button>
                      </form>
                      
                      <a href="#!" class="modal-close waves-effect waves-red red-text btn-flat">Cancel</a>
                      </div>
                      <h4  style="margin: 1rem">All Categories</h4>
                      <div style="padding:0 2rem">

                        @foreach ($categories as $category)
                      <a href="{{route('category.delete', ['id' => $category->id])}}" class="btn red darken-1" style="margin-bottom:1rem"><i class="material-icons right">close</i> {{$category->type}}</a>
                        @endforeach

                        
                      </div>
                      <div class="modal-footer ">
     
                      </div>
                    </div>
    </section>
     <script>
 
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, {});

        var select = document.querySelectorAll('select');
        var selectInstances = M.FormSelect.init(select, {});

        var modalElems = document.querySelectorAll('.modal');
        var modalInstances = M.Modal.init(modalElems,{} );
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
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
  <script>
         CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
  </script>

@endsection