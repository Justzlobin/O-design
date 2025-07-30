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
    <div id="faq__content">
        <div class="faq__content-grid">
            @foreach($faq_s as $faq)
                <div class="faq__content-item fx-col" data-faq_id="{{$faq->id}}">
                    <div class="faq__content-item_answer f-300 f-s-14 l-n-24">{{$faq->answer}}</div>
                    <div class="faq__content-item_question f-700 f-s-22 l-n-24">{{$faq->question}}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
