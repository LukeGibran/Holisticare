@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="card-panel green darken-1 white-text left-align" id="alert">
        {{session('success')}}
    </div> 
@endif

@if (session('error'))
    <div class="card-panel  red darken-4 white-text left-align" id="alert">
        {{session('error')}}
    </div> 
@endif

@if (session('warning'))
    <div class="card-panel   yellow accent-4 left-align" id="alert">
        {{session('warning')}}
    </div> 
@endif

@if (session('updated'))
    <div class="card-panel white-text  light-blue darken-2 left-align" id="alert">
        {{session('updated')}}
    </div> 
@endif