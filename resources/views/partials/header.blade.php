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
                <div class="header__content-logo f-s-20 f-400">{{$generalSettings->site_name}}</div>
            </a>
        </div>
        <div class="header__socials fx-row f-s-20">
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
                <label class="theme">
                    <input class="input" type="checkbox">
                    <svg width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" fill="none" class="icon icon-sun"><circle r="5" cy="12" cx="12"></circle><line y2="3" y1="1" x2="12" x1="12"></line><line y2="23" y1="21" x2="12" x1="12"></line><line y2="5.64" y1="4.22" x2="5.64" x1="4.22"></line><line y2="19.78" y1="18.36" x2="19.78" x1="18.36"></line><line y2="12" y1="12" x2="3" x1="1"></line><line y2="12" y1="12" x2="23" x1="21"></line><line y2="18.36" y1="19.78" x2="5.64" x1="4.22"></line><line y2="4.22" y1="5.64" x2="19.78" x1="18.36"></line></svg>
                    <svg width="20" height="20" viewBox="0 0 24 24" class="icon icon-moon"><path d="m12.3 4.9c.4-.2.6-.7.5-1.1s-.6-.8-1.1-.8c-4.9.1-8.7 4.1-8.7 9 0 5 4 9 9 9 3.8 0 7.1-2.4 8.4-5.9.2-.4 0-.9-.4-1.2s-.9-.2-1.2.1c-1 .9-2.3 1.4-3.7 1.4-3.1 0-5.7-2.5-5.7-5.7 0-1.9 1.1-3.8 2.9-4.8zm2.8 12.5c.5 0 1 0 1.4-.1-1.2 1.1-2.8 1.7-4.5 1.7-3.9 0-7-3.1-7-7 0-2.5 1.4-4.8 3.5-6-.7 1.1-1 2.4-1 3.8-.1 4.2 3.4 7.6 7.6 7.6z"></path></svg>
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
                <div class="header__socials _mobile fx-row f-s-20">
                    @foreach($socials as $social)
                        <a class="header__socials-item" href="{{$social->url}}" title="{{$social->title}}"
                           target="_blank">
                            <i class="{{$social->icon}}"></i>
                        </a>
                    @endforeach
                    <div class="theme-switch-wrapper">
                        <label class="theme">
                            <input class="input" type="checkbox">
                            <svg width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor"  fill="none" class="icon icon-sun"><circle r="5" cy="12" cx="12"></circle><line y2="3" y1="1" x2="12" x1="12"></line><line y2="23" y1="21" x2="12" x1="12"></line><line y2="5.64" y1="4.22" x2="5.64" x1="4.22"></line><line y2="19.78" y1="18.36" x2="19.78" x1="18.36"></line><line y2="12" y1="12" x2="3" x1="1"></line><line y2="12" y1="12" x2="23" x1="21"></line><line y2="18.36" y1="19.78" x2="5.64" x1="4.22"></line><line y2="4.22" y1="5.64" x2="19.78" x1="18.36"></line></svg>
                            <svg width="30" height="30" viewBox="0 0 24 24" class="icon icon-moon"><path d="m12.3 4.9c.4-.2.6-.7.5-1.1s-.6-.8-1.1-.8c-4.9.1-8.7 4.1-8.7 9 0 5 4 9 9 9 3.8 0 7.1-2.4 8.4-5.9.2-.4 0-.9-.4-1.2s-.9-.2-1.2.1c-1 .9-2.3 1.4-3.7 1.4-3.1 0-5.7-2.5-5.7-5.7 0-1.9 1.1-3.8 2.9-4.8zm2.8 12.5c.5 0 1 0 1.4-.1-1.2 1.1-2.8 1.7-4.5 1.7-3.9 0-7-3.1-7-7 0-2.5 1.4-4.8 3.5-6-.7 1.1-1 2.4-1 3.8-.1 4.2 3.4 7.6 7.6 7.6z"></path></svg>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
