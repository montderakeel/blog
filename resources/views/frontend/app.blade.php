<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>
      MONTDER AKEEL
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @hasSection('style')
      <style>
        @yield('style')
      </style>
    @endif
  </head>
  <body>
    <nav>
      <br>
    </nav>
    @yield('content')
  </body>
</html>
