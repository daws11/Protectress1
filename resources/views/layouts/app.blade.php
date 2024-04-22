<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/register.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">

    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">   
</head>
<body>

@include('partials.navbar')

<div class="container">
    @yield('content')
</div>

@include('partials.footer')
<script>
    window.onload = function() {
        @if(session('success'))
            alert('{{ session('success') }}');
        @elseif(session('error'))
            alert('{{ session('error') }}');
        @endif
    }

    function goToCommunityForum() {
    window.location.href = '/forum';  
}
</script>

<script src="{{ asset('js/app.js') }}"></script>


</body>
</html>
