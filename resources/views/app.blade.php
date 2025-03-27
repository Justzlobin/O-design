<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v1">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v1">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v1">
{{--    <link rel="manifest" href="/site.webmanifest?v1">--}}
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v1" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#333">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          rel="stylesheet">


    <title>{{$generalSettings->site_name}}</title>
    @vite('resources/css/app.css')
</head>
<body>

<header id="header" class="fx-col">
    @include('partials.header')
</header>

<main>
    <div id="_main_container">
        @yield('content')
    </div>
</main>

<footer>
    @include('partials.footer')
</footer>

<div id="_contact_us_modal"></div>
<div id="loading-screen" class="_show">
    <div class="spinner"></div>
</div>
@vite('resources/js/app.js')
</body>
</html>
