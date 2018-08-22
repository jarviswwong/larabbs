<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--csrf-token-->
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>
            @yield('title','LaraBBS') - 开发知识分享与交流
        </title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @yield('external_css')
    </head>
    <body>
        <div id="app" class="{{route_class()}}-page">
            @include('layouts._header')

            <div class="container">
                @yield('content')
            </div>
            @include('layouts._footer')
        </div>
        @yield('external_js')
        <script src="{{asset('js/app.js')}}"></script>
        @include('layouts._message')
    </body>

</html>