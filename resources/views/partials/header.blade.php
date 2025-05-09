<header id="header" class="fx-col">
    <div class="header__slogan fx-row txt-col-white f-300 f-s-16">{{$generalSettings->slogan}}</div>

    <div class="header__content fx-row">
        <div class="header__content-logo_burger fx-row">
            <div class="mobile__menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <a href="/">
                <div class="header__content-logo f-s-30 f-400">{{$generalSettings->site_name}}</div>
            </a>
        </div>
        <div class="header__socials fx-row f-s-32">
            @foreach($socials as $social)
                <a class="header__socials-item" href="{{$social->url}}" title="{{$social->title}}" target="_blank">
                    <i class="{{$social->icon}}"></i>
                </a>
            @endforeach
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" />
                        <span class="slider"></span>
                    </label>
                </div>
        </div>
    </div>

    <div id="_header__menu_overlay">
        <div id="_header__menu_content">
            <div class="header__menu--modal fx-col flex-center">
            <ul class="header__menu fx-col flex-center">
                <li class="_header__menu_item f-s-20 f-500">
                    <a href="{{route('home')}}" title="home">
                        @lang('home.menu.home')
                    </a>
                </li>
                @foreach($menus as $menu)
                    <li class="_header__menu_item f-s-20 f-500">
                        <a href="{{$menu->link}}" title="{{$menu->title}}">
{{--                            {{$menu->title}}--}}
                            @lang('home.menu.' . $menu->title)
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="header__socials _mobile fx-row f-s-32">
                @foreach($socials as $social)
                    <a class="header__socials-item" href="{{$social->url}}" title="{{$social->title}}" target="_blank">
                        <i class="{{$social->icon}}"></i>
                    </a>
                @endforeach
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" />
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            </div>
        </div>
    </div>
</header>
