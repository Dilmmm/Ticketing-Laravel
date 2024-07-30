<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset("./css/app.css") }}" rel="stylesheet">
        <link href="{{ asset("./css/style.css") }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    </head>
    <body class="{{--bg-gradient-to-br from-teal-300 via-teal-200 to-teal-300--}} bg-blue-900 h-full">
        <nav>@include( 'nav-bar.nav' )</nav>
        <div class=" {{--bg-gradient-to-br from-white via-gray-300 to-white --}}bg-gradient-to-br from-blue-300 via-gray-300 to-blue-300 shadow-sm">
            <div class="max-w-4xl mt-18">
                <div class="title-index text-2xl py-6 uppercase text-center">@yield( "title" )</div>
            </div>
        </div>
        <div class="container mt-4 mb-5 mx-auto">
            @yield( "content" )
        </div>
        <div class="{{--container--}} mt-8 mb-5">
        @yield( "contentIndex" )
        </div>

        @stack('scripts')







        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
        <script src="{{ asset("./js/script.js") }}"></script>
    </body>
</html>

