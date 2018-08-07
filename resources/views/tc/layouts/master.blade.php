<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tracology Portal | @yield('title')</title>

        <link href="{{asset('css/noath.css')}}" rel="stylesheet">

    </head>

    <body>

    <div id="wrapper">
        @include('tc.layouts.mainside_menu')

        <div id="page-wrapper" class="gray-bg">
            @include('tc.layouts.notificationbar')
            @include('tc.layouts.breadcrum')
            <div class="wrapper wrapper-content animated fadeInRight">
                @yield('content')
            </div>
            @include('tc.layouts.footer')
        </div>


    </div>
    <script type="text/javascript" src="{{ asset('js/noath.js') }}"></script>

    @stack('scripts')
    @include('partials.modal')
</body>

</html>
