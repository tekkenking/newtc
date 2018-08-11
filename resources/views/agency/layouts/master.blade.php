
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Tracology Portal | @yield('title')</title>

        <link href="{{asset('css/nif.css')}}" rel="stylesheet">
    </head>

    <body>
        <div id="container" class="effect aside-float aside-bright mainnav-lg">
            @include('agency.layouts.header')
            <div class="boxed">
                <div id="content-container">
                    @include('agency.layouts.breadcrum')
                    <div id="page-content">
                        <div class="panel">
                            <div class="panel-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                @include('agency.layouts.mainnav')
            </div>
            @include('agency.layouts.footer')
        </div>

        <script type="text/javascript" src="{{ asset('js/nif.js') }}"></script>

        @stack('scripts')
        @include('partials.modal')
    </body>
</html>