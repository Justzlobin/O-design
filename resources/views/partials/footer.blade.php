@php use Illuminate\Support\Str; @endphp
<footer id="footer">
    <div class="footer__content fx-row">
        <div class="footer__content-info fx-col flex-center">
            <a class="footer__info--logo fx-row f-s-30 f-500" href="{{route('home')}}">{{Str::upper($generalSettings->site_name)}}</a>
            <div class="footer__info--contacts  fx-col">
                <p class="f-300 f-s-16">Tel: {!! $generalSettings->tel !!}</p>
                <p class="f-300 f-s-16">E-mail: {!! $generalSettings->email !!}</p>
            </div>
        </div>
        <div class="footer__content-map fx-row flex-center">
            <ul class="footer__content-map_list">
                <li class="_footer__menu_item fx-row flex-center">
                    <a href="{{route('home')}}" title="home">
                        {{ \Illuminate\Support\Str::ucfirst(__('home.menu.home')) }}
                    </a>
                </li>
                @foreach($menus as $menu)
                    <li class="_footer__menu_item fx-row flex-center">
                        <a class="f-s-16 f-300" href="{{$menu->link}}" title="{{$menu->title}}">
                            {{ \Illuminate\Support\Str::ucfirst(__('home.menu.' . $menu->title)) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="footer__content-contact_us">
            @include('partials.contact-us')
        </div>
    </div>
</footer>
