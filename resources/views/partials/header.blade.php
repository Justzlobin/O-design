@php use Illuminate\Support\Str;use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
 $instagramIcon = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M16.5 7.5v.01" /></svg>';

 @endphp
<header id="header" class="fx-col">
    <div class="header__slogan fx-row txt-col-white f-300 f-s-16">{{$generalSettings->slogan}}</div>

    <div class="header__content fx-row">
        <div class="header__content-logo_burger fx-row">
            <div class="mobile__menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <a href="{{route('home')}}">
                <div class="header__content-logo f-s-30 f-400">{{$generalSettings->site_name}}</div>
            </a>
        </div>
        <div class="header__socials fx-row f-s-32">
            @foreach($socials as $social)
                <a class="header__socials-item" href="{{$social->url}}" title="{{$social->title}}" target="_blank">
                    <i class="{{$social->icon}}"></i>
                </a>
            @endforeach
{{--            @php--}}
{{--                $locales  = array_keys(LaravelLocalization::getSupportedLocales());--}}
{{--                $currentLocale = LaravelLocalization::getCurrentLocale();--}}
{{--                $altLocale = $locales[0] === $currentLocale ? $locales[1] : $locales[0]--}}
{{--            @endphp--}}

{{--            <a class="local-switch cursor-pointer f-400 f-s-30"--}}
{{--               hreflang="{{$altLocale}}"--}}
{{--               href="{{LaravelLocalization::getLocalizedUrl($altLocale)}}">--}}
{{--                {{Str::upper(LaravelLocalization::getCurrentLocale())}}--}}
{{--            </a>--}}

            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                    <input type="checkbox" id="checkbox"/>
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
                            <a href="{{route($menu->title)}}" title="{{$menu->title}}">
                                @lang('home.menu.' . $menu->title)
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="header__socials _mobile fx-row f-s-32">
                    @foreach($socials as $social)
                        <a class="header__socials-item" href="{{$social->url}}" title="{{$social->title}}"
                           target="_blank">
                            <i class="{{$social->icon}}"></i>
                        </a>
                    @endforeach
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox"/>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
