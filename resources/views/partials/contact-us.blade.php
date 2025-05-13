<div id="_contact_us" class="">
    <div class="_contact_us__title ">@lang('contact-us.form.title')</div>
    <form class="border-rds" id="_contact_us_form"
          action="{{ route('contact') }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        <div class="_contact_us_input_wrap">
            <input class="_contact_us_input f-s-16 f-400" type="text" name="name"
                   value="{{ old('name') }}"
                   placeholder="@lang('contact-us.form.name_placeholder')"
                   pattern=".*\S.*"
                   required
            >
        </div>

        <div class="_contact_us_input_wrap">
            <input class="_contact_us_input _tel f-s-16 f-400" type="tel"
                   name="phone" id="_form_tel" autocomplete="tel" value="{{ old('phone') }}"
                   placeholder="@lang('contact-us.form.phone_placeholder')" required>
        </div>

        <div class="_contact_us_input_wrap  @error('e-mail') _invalid @enderror">
            <input class="_contact_us_input f-s-16 f-400" data-phonemask-iso="ua" type="text" name="e-mail"
                   id="_form_mail" value="{{ old('e-mail') }}"
                   placeholder="@lang('contact-us.form.email_placeholder')">
        </div>


        <div class="_contact_us_input_wrap comment">
            <textarea class="_contact_us_input f-s-16 f-400" type="text" name="comment"
                      placeholder="@lang('contact-us.form.comment_placeholder')"></textarea>
        </div>

        <input id="_form_plan_id" type="hidden" name="plan_id" readonly>

        <div id="_selected_plan">
            <span class="f-s-16 f-400">@lang('contact-us.form.selected_plan')</span>
            <span class="f-s-20 f-600" id="_selected_plan_title"></span>
        </div>

        <button id="_form_btn_submit" type="submit" class="fx-row flex-center">
            <span class="f-s-20 f-500">@lang('contact-us.form.btn')</span>
        </button>
    </form>
</div>
