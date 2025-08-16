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
                <div class="header__content-logo f-s-20 f-800">{{$generalSettings->site_name}}</div>
            </a>
        </div>
        <div class="header__socials fx-row f-s-20">
            @foreach($socials as $social)
                <a class="header__socials-item" href="{{$social->url}}" title="{{$social->title}}" target="_blank">
                    <i class="{{$social->icon}}"></i>
                </a>
            @endforeach

            <div class="theme-switch-wrapper">
                <label class="theme">
                    <input class="input" type="checkbox">
                    <svg width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" fill="none" class="icon icon-sun"><circle r="5" cy="12" cx="12"></circle><line y2="3" y1="1" x2="12" x1="12"></line><line y2="23" y1="21" x2="12" x1="12"></line><line y2="5.64" y1="4.22" x2="5.64" x1="4.22"></line><line y2="19.78" y1="18.36" x2="19.78" x1="18.36"></line><line y2="12" y1="12" x2="3" x1="1"></line><line y2="12" y1="12" x2="23" x1="21"></line><line y2="18.36" y1="19.78" x2="5.64" x1="4.22"></line><line y2="4.22" y1="5.64" x2="19.78" x1="18.36"></line></svg>
                    <svg width="24" height="24" class="icon-moon icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M524.8 938.666667h-4.266667a439.893333 439.893333 0 0 1-313.173333-134.4 446.293333 446.293333 0 0 1-11.093333-597.333334 432.213333 432.213333 0 0 1 170.666666-116.906666 42.666667 42.666667 0 0 1 45.226667 9.386666 42.666667 42.666667 0 0 1 10.24 42.666667 358.4 358.4 0 0 0 82.773333 375.893333 361.386667 361.386667 0 0 0 376.746667 82.773334 42.666667 42.666667 0 0 1 54.186667 55.04A433.493333 433.493333 0 0 1 836.266667 810.666667a438.613333 438.613333 0 0 1-311.466667 128z" fill="#231F20" /></svg>                </label>
            </div>
        </div>
    </div>

    <div id="_header__menu_overlay">
        <div id="_header__menu_content">
            <div class="header__menu--modal fx-col flex-center">
                <ul class="header__menu fx-col flex-center">
                    <li class="_header__menu_item f-s-16 f-300 l-n-24">
                        <a href="{{route('home')}}" title="home">
                            @lang('home.menu.home')
                        </a>
                    </li>
                    @foreach($menus as $menu)
                        <li class="_header__menu_item f-s-16 f-300 l-n-24">
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
                </div>
            </div>
        </div>
    </div>
</header>
