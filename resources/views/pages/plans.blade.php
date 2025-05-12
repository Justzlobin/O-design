@extends('app')

@section('seo')
    <title>{{$seo->meta_title}}</title>
    <meta name="description" content="{{$seo->meta_description}}">
    <meta name="keywords" content="{{$seo->meta_keywords}}">
    <meta property="og:title" content="{{$seo->meta_title}}">
    <meta property="og:description" content="{{$seo->meta_description}}">
    <meta property="og:image">
@endsection

@section('content')
    <div class="plans__content fx-col">
        <div class="plans__content-list">
            @foreach($plans as $plan)
                <div class="plans__item--wrap @if ($plan->title === 'Базовий') _promotional @endif">
                    <div class="plans__item--title fx-row flex-center">
                        @if ($plan->title === 'Базовий')
                            <span>PROMO</span>
                        @endif
                    </div>
                    <div class="plans__content-item fx-col ">
                        <div class="plan__header fx-col flex-center">
                            <div class="plan__header-title fx-row flex-center">{{$plan->title}}</div>
                            <div class="plan__header-desc">{{$plan->desc}}</div>
                        </div>
                        <div class="plan__list_services fx-col">
                            @foreach($plan->services as $service)

                                <div class="plan__service fx-row ">
                                    {{$service->title}}
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                             viewBox="0 0 120 120">
                                            <polygon
                                                points="47.163,111.17 1.195,65.201 11.801,54.595 46.437,89.23 108.108,19 119.392,28.882"
                                                opacity=".35"></polygon>
                                            <polygon fill="var(--color-text-1)"
                                                     points="47.163,106.17 1.195,60.201 11.801,49.595 46.437,84.23 108.108,14 119.392,23.882"></polygon>
                                        </svg>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div class="plan__price fx-row flex-center">{{$plan->price}} $/h</div>
                        <button class="plan__btn fx-row flex-center cursor-pointer">Замовити</button>
                    </div>
                </div>
            @endforeach
        </div>

        <style>
            .plans__services {
                width: 100%;
                background: var(--color-3);
            }

            .plans__services--header,
            .plans__services--list {
                width: 100%;
            }

            .plans__services--header,
            .plans__services--row {
                padding: 10px;
            }

            .plans__services--row:nth-child(2n-1) {
                background: var(--color-2);
            }


            .plans__services--title {
                width: 20%;
                align-items: center;
                padding: 0 10px;
            }

            .plans__services--desc {
                width: 40%;
                align-items: center;
                padding: 0 10px;
            }

            .plans__services--plans  {
                width: 40%;
                align-items: center;
                padding: 0 10px;
            }

            .plans__services--plans div, .plans__services--plans_list  div {
                flex: 1;
            }

            .plans__services--plans_list {
                justify-content: space-between;
                width: 100%;
            }

        </style>

        <div class="plans__services fx-col">
            <div class="plans__services--header fx-row">
                <div class="plans__services--title">Title</div>
                <div class="plans__services--desc">Desc</div>
                <div class="plans__services--plans fx-col">
                    <div class="plans__services--plans_title">Plans</div>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                             viewBox="0 0 120 120">
                                            <polygon
                                                points="47.163,111.17 1.195,65.201 11.801,54.595 46.437,89.23 108.108,19 119.392,28.882"
                                                opacity=".35"></polygon>
                                            <polygon fill="var(--color-text-1)"
                                                     points="47.163,106.17 1.195,60.201 11.801,49.595 46.437,84.23 108.108,14 119.392,23.882"></polygon>
                                        </svg>
                                        </div>
                                    @else
                                        <div></div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
