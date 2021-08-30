@extends('layouts.app')
@section('title', __('thank-you.thank_you_for_your_purchase'))
@section('content')
    <div class="thank">
        <h1 class="thank__headline">{{ __('thank-you.thank_you_for_your_purchase') }}</h1>
        <p class="thank__text">{{ __('thank-you.check_your_mail') }}</p>
        <p>{{ __('thank-you.have_questions') }} <a
                    href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale() . '/'.'#contact') }}">{{ __('thank-you.contact_us') }}</a>
        </p>
        @if(isset($order_id))
            <p><a href="{{ route('checkout.check',$order_id) }}" target="_blank">{{ __('thank-you.open_check') }}</a></p>
        @endif
        <div id="login_button" class="basket__button button_place">
            <a href="{{ route('landing-page') }}" class="learn-more learn-more_btn js-gear-change js-gear-cart-button">
                <div class="circle">
                    <img src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                </div>
                <p class="button-text">{{ __('thank-you.home') }}</p>
            </a>

        </div>
    </div>
@endsection