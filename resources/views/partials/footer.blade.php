<div id="footer">
    <div class="footer__content fx-row">
        <div class="footer__content-info"></div>
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
</div>
