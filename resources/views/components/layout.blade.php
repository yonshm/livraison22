<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwind-icons@1.0.0/dist/ti.min.css" rel="stylesheet">

    <link href="{{ asset('css/global_styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Project Livraison</title>
</head>
<body>

    @include('layout.nav')
    <main>
        {{-- @yield('layout.') --}}
    </main>
    {{-- {{ $slot }} --}}

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"> </script>
</body>
</html>