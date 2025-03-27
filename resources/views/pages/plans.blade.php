@extends('app')

@section('content')
    <div class="plans__content fx-col flex-center">
        <div class="plans__content-list flex-center">
            @foreach($plans as $plan)
                <div class="plans__content-item fx-col">
                    <div class="plan__header fx-col flex-center">
                        <div class="plan__header-title fx-row flex-center">{{$plan->title}}</div>
                        <div class="plan__header-desc">{{$plan->desc}}</div>
                    </div>
                    <div class="plan__list_services fx-col">
                        @foreach($plan->services as $service)
                            <div class="plan__service fx-row">
                                {{$service->title}}
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                         viewBox="0 0 120 120">
                                        <polygon
                                            points="47.163,111.17 1.195,65.201 11.801,54.595 46.437,89.23 108.108,19 119.392,28.882"
                                            opacity=".35"></polygon>
                                        <polygon fill="#44bf00"
                                                 points="47.163,106.17 1.195,60.201 11.801,49.595 46.437,84.23 108.108,14 119.392,23.882"></polygon>
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="plan__price fx-row flex-center">{{$plan->price}}  $/h</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
