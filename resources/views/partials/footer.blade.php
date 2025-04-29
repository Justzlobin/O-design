@php use Illuminate\Support\Str; @endphp
<footer id="footer">
    <div class="footer__content fx-row">
        <div class="footer__content-info fx-col flex-center">
            <a class="footer__info--logo  fx-row">{{Str::upper($generalSettings->site_name)}}</a>
            <div class="footer__info--contacts  fx-col">
                <p>Tel: {!! $generalSettings->tel !!}</p>
                <p>E-mail: {!! $generalSettings->email !!}</p>
            </div>
        </div>
        <div class="footer__content-map fx-row flex-center">
            <ul class="footer__content-map_list">
                <li class="_footer__menu_item fx-row flex-center">
                    <a href="{{route('home')}}" title="home">
                        home
                    </a>
                </li>
                @foreach($menus as $menu)
                    <li class="_footer__menu_item fx-row flex-center">
                        <a href="{{$menu->link}}" title="{{$menu->title}}">
                            {{$menu->title}}
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
