@extends('app')

@section('seo')
    <title>{{$generalSettings->site_name}}</title>
{{--    <meta name="robots" content="noindex, nofollow">--}}
    <meta name="robots" content="index, follow">

    <meta name="description" content="{{$seo->meta_description}}">
    <meta name="keywords" content="{{$seo->meta_keywords}}">

    <meta property="og:title" content="{{$seo->meta_title}}">
    <meta property="og:description" content="{{$seo->meta_description}}">
    <meta property="og:image" content="{{$seo->getFirstMediaUrl()}}">
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>

    <meta name="twitter:title" content="{{$seo->meta_title}}">
    <meta name="twitter:description" content="{{$seo->meta_description}}">
    <meta name="twitter:image" content="{{$seo->getFirstMediaUrl()}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
    <section class="main__banner fx-col">
        <div class="banner swiper" id="_banner_swiper">
            <div class="banner swiper-wrapper">
                @foreach($banners as $banner)
                    <div class="banner swiper-slide">
                        <picture>
                            <source srcset="{{ $banner->media[0]->getUrl('tablet_webp') }}" type="image/webp" media="(max-width: 1024px)">
                            <source srcset="{{ $banner->media[0]->getUrl('desktop_webp') }}" type="image/webp" media="(min-width: 1025px)">
                            <img src="{{ $banner->media[0]->getUrl('desktop_jpg') }}" alt="{{ $banner->title }}"
                                 @if ($loop->first) fetchpriority="high" @else loading="lazy" @endif>
                        </picture>
                        <div class="banner-desc-block fx-col">
                            <div class="block-blur banner-desc-block--main border-rds g-30" style="width: 100%;">
                                <div class="f-s-24 f-500"
                                     style="text-align: left; width: 100%;">{{$banner->title}}</div>

                                @if ($banner->description)
                                    <div class="f-s-13 f-300 l-n-24 text-with-links" >{!! $banner->description !!}</div>
                                @endif
                                @if ($banner->location || $banner->date || $banner->area)
                                    <div class="fx-row f-s-13"
                                         style="justify-content: space-between; align-items: center; width: 100%;">
                                        @if ($banner->location)
                                            <div class="fx-row g-5 flex-center">
                                                <x-heroicon-o-map-pin style="width: 20px; height: 20px;"/>
                                                <span>{{ $banner->location }}</span>
                                            </div>
                                        @endif
                                        @if ($banner->date)
                                            <div class="fx-row g-5 flex-center">
                                                <x-heroicon-o-calendar style="width: 20px; height: 20px;"/>
                                                <span>{{ $banner->date?->format('Y') }}</span>
                                            </div>
                                        @endif
                                        @if ($banner->area)
                                            <div class="fx-row g-5 flex-center">
                                                <x-heroicon-o-cube-transparent style="width: 20px; height: 20px;"/>
                                                <span>{{ $banner->area }}</span>
                                                <span>m²</span>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            @if ($banner->btn_text && $banner->btn_href)
                                <div class="main__banner-buttons fx-row text-with-links">
                                    <a href="{!!  $banner->btn_href !!}"
                                        class="_main__banner_contact_us_btn f-500 f-s-16">
                                        {{$banner->btn_text}}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="autoplay-progress">
                <div class="progress-bar"></div>
                <span></span>
            </div>
        </div>
    </section>

    <section class="main__content fx-col flex-center">
        <div class="main__content-grid">
            @foreach($menus as $menu)
                <a href="{{$menu->link}}">
                    <div class="main__content-item"
                         style="background-image: url({{$menu->media[0]->getUrl('menu_jpg')}});">
                        <span class="main__content-item_title f-s-30 f-500">@lang('home.menu.' . $menu->title )</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
