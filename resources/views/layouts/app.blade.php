<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <!-- style -->
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

    
</head>
<body>
    
    {{-- Start Navbar --}}
    @include('layouts.navbar')
    <!-- End Navbar -->

    @yield('content')
        

    {{-- STart Footer --}}
    <footer class="container-fluid">
        <p class="m-2">
            All Copyright Is Reserved {{ date('Y') }}
        </p>
    </footer>
    {{-- End Footer --}}

    <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>