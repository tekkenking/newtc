<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tracology Portal | @yield('title')</title>

    <link href="{{asset('css/noath.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        @yield('content')

        <hr/>

        <div class="row">
            <div class="col">
                Copyright Tracology
            </div>
            <div class="col text-right">
                <small>© 2018</small>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/noath.js') }}"></script>
    @stack('scripts')
</body>

</html>
