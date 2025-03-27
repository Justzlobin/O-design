@php use Illuminate\Support\Facades\Storage; @endphp
@extends('app')

@section('content')

    <div id="_about_us__content" class="fx-col">
        <section class="title-section fx-col">
            <div class="title-section__content fx-col">
                <div class="decorate-line _left"></div>
                <h1 class="title-section__content-title">ODESIGN<br>INTERIOR</h1>
                <h2 class="_title__body_center-subtitle">DESIGN YOUR FUTURE</h2>
                <div class="decorate-line _right"></div>
            </div>
            <div class="title-section__photo" style="background-image: url({{Storage::url('oleg.png')}})"></div>
        </section>

        <div class="separate-line"></div>

        <section class="philosophy-section fx-col">
            <div class="philosophy-section__top fx-row">
                <h2 class="_philosophy__top_text">@lang('about-us.philosophy_title')</h2>
                <div class="decorate-line"></div>
            </div>
            <div class="philosophy-section__center fx-row"
                 style="background-image: url({{Storage::url('phil_1.jpg')}})"></div>
            <div class="philosophy-section__bottom fx-row">
                <p class="philosophy-section__bottom-text">@lang('about-us.philosophy_subtitle')</p>
                <div class="decorate-line"></div>
            </div>
        </section>

        <div class="separate-line"></div>

        <section class="rules-section fx-row">
            <div class="rules-section__img" style="background-image: url({{Storage::url('rules_1.jpg')}})"></div>
            <div class="rules-section__text fx-col">
                <h2 class="rules-section__text-title">@lang('about-us.rules_title')</h2>
                <div class="decorate-line"></div>
                <ul class="rules-section__text-list">
                    <li>@lang('about-us.rules_list_1')</li>
                    <li>@lang('about-us.rules_list_2')</li>
                    <li>@lang('about-us.rules_list_3')</li>
                    <li>@lang('about-us.rules_list_4')</li>
                </ul>
            </div>
        </section>

        <div class="separate-line"></div>

        <section class="why-section fx-row">
            <div class="why-section__left fx-col">
                <h2 class="why-section__left-title">@lang('about-us.why_title')</h2>
                <p class="why-section__left-subtitle">@lang('about-us.why_subtitle')</p>
                <ul class="why-section__left-list">
                    <li>@lang('about-us.why_list_1')</li>
                    <li>@lang('about-us.why_list_2')</li>
                    <li>@lang('about-us.why_list_3')</li>
                    <li>@lang('about-us.why_list_4')</li>
                    <li>@lang('about-us.why_list_5')</li>
                </ul>
                <div class="decorate-line"></div>
            </div>
            <div class="why-section__right" style="background-image: url({{Storage::url('why_1.jpg')}})">
                <div class="decorate-line"></div>
            </div>
        </section>

        <div class="separate-line"></div>

        <section class="how-section fx-col">
            <div class="decorate-line"></div>
            <div class="how-section__top">
                <div class="how-section__top-item fx-col">
                    <h2 class="how-section__top-item-title">@lang('about-us.why_title')</h2>
                </div>
                <div class="how-section__top-item fx-col">
                    <span class="how-section__top-item-subtitle">@lang('about-us.how_list_title_1')</span>
                    <p class="how-section__top-item-text">@lang('about-us.how_list_text_1')</p>
                </div>
                <div class="how-section__top-item fx-col">
                    <span class="how-section__top-item-subtitle">@lang('about-us.how_list_title_2')</span>
                    <p class="how-section__top-item-text">@lang('about-us.how_list_text_2')</p>
                </div>
                <div class="how-section__top-item fx-col">
                    <span class="how-section__top-item-subtitle">@lang('about-us.how_list_title_3')</span>
                    <p class="how-section__top-item-text">@lang('about-us.how_list_text_3')</p>
                </div>
                <div class="how-section__top-item fx-col">
                    <span class="how-section__top-item-subtitle">@lang('about-us.how_list_title_4')</span>
                    <p class="how-section__top-item-text">@lang('about-us.how_list_text_4')</p>
                </div>
                <div class="how-section__top-item fx-col">
                    <span class="how-section__top-item-subtitle">@lang('about-us.how_list_title_5')</span>
                    <p class="how-section__top-item-text">@lang('about-us.how_list_text_5')</p>
                </div>
            </div>
            <div class="how-section__bottom fx-row">
                <div class="decorate-line"></div>
                <div class="how-section__bottom_left_img"
                     style="background-image: url({{Storage::url('how_1.jpg')}})"></div>
                <div class="how-section__bottom_right_img" style="background-image: url({{Storage::url('how_2.jpg')}})"></div>
            </div>
        </section>

        <div class="separate-line"></div>

        <section class="expertise-section fx-row">
            <div class="expertise-section__left fx-col">
                <h2 class="expertise-section__left-title">@lang('about-us.expertise_title')</h2>
                <div class="decorate-line"></div>
                <div class="expertise-section__left-grid">
                    <div class="expertise-section__left-grid_item fx-col">
                        <span class="expertise-section__left-grid-subtitle">@lang('about-us.expertise_list_title_1')</span>
                        <p class="expertise-section__left-grid-text">@lang('about-us.expertise_list_text_1')</p>
                    </div>
                    <div class="expertise-section__left-grid_item fx-col">
                        <span class="expertise-section__left-grid-subtitle">@lang('about-us.expertise_list_title_2')</span>
                        <p class="expertise-section__left-grid-text">@lang('about-us.expertise_list_text_2')</p>
                    </div>
                    <div class="expertise-section__left-grid_item fx-col">
                        <span class="expertise-section__left-grid-subtitle">@lang('about-us.expertise_list_title_3')</span>
                        <p class="expertise-section__left-grid-text">@lang('about-us.expertise_list_text_3')</p>
                    </div>
                    <div class="expertise-section__left-grid_item fx-col">
                        <span class="expertise-section__left-grid-subtitle">@lang('about-us.expertise_list_title_4')</span>
                        <p class="expertise-section__left-grid-text">@lang('about-us.expertise_list_text_4')</p>
                    </div>
                </div>
            </div>
            <div class="expertise-section__right"
                 style="background-image: url({{Storage::url('expertise_1.jpg')}})">
                <div class="decorate-line"></div>
            </div>
        </section>
    </div>

@endsection
