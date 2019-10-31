<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="prevent-scroll">
    <div class="loader">
        <div class="lds-dual-ring"></div>
    </div>
    <div id="app">
        @include('includes.sidenav')
        @include('includes.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="/js/aos.js">
    </script>
    <script>
    AOS.init();
    </script>
</body>
    @include('includes.footer')
<script src="{{ asset('js/app.js') }}" defer></script>
<script>
      document.addEventListener('DOMContentLoaded', function() {
    var sidenav = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(sidenav, {});
    
    var dropdownTrigger = document.querySelector('.dropdown-trigger');
    var dropdownInstance = M.Dropdown.init(dropdownTrigger, { hover: false});

    var dropdownTrigger2 = document.querySelector('.dropdown-trigger2');
    var dropdownInstance2 = M.Dropdown.init(dropdownTrigger2, { hover: false});
  });
  
</script>

<script>
function onReady(callback) {
  var intervalId = window.setInterval(function() {
    if (document.getElementsByTagName('body')[0] !== undefined) {
      window.clearInterval(intervalId);
      callback.call(this);
    }
  }, 1000);
}

function setVisible(selector, visible) {
  document.querySelector(selector).style.display = visible ? 'block' : 'none';
  document.querySelector('body').classList.remove('prevent-scroll');
}

onReady(function() {
  setVisible('.loader', false);
});

</script>


</html>
