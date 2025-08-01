@extends('app')

@section('seo')
    <title>{{$generalSettings->site_name}}</title>
    <meta name="robots" content="noindex, nofollow">

    <meta name="description" content="{{$seo->meta_description}}">
    <meta name="keywords" content="{{$seo->meta_keywords}}">

    <meta property="og:title" content="{{$seo->meta_title}}">
    <meta property="og:description" content="{{$seo->meta_description}}">
    <meta property="og:image" content="{{$seo->getFirstMediaUrl()}}">
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="website"/>

    <meta name="twitter:title" content="{{$seo->meta_title}}">
    <meta name="twitter:description" content="{{$seo->meta_description}}">
    <meta name="twitter:image" content="{{$seo->getFirstMediaUrl()}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
    <section class="main__banner fx-col">
        <div class="main__banner-content">
            <swiper-container slides-per-view="auto"
                              space-between="5"
                              loop="true"
                              speed="2000"
                              autoplay='{"delay": 400, "disableOnInteraction": false, "pauseOnMouseEnter": true}'
                              centered-slides="true"
            >
                @foreach($banners as $banner)
                    <swiper-slide>
                        <picture>
                            <source srcset="{{ $banner->media[0]->getUrl('main_webp') }}" type="image/webp">
                            <img src="{{ $banner->media[0]->getUrl('main_jpg') }}" alt="{{ $banner->title }}">
                        </picture>
                    </swiper-slide>
                @endforeach
            </swiper-container>

            <div class="main__banner-buttons fx-row">
                <button id="_main__banner_contact_us_btn" class="f-300 f-s-16">@lang('home.banner_btn')</button>
            </div>
        </div>
    </section>

    <section class="main__content fx-col flex-center">
        <div class="main__content-grid">
            @foreach($menus as $menu)
                <a href="{{$menu->link}}">
                    <div class="main__content-item" style="background-image: url({{$menu->media[0]->getUrl('menu_jpg')}});">
                        <span class="main__content-item_title f-s-30 f-500">@lang('home.menu.' . $menu->title )</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
