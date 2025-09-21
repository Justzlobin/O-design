@php use App\Enums\ProjectType; @endphp
@extends('app')

@section('seo')
    <title>{{$seo->meta_title}}</title>
    <meta name="robots" content="index, follow">

    <meta name="description" content="{{$seo->meta_description}}">
    <meta name="keywords" content="{{$seo->meta_keywords}}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{$seo->meta_title}}">
    <meta property="og:description" content="{{$seo->meta_description}}">
    <meta property="og:image" content="{{$seo->getFirstMediaUrl()}}">
    <meta property="og:type" content="website"/>

    <meta name="twitter:title" content="{{$seo->meta_title}}">
    <meta name="twitter:description" content="{{$seo->meta_description}}">
    <meta name="twitter:image" content="{{$seo->getFirstMediaUrl()}}">
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
    <div class="projects__content fx-col">
        <div class="projects__choose  f-s-20">
            <button class="projects__choose--btn  cursor-pointer _selected" id="{{ProjectType::All->value}}">
                @lang('projects.' . ProjectType::All->value)
            </button>
            <button class="projects__choose--btn  cursor-pointer" id="{{ProjectType::Commercial->value}}">
                @lang('projects.' . ProjectType::Commercial->value)
            </button>
            <button class="projects__choose--btn  cursor-pointer" id="{{ProjectType::Privat->value}}">
                @lang('projects.' . ProjectType::Privat->value)
            </button>
        </div>
        <div class="projects__grid flex-center">
            @foreach($projects as $project)
                    <a href="{{route('project', $project)}}" class="projects__grid-item fx-col flex-center {{$project->type}}"
                         style="background-image: url({{$project->getFirstMediaUrl('project-images', 'list_webp')}})">
                        <span class="projects__grid-item_title">{{$project->title}}</span>
                    </a>
            @endforeach
        </div>
    </div>
@endsection
