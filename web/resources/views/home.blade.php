<!DOCTYPE html>
<html lang="en">
<head>
    <title>iHelp</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name=description content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="iHelp team" />
    <link rel="shortcut icon" href="{!! asset('/web/public/css/Travel-Share-Icon.png') !!}" />

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link rel="prefetch stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800,600">

    <link rel="stylesheet" href="{{ URL::asset('web/public/css/libs/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('web/public/css/libs/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('web/public/css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('web/public/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('web/public/css/libs/typeahead.css') }}">
    <link rel="stylesheet" type="text/css" href="/web/semantic/dist/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">


    <!-- Lity lightbox files -->
    <link rel="stylesheet" href="{{  URL::asset('web/public/css/lity.css') }}">

</head>


<body>

    @include('pages.partials.alerts')
    @yield('content')


<!-- JavaScripts -->
<script src="{{ URL::asset('web/public/js/libs/jquery.js') }}"></script>
<script type="text/javascript" src={{ URL::asset('web/public/js/libs/bootstrap.js') }}></script>
<script src="{{ URL::asset('web/public/js/libs/sweetalert.js') }}"></script>
<script src="{{ URL::asset('web/public/js/libs/FitText.js') }}"></script>
<script src="/web/semantic/dist/semantic.min.js"></script>
<script src="{{ URL::asset('web/public/js/main.js') }}"></script>

@yield('scripts.footer')
@include('flash')

</body>
</html>