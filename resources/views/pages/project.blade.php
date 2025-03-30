@extends('app')

@section('seo')
    {!! seo()->for($project) !!}
    <meta property="og:image" content="{{ $project->getFirstMediaUrl('project-images', 'gallery_small') }}">
{{--    <meta name="keywords" content="">--}}
@endsection

@section('content')
    <div class="project__content">
        <section class="project__details fx-row">
            <div class="project__details-image fx-col flex-center">
                <div class="swiper" id="_project_main_swiper">
                    <div class="swiper-wrapper">
                        @foreach($project->getMedia('project-images') as $image)
                            <div class="swiper-slide">
                                <img class="_project__img" src="{{$image->getUrl()}}"
                                     alt="{{$image->title}}" data-fancybox="gallery">
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

                <div thumbsSlider class="swiper" id="_project_thumb_swiper">
                    <div class="swiper-wrapper">
                        @foreach($project->getMedia('project-images') as $image)
                            <div class="swiper-slide">
                                <img src="{{$image->getUrl('thumb')}}"
                                     alt="{{$image->title}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="project__details-text fx-col flex-center">
                <h1 class="project__details-text_title fx-row flex-center">
                    {{$project->title}}
                </h1>
                <div class="project__details-text_desc fx-row">
                    {!! str($project->description)->sanitizeHtml() !!}
                </div>
            </div>
        </section>
        <div class="project__others-title fx-row flex-center">
            <h2>Інші проєкти</h2>
        </div>
        <section class="project__others fx-col">
            <div class="swiper" id="_project__others_swiper">
                <div class="swiper-wrapper">
                    @foreach($sameProjects as $sameProject)
                        <div class="swiper-slide project__others-item">
                            <a href="{{route('project', $sameProject)}}">
                                <img src="{{ $sameProject->getFirstMediaUrl('project-images', 'gallery_small')}}"
                                     alt="{{$sameProject->title}}">
                                <div class="project__others-item_title">{{$sameProject->title}}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
