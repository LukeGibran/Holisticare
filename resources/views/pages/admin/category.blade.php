@extends('layouts.admin')

@section('content')
<div id="modal1" class="modal">
    <div class="modal-content">
      <h3 class="red-text">Warning!</h3>
    <h6>All Posts under this category (<strong>{{$category->type}}</strong>) will also be deleted. Are you sure you want to continue?</h6>
    </div>
    <div class="modal-footer">
    <form action="{{route('category.destroy', ['id' => $category->id])}}" method="post">
        @method('DELETE')
        @csrf

        <button class=" waves-effect  btn-flat red-text">Yes!</button>
        <a href="{{url()->previous()}}" class=" waves-effect  btn-flat green-text">Take me back!</a>
    </form>
    </div>
  </div>


     <script>
 
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var elem = document.querySelector('.modal');

        var instances = M.Modal.init(elems, {});
        var instance = M.Modal.getInstance(elem);

        instance.open();
      });
    </script>


@endsection