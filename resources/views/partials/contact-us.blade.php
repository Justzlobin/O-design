<div id="_contact_us" class="">
    <div class="_contact_us__title ">@lang('contact-us.form.title')</div>
    <form class="border-rds" id="_contact_us_form"
          action="{{ route('contact') }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        <div class="_contact_us_input_wrap">
{{--            @error('name')--}}
{{--                <div class="_contact_us_error">{{ $message }}</div>--}}
{{--            @enderror--}}
            <input class="_contact_us_input" type="text" name="name"
                   value="{{ old('name') }}"
                   placeholder="@error('name') {{ $message }} @else @lang('contact-us.form.name_placeholder') @enderror"
                   pattern=".*\S.*"
                   required>
        </div>

        <div class="_contact_us_input_wrap">
{{--            @error('phone')--}}
{{--                <div class="_contact_us_error">{{ $message }}</div>--}}
{{--            @enderror--}}
            <input class="_contact_us_input _tel" type="tel"
                   name="phone" id="_form_tel" autocomplete="tel" value="{{ old('phone') }}"
                   placeholder="@error('phone') {{ $message }} @else @lang('contact-us.form.phone_placeholder') @enderror" required>
        </div>

        <div class="_contact_us_input_wrap  @error('e-mail') _invalid @enderror">
{{--            @error('e-mail')--}}
{{--                <div class="_contact_us_error">{{ $message }}</div>--}}
{{--            @enderror--}}
            <input class="_contact_us_input " data-phonemask-iso="ua" type="text" name="e-mail"
                   id="_form_mail" value="{{ old('e-mail') }}"
                   placeholder="@error('e-mail') {{ $message }} @else @lang('contact-us.form.email_placeholder') @enderror">
        </div>


        <div class="_contact_us_input_wrap comment">
{{--            @error('comment')--}}
{{--                <div class="_contact_us_error">{{ $message }}</div>--}}
{{--            @enderror--}}
            <textarea class="_contact_us_input " type="text" name="comment"
                      placeholder="@error('comment') {{ $message }} @else @lang('contact-us.form.comment_placeholder') @enderror"></textarea>
        </div>

        <button id="_form_btn_submit" type="submit" class="fx-row flex-center">
            <span class="f-s-20 f-500">@lang('contact-us.form.btn')</span>
        </button>
    </form>
</div>
