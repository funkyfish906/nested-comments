<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{!! Config::get('app.name') !!}</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>
    <body>
        <div class="container" id="app">
            @yield('content')
        </div>
    </body>
    <script src="{{ URL::asset('js/app.js') }}" defer></script>
</html>
