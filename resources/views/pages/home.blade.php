@extends('app')

@section('seo')
    <title>{{$generalSettings->site_name}}</title>
    <meta name="robots" content="noindex, nofollow">
{{--    <meta name="robots" content="index, follow">--}}

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
        <div class="banner swiper" id="_banner_swiper">
            <div class="banner swiper-wrapper">
                @foreach($banners as $banner)
                <div class="banner swiper-slide" >
                    <picture>
                            <source srcset="{{ $banner->media[0]->getUrl('original_webp') }}" type="image/webp">
                        <img src="{{ $banner->media[0]->getUrl('original_jpg') }}" alt="{{ $banner->title }}" loading="lazy">
                    </picture>
                    <div class="banner-desc-block fx-col">
                        <div class="block-blur banner-desc-block--main border-rds g-30" >
                            <div class="f-s-24 f-800" style="text-align: left; width: 100%;">{{$banner->title}}</div>
                            <div class="f-s-13 f-300 l-n-24">{!! $banner->description !!}</div>
                            <div class="fx-row f-s-13" style="justify-content: space-around; align-items: center; width: 100%;">
                                <div class="fx-row g-5 flex-center">
                                    <x-heroicon-o-map-pin style="width: 20px; height: 20px;"/>
                                    <span>{{ $banner->location }}</span>
                                </div>
                                <div class="fx-row g-5 flex-center">
                                    <x-heroicon-o-calendar style="width: 20px; height: 20px;"/>
                                    <span>{{ $banner->date?->format('Y') }}</span>
                                </div>
                                <div class="fx-row g-5 flex-center">
                                    <x-heroicon-o-cube-transparent style="width: 20px; height: 20px;"/>
                                    <span>{{ $banner->area }}</span>
                                    <span>m²</span>
                                </div>
                            </div>
                        </div>
                        <div class="main__banner-buttons fx-row">
                            <button  class="_main__banner_contact_us_btn f-300 f-s-13">@lang('home.banner_btn')</button>
                        </div>
                        <div class="fx-row block-blur border-rds" style="justify-content: space-around; align-items: center; width: 100%;">
                            <div class="fx-row g-5 flex-center">
                                <x-heroicon-o-phone style="width: 20px; height: 20px;"/>
                                <a class="f-s-13" target="_blank" href="Tel: {{$generalSettings->tel}}">{{$generalSettings->tel}}</a>
                            </div>
                            <div class="fx-row g-5 flex-center">
                                <x-heroicon-o-chat-bubble-oval-left-ellipsis style="width: 20px; height: 20px;"/>
                                <a class="f-s-13" target="_blank" href="{{$telegramSocial?->url ?? ''}}">{{ basename($telegramSocial?->url ?? '')}}</a>
                            </div>
                        </div>
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
                    <div class="main__content-item" style="background-image: url({{$menu->media[0]->getUrl('menu_jpg')}});">
                        <span class="main__content-item_title f-s-30 f-500">@lang('home.menu.' . $menu->title )</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
