@extends('app')


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
                <a id="_main__banner_projects_btn" href="{{route('projects')}}">view
                    projects
                </a>
                <button id="_main__banner_contact_us_btn">contact us</button>
            </div>
        </div>
        <div class="main__banner-underline"></div>
    </section>

    <section class="main__content fx-col flex-center">
        <div class="main__content-grid">
            @foreach($menus as $menu)
                @if ($menu->background_type === 'gradient')
                    <a href="{{$menu->link}}">
                        <div class="main__content-item" style="background: {{$generalSettings->menu_gradient}}">
                            <span class="main__content-item_title">{{$menu->title}}</span>
                        </div>
                    </a>
                @elseif ($menu->background_type === 'image')
                    <a href="{{$menu->link}}">
                        <div class="main__content-item"
                             style="background-image: url({{$menu->getFirstMediaUrl()}}); ">
                            <span class="main__content-item_title">{{$menu->title}}</span>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </section>
@endsection
