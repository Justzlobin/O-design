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
    <div class="projects__content fx-col flex-center">
        @if (!$type)
            <div class="projects__choose fx-row">
                @foreach($projects as $project)
                    @switch($project->type)
                        @case(ProjectType::Privat->value)
                            <a class="projects__choose-btn" style="background-image: url({{$project->getFirstMediaUrl('project-images', 'gallery_big')}})"
                               href="{{route('projects', ['type' => ProjectType::Privat])}}">
                                <h2>@lang('projects.privat')</h2>
                            </a>
                            @break

                        @case(ProjectType::Commercial->value)
                            <a     class="projects__choose-btn" style="background-image: url({{$project->getFirstMediaUrl('project-images', 'gallery_big')}})"
                               href="{{route('projects', ['type' => ProjectType::Commercial])}}">
                                <h2>@lang('projects.commercial')</h2>
                            </a>
                    @endswitch
                @endforeach
            </div>
        @else
            <div class="projects__grid flex-center">
                @foreach($projects as $project)
                    <a href="{{route('project', $project)}}">
                        <div class="projects__grid-item fx-col flex-center"
                             style="background-image: url({{$project->getFirstMediaUrl('project-images', 'gallery_big')}})">
                            <span class="projects__grid-item_title">{{$project->title}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
