@extends('app')

@section('seo')
    <title>{{$generalSettings->site_name}}</title>
    <meta name="description" content="{{$seo->meta_description}}">
    <meta name="keywords" content="{{$seo->meta_keywords}}">
    <meta property="og:title" content="{{$generalSettings->site_name}}">
    <meta property="og:description" content="{{$seo->meta_description}}">
    <meta property="og:image" content="{{$banners[0]->getFirstMediaUrl()}}">
@endsection

@section('content')
    <section class="main__banner fx-col">
        <div class="main__banner-content">
            <swiper-container slides-per-view="auto"
                              space-between="5"
                              loop="true"
                              free-mode
                              speed="4000"
                              autoplay='{"delay": 300, "disableOnInteraction": false, "pauseOnMouseEnter": true}'
            >
                @foreach($banners as $banner)
                    <swiper-slide>
                        <img class="_main__banner_img" src="{{ $banner->getFirstMediaUrl()}}"
                             alt="{{$banner->title}}">
                    </swiper-slide>
                @endforeach
            </swiper-container>

            <div class="main__banner-buttons fx-row">
                <a id="_main__banner_projects_btn" class="f-500 f-s-20" href="{{route('projects')}}">Проєкти</a>
                <button id="_main__banner_contact_us_btn" class="f-500 f-s-20">Контакти</button>
            </div>
        </div>
{{--        <div class="main__banner-underline"></div>--}}
    </section>

    <section class="main__content fx-col flex-center">
        <div class="main__content-grid">
            @foreach($menus as $menu)
                @if ($menu->background_type === 'gradient')
                    <a href="{{$menu->link}}">
                        <div class="main__content-item border-rds" style="background: var(--home-item-graient)">
                            <span class="main__content-item_title f-s-30 f-600">@lang('home.menu.' . $menu->title )</span>
                        </div>
                    </a>
                @elseif ($menu->background_type === 'image')
                    <a href="{{$menu->link}}">
                        <div class="main__content-item border-rds"
                             style="background-image: url({{$menu->getFirstMediaUrl()}});">
                            <span class="main__content-item_title f-s-30 f-600">@lang('home.menu.' . $menu->title )</span>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </section>
@endsection
