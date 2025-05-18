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
                        <button class="plan__btn fx-row flex-center cursor-pointer" data-id="{{$plan->id}}">Замовити
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

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
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>
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
