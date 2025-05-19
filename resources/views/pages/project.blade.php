@extends('app')

@section('seo')
    {!! seo()->for($project) !!}
@endsection

@section('content')
    <div class="project__content fx-col">
        <section class="project__details fx-row">
            <div class="project__details-image fx-col flex-center">
                <div class="swiper" id="_project_main_swiper">
                    <div class="swiper-wrapper">
                        @foreach($project->getMedia('project-images') as $image)
                            <div class="swiper-slide">
                                <picture>
                                    <source srcset="{{$image->getUrl('original_webp')}}" type="image/webp">
                                    <img class="_project__img" src="{{$image->getUrl('original_jpg')}}"
                                         alt="{{$image->title}}" data-fancybox="gallery" loading="lazy">
                                </picture>
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
                                <picture>
                                    <source srcset="{{$image->getUrl('thumb_webp')}}" type="image/webp">
                                    <img src="{{$image->getUrl('thumb_jpg')}}" alt="{{$image->title}}">
                                </picture>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="project__details-text fx-col flex-center">
                <h1 class="project__details-text_title fx-row flex-center">
                    {{$project->title}}
                </h1>
                <div class="project__details-text_desc">
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
                                <picture>
                                    <source
                                        srcset="{{ $sameProject->getFirstMediaUrl('project-images', 'thumb_big_webp') }}"
                                        type="image/webp">
                                    <img src="{{ $sameProject->getFirstMediaUrl('project-images', 'thumb_big_jpg')}}"
                                         alt="{{$sameProject->title}}">
                                </picture>
                                <div class="project__others-item_title">{{$sameProject->title}}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
