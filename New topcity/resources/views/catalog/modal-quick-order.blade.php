<div class="modal fade" id="quick-order" tabindex="-1" role="dialog"
     aria-labelledby="ModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content form-popup__quick-order">

            <form id="quick-order_form" class="quick-order__container">
                @csrf
                <h2 class="quick-order__title js-quick-order-title">{{ __('modal.quick_order') }}</h2>
                <input type="text" placeholder="{{ __('placeholders.enter_your_name') }}" name="name">
                <span id="name_error" style="color: red;"></span>

                <input type="text" id="phone" placeholder="{{ __('placeholders.enter_phone_number') }}" name="phone">
                <span id="phone_error" style="color: red;"></span>

                <div id="quick-order_button" class="quick-order__button button_place">
                    <button class="learn-more learn-more_btn js-quick-order">
                        <div class="circle">
                            <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                        </div>
                        <p class="button-text">{{ __('modal.buy') }}</p>
                    </button>
                </div>
                <a href="#" class="quick-order_form__close" data-dismiss="modal">
                    <svg fill="#8f8f8f" width="13px" version="1.1"
                         xmlns="http://www.w3.org/2000/svg" height="13px"
                         viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink"
                         enable-background="new 0 0 64 64">
                        <path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
                    </svg>
                </a>
            </form>
        </div>
    </div>
</div>