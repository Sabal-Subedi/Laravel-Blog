@include('partials._header')


  <body>
    @include('partials._navbar')
    @include('partials._message')
    @yield('content')
    @include('partials._footer')
  </body>
</html>