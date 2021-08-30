@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container login">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('modal.login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>--}}

                                <div class="col-md-7" style="margin: 0 auto;">
                                    <input placeholder="{{ __('placeholders.email') }}" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                <div class="col-md-7" style="margin: 0 auto;">
                                    <input placeholder="{{ __('placeholders.password') }}" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-7" style="margin: 0 auto; display: flex; justify-content: space-between;">
                                <div>
                                    <a  href="{{ route('register') }}" class="register__link" data-toggle="modal" data-target="#exampleModalCenter"   >
                                        {{ __('modal.register') }}
                                    </a>
                                </div>
                                <div class="register__button text-md-right">
                                    @if (Route::has('password.request'))
                                        <a class="forgot-pass__link" href="{{ route('password.request') }}" data-toggle="modal" data-target="#exampleModalCenter">
                                            {{ __('modal.forget_password') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div style="margin-left: auto; margin-right: auto;" id="login_button" class="enter__button  button_place">
                                    <button style="background-color: #ffffff" class="learn-more learn-more_btn">
                                        <div class="circle">
                                            <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                                        </div>
                                        <p class="button-text">{{ __('modal.login') }}</p>
                                    </button>
                                </div>
                            </div>



                            <p style="color: #00a3d4; text-align: center; margin-top: 20px">{{ __('modal.login_with_social') }}</p>

                            <div class="col-md-7" style="margin: 0 auto;">
                                <div class="social__button" style="display: flex;justify-content: space-between;">
                                    <a href="{{url('/redirect','google')}}" class="button btn__google">
                                        <svg style="transform: scale(1.3);" fill="#252525" version="1.1" id="Capa_1" width="27px" height="27px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                                                <polygon points="448,224 448,160 416,160 416,224 352,224 352,256 416,256 416,320 448,320 448,256 512,256 512,224"></polygon>
                                            <path d="M160,224v64h90.528c-13.216,37.248-48.8,64-90.528,64c-52.928,0-96-43.072-96-96c0-52.928,43.072-96,96-96
                                                    c22.944,0,45.024,8.224,62.176,23.168l42.048-48.256C235.424,109.824,198.432,96,160,96C71.776,96,0,167.776,0,256
                                                    s71.776,160,160,160s160-71.776,160-160v-32H160z"></path>
                                        </svg>
                                    </a>

                                    <a href="{{url('/redirect','facebook')}}" class="button btn__facebook">
                                        <svg fill="252525" version="1.1" id="Layer_1" width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
                                            <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064
                                            c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996
                                            V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545
                                            C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703
                                            c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
