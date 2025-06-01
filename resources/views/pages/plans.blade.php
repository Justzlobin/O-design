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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="plan__price fx-row flex-center">
                            <span>{{$plan->price}} $/h</span>
                        </div>
                        <button class="plan__btn fx-row flex-center cursor-pointer" data-id="{{$plan->id}}">
                            Замовити
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="plans__services fx-col">
            <div class="plans__services--header fx-row">
                <div class="plans__services--title">Послуга</div>
                <div class="plans__services--desc">Опис</div>
                <div class="plans__services--plans fx-col">
                    <div class="plans__services--plans_list fx-row">
                        @foreach($plans as $plan)
                            <div>{{$plan->title}}</div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="plans__services--list fx-col">
                @foreach($services as $service )
                    <div class="plans__services--row fx-row">
                        <div class="plans__services--title fx-row">{{$service->title}}</div>
                        <div class="plans__services--desc fx-row">{{$service->desc}}</div>
                        <div class="plans__services--plans fx-row">
                            @foreach($plans as $plan)
                                @if ($service->plans->contains('id', $plan->id))
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                @else
                                    <div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
