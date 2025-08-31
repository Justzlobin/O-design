<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    {{-- Dynamic seo head tags start --}}
    @yield('seo')
    {{-- Dynamic seo head tags end --}}

    {{--    OPEN GRAPHS --}}
    <meta property="og:site_name" content="{{$generalSettings->site_name}}">

    {{--    <meta name="msapplication-TileColor" content="#da532c">--}}
    <meta name="theme-color" content="#333">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="/site.webmanifest">

    {{--    <link rel="mask-icon" href="/safari-pinned-tab.svg?v1" color="#5bbad5">--}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<style>
    :root {
        --color-1: {{ $generalSettings->color_1 }};
        --color-2: {{ $generalSettings->color_2 }};
        --color-3: {{ $generalSettings->color_3 }};
        --color-5: {{ $generalSettings->color_5 }};
        --color-text-1: {{ $generalSettings->color_text_1 }};
    {{----color-text-1: {{ $generalSettings->color_text_1 }};--}}
    }

    [data-theme="dark"] {
        --color-1: {{ $generalSettings->dark_color_1 }};
        --color-2: {{ $generalSettings->dark_color_2 }};
        --color-3: {{ $generalSettings->dark_color_3 }};
        --color-5: {{ $generalSettings->dark_color_5 }};
        --color-text-1: {{ $generalSettings->dark_color_text_1 }};
    }

</style>

<body>
@include('partials.header')

<main ID="_main_container">
    @yield('content')
</main>

@include('partials.footer')

<div id="_contact_us_modal"></div>

<div id="loading-screen" class="_show">
{{--    <div class="spinner"></div>--}}
</div>


{{--TOOLTIP FORM REQUEST STATUS --}}
@if (session('success'))
    <div id="notification" class="notification" style="display: none;">
        <div class="notification-content">
            <i class="fa-solid fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@elseif (session('error'))
    <div id="notification" class="notification" style="display: none;">
        <div class="notification-content">
            <i class="fa-solid fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    </div>
@elseif ($errors->any())
    <div id="notification" class="notification" style="display: none;">
        <div class="notification-content">
            <i class="fa-solid fa-exclamation-circle"></i>
            <span>{{ $errors->first() }}</span>
        </div>
    </div>
@endif

<a href="Tel: {{$generalSettings->tel}}" data-tooltip-text="{{$generalSettings->tel}}" id="call" class="fx-row flex-center cursor-pointer">
    <i class="fa-solid fa-phone fa-xl"></i>
</a>

@vite('resources/js/app.js')
</body>
</html>
