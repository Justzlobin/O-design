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
    <div id="faq__content">
        <div class="faq__content-grid">
            @foreach($faq_s as $faq)
                <div class="faq__content-item fx-col" data-faq_id="{{$faq->id}}">
                    <div class="faq__content-item_question">{{$faq->question}}</div>
                    <div class="faq__content-item_answer fx-row">{{$faq->answer}}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
