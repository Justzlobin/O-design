@extends('app')

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
