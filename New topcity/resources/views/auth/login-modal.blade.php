    <div class="form-popup__enter">
        <form id="login_form" class="enter__container">
        @csrf
        <h2 class="enter__title">{{ __('modal.login') }}</h2>

        <input id="emailInput_error" class="reg_inp" type="email" placeholder="{{ __('placeholders.email') }}" name="email">
        <span id="email_error" class="error_span"  style="color: red;"></span>
            <label for="" style="position: relative; display: block">
        <input id="passwordInput_error" class="reg_inp js-password" type="password" placeholder="{{ __('placeholders.password') }}" name="password">
            <div class="input-group-addon js-s-h-pass"
                 style="position: absolute;
    top: 50%;
    right: 20px;
    transform: translate(0, -50%);">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
            </label>
        <span id="password_error" class="error_span"  style="color: red;"></span>
        <div class="register__button">
            <a class="register__link" href="#">
                {{ __('modal.register') }}
            </a>

            <a class="forgot-pass__link" href="#">
                {{ __('modal.forget_password') }}
            </a>
        </div>

        <div id="login_button" class="enter__button  button_place">
            <button class="learn-more learn-more_btn">
                <div class="circle">
                    <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                </div>
                <p class="button-text">{{ __('modal.login') }}</p>
            </button>
        </div>
        <p class="social_text">{{ __('modal.login_with_social') }}</p>
        <div class="social__button">
                <a href="{{url('/redirect','google')}}" class="social_icon_google">
                    <svg fill="#252525" version="1.1" id="Capa_1" width="27px" height="27px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <polygon points="448,224 448,160 416,160 416,224 352,224 352,256 416,256 416,320 448,320 448,256 512,256 512,224"/>
                            <path d="M160,224v64h90.528c-13.216,37.248-48.8,64-90.528,64c-52.928,0-96-43.072-96-96c0-52.928,43.072-96,96-96
                                c22.944,0,45.024,8.224,62.176,23.168l42.048-48.256C235.424,109.824,198.432,96,160,96C71.776,96,0,167.776,0,256
                                s71.776,160,160,160s160-71.776,160-160v-32H160z"/>
                    </svg>
                </a>
                <a href="{{url('/redirect','facebook')}}" class="social_icon_facebook">
                    <svg fill="252525" version="1.1" id="Layer_1" width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
                        <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064
                        c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996
                        V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545
                        C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703
                        c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"/>
                    </svg>
                </a>
        </div>
        <a href="#" class="login_form__close" data-dismiss="modal">

            <svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg" height="13px" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
                <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
            </svg>

        </a>
    </form>
</div>