<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/global_styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>@yield('title', 'App Livraison')</title>
</head>
<body>

    @include('layouts.nav')
    <main>
        @yield('content')
    </main>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"> </script>
      <script>
        const menu_bar = document.getElementById("menu-bar");
        const sidebar = document.getElementById("sidebar");
        menu_bar.addEventListener("click", () => {
          sidebar.classList.toggle("show");
          menu_bar.classList.toggle("close");
        });
        </script>
</body>
</html>