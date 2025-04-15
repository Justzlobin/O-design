<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="robots" content="noindex, nofollow">
    {{-- Dynamic seo head tags start --}}
    @yield('seo')
    {{-- Dynamic seo head tags end --}}

    <meta property="og:type" content="website">
    <meta property="og:locale" content="ua">
    <meta property="og:site_name" content="{{$generalSettings->site_name}}">
    <meta property="og:url" content="{{ strtolower(config('app.url') . $_SERVER['REQUEST_URI']) }}">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#333">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--    <link rel="manifest" href="/site.webmanifest?v1">--}}

    <link rel="mask-icon" href="/safari-pinned-tab.svg?v1" color="#5bbad5">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v1">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v1">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<style>
    :root {
        --snow-ash: {{ $generalSettings->color_1 }};
        {{----color-black: {{ $generalSettings->color_2 }};--}}
        --color-2-transparent: {{ $generalSettings->color_2_transparent }};


        --color-1: {{ $generalSettings->color_1 }};
        --color-2: {{ $generalSettings->color_2 }};
        --color-3: {{ $generalSettings->color_3 }};
        --color-4: {{ $generalSettings->color_4 }};
        --color-5: {{ $generalSettings->color_5 }};
        --color-text-1: {{ $generalSettings->color_text_1 }};
        --color-text-2: {{ $generalSettings->color_text_2 }};
        --color-transparent-1: {{ $generalSettings->color_transparent_1 }};
        --color-transparent-2: {{ $generalSettings->color_transparent_2 }};
    }

    [data-theme="dark"] {
        --color-1: {{ $generalSettings->dark_color_1 }};
        --color-2: {{ $generalSettings->dark_color_2 }};
        --color-3: {{ $generalSettings->dark_color_3 }};
        --color-4: {{ $generalSettings->dark_color_4 }};
        --color-5: {{ $generalSettings->dark_color_5 }};
        --color-text-1: {{ $generalSettings->dark_color_text_1 }};
        --color-text-2: {{ $generalSettings->dark_color_text_2 }};
        --color-transparent-1: {{ $generalSettings->dark_color_transparent_1 }};
        --color-transparent-2: {{ $generalSettings->dark_color_transparent_2 }};
    }

</style>

<body>
@include('partials.header')

<main>
    <div id="_main_container">
        @yield('content')
    </div>
</main>

@include('partials.footer')

<div id="_contact_us_modal"></div>
<div id="loading-screen" class="_show">
    <div class="spinner"></div>
</div>

<a href="Tel: {{$generalSettings->tel}}" id="call" class="fx-row flex-center cursor-pointer">
    <i class="fa-solid fa-phone fa-xl"></i>
</a>

@vite('resources/js/app.js')
</body>
</html>
