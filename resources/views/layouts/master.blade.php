<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Importing Google Font - Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
    <!-- Importing Lineicons CSS -->
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
        <!-- Importing Boxicons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <link href="{{ asset('css/global_styles.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

    <title>@yield('title', 'App Livraison')</title>
</head>
<body>

    <main>
        @yield('content')
    </main>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"> </script>
</body>
</html>