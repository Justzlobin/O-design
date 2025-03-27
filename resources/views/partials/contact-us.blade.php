<div id="_contact_us">
    <div class="_contact_us__title">don't be shy say hi</div>
    <form id="_contact_us_form"
          action="{{ route('contact') }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        <div class="_contact_us_input_wrap @error('first_name') _invalid @enderror">
            <input class="_contact_us_input" type="text" name="first_name" id="_first_name" value="{{old('first_name')}}" placeholder="First Name">
        </div>
        <div class="_contact_us_input_wrap @error('last_name') _invalid @enderror">
            <input class="_contact_us_input" type="text" name="last_name" id="_last_name" value="{{old('last_name')}}" placeholder="Last Name">
        </div>
        <div class="_contact_us_input_wrap @error('phone') _invalid @enderror">
            <input class="_contact_us_input" type="tel"
                   data-phonemask-iso="ua"
                   data-phonemask-code="+380"
                   data-phonemask-mask="+380(99) 999-99-99"
                   maxlength="14"
                   data-phonemask-without-code="(99) 999-99-99"
                   name="phone" id="_form_tel" autocomplete="tel" value="{{old('phone')}}" placeholder="Tel: 0969998877">
        </div>
        <div class="_contact_us_input_wrap  @error('e-mail') _invalid @enderror">
            <input class="_contact_us_input" data-phonemask-iso="ua"  type="text" name="e-mail" id="_form_mail" value="{{old('e-mail')}}" placeholder="E-mail">
        </div>
        <div class="_contact_us_input_wrap comment @error('comment') _invalid @enderror">
            <textarea class="_contact_us_input" type="text" name="comment" id="_form_comment" placeholder="Comment"></textarea>
        </div>

        <div class="_contact_us_upload_file">
            <input type="file" name="file" id="_file" placeholder="File" hidden>
            <button id="_file_upload_btn" class="@error('file') _invalid @enderror">Add file</button>
            <button id="_file_upload_clean_btn"><i class="fa fa-thin fa-xmark 2xl"></i></button>
        </div>

        <button id="_form_btn_submit" type="submit">
            <i class="fa fa-arrow-right"></i>
        </button>
    </form>
</div>
