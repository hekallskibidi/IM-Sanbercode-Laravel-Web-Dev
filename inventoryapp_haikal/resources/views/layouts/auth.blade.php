<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Register')</title>
    <link href="{{ asset('seodash/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('seodash/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="auth-body-bg">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
        <div class="auth-box">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('seodash/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('seodash/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>