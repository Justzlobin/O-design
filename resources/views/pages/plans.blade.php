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
                                <div class="plan__service fx-row">
                                    <span>{{$service->title}}</span>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="64" height="64" viewBox="0 0 64 64">
                                            <path d="M 12 8 C 9.791 8 8 9.791 8 12 L 8 44 C 8 46.209 9.791 48 12 48 L 44 48 C 46.209 48 48 46.209 48 44 L 48 12 C 48 9.791 46.209 8 44 8 L 12 8 z M 51 16 L 51 46 C 51 48.761 48.761 51 46 51 L 16 51 L 16 52 C 16 54.209 17.791 56 20 56 L 52 56 C 54.209 56 56 54.209 56 52 L 56 20 C 56 17.791 54.209 16 52 16 L 51 16 z M 38.960938 18 L 42 21 L 25 38 L 14 27 L 16 24 L 25 30 L 38.960938 18 z"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="plan__price fx-row flex-center">
                            <span>{{$plan->price}} $/m&sup2;</span>
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
