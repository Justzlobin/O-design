@php use App\Enums\ProjectType; @endphp
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
    <div class="projects__content fx-col">

        <div class="projects__choose  f-s-20">
            <button class="projects__choose--btn  cursor-pointer _selected" id="all">
                Усі
            </button>
            <button class="projects__choose--btn  cursor-pointer" id="{{ProjectType::Commercial}}">
                Комерційні
            </button>
            <button class="projects__choose--btn  cursor-pointer" id="{{ProjectType::Privat}}">
                Приватні
            </button>
        </div>
        <div class="projects__grid flex-center">
            @foreach($projects as $project)
                    <a href="{{route('project', $project)}}" class="projects__grid-item fx-col flex-center {{$project->type}}"
                         style="background-image: url({{$project->getFirstMediaUrl('project-images', 'gallery_big')}})">
                        <span class="projects__grid-item_title">{{$project->title}}</span>
                    </a>
            @endforeach
        </div>
    </div>
@endsection
