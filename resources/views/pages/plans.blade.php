@extends('app')

@section('seo')
    <title>{{$seo->meta_title}}</title>
    <meta name="robots" content="noindex, nofollow">

    <meta name="description" content="{{$seo->meta_description}}">
    <meta name="keywords" content="{{$seo->meta_keywords}}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{$seo->meta_title}}">
    <meta property="og:description" content="{{$seo->meta_description}}">
    <meta property="og:image" content="{{$seo->getFirstMediaUrl()}}">

    <meta name="twitter:title" content="{{$seo->meta_title}}">
    <meta name="twitter:description" content="{{$seo->meta_description}}">
    <meta name="twitter:image" content="{{$seo->getFirstMediaUrl()}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
    <div class="plans__content fx-col">
        <div class="plans__content-list">
            @foreach($plans as $plan)
                <div class="plans__item--wrap @if ($plan->title === 'Базовий') _promotional @endif">
                    <div class="plans__content-item fx-col">
                        <div class="plan__header fx-col flex-center">
                            <div class="plan__header-title fx-row flex-center">{{$plan->title}}</div>
                            <div class="plan__header-desc">{{$plan->desc}}</div>
                        </div>
                        <div class="plan__list_services fx-col">
                            @foreach($plan->services as $service)
                                <div class="plan__service fx-row" data-desc="{{$service->desc}}">
                                    <span>{{$service->title}}</span>
                                    <span class="f-s-24">+</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="plan__price fx-row flex-center">
                            <span>{{$plan->price}} {!! $plan->type_price !!}</span>
                        </div>
                        <button class="plan__btn fx-row flex-center cursor-pointer" data-id="{{$plan->id}}">
                            Замовити
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
