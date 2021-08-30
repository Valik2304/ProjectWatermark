<div class="form-popup__registration">
    <form id="register_form" class="registration__container">
        @csrf
        <h2 class="registration__title">Реєстрація</h2>

        <input id="reg_nameInput_err" class="reg_inp" style="" type="text" placeholder="{{ __('placeholders.full_name') }}*" name="name" required>
        <span id="reg_name_err"  class="error_span"></span>
        <input id="reg_emailInput_err" class="reg_inp" type="email" placeholder="{{ __('placeholders.email') }}*" name="email" required>
        <span id="reg_email_err"  class="error_span"></span>

        <input id="reg_passwordInput_err" class="reg_inp js-password" type="password" placeholder="{{ __('placeholders.password') }}" name="password">
        <span id="reg_password_err"  class="error_span"></span>
        <div class="input-group-addon js-s-h-pass"
             style="    width: 41px;
    height: 41px;
    position: absolute;
    top: 242px;
    left: 262px;
    text-align: center;
    line-height: 41px;">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </div>

        <input type="password" placeholder="{{ __('placeholders.password_confirmation') }}" name="password_confirmation">



        <div id="register_button" class="registration__button button_place">
            <button class="learn-more learn-more_btn">
                <div class="circle">
                    <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
{{--                    <span class="icon arrow"></span>--}}
                </div>
                <p class="button-text">{{ __('modal.sign_up') }}</p>
            </button>
        </div>
        <a href="#" class="registration__close" data-dismiss="modal">

            <svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg" height="13px" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
                <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
            </svg>

        </a>
    </form>
</div>