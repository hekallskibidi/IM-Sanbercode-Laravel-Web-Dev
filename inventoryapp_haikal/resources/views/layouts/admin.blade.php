<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title', 'Dashboard')</title>

    <!-- Bootstrap dulu (wajib) -->
    <link href="{{ asset('seodash/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Simplebar (scroll custom, dari libs) -->
    <link href="{{ asset('seodash/libs/simplebar/dist/simplebar.css') }}" rel="stylesheet">

    <!-- Tabler icons (dari css/icons atau libs) -->
    <link href="{{ asset('seodash/css/icons/tabler-icons/tabler-icons.css') }}" rel="stylesheet">

    <!-- Style utama (load terakhir biar override) -->
    <link href="{{ asset('seodash/css/style.css') }}" rel="stylesheet">

    <!-- Colors kalau ada -->
    <link href="{{ asset('seodash/css/colors/default.css') }}" rel="stylesheet">
</head>