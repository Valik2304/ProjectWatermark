@extends('user-cabinet.index')
@section('user-cabinet')

    {{--@if($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif--}}


    <div class="profile">
        @if(session('success'))
            <div class="row">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close_alert_success" data-dismiss="alert" aria-label="Close">
                        <a href="#" data-dismiss="modal" class="login_form__close"><svg fill="#8f8f8f" width="13px" version="1.1" xmlns="http://www.w3.org/2000/svg" height="13px" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64"><path d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"></path></svg></a>
                            <!-- <span aria-hidden="true">X</span> -->
                        </button>
                        {{ session()->get('success') }}
                    </div>
            </div>
        @endif
        <h2 class="profile__title">{{ __('user_cabinet.profile') }}</h2>
        <form action="{{ route('users.update') }}" method="POST">
            @method('patch')
            @csrf
            <div class="profile-form__name row">
                <div class="col-lg-4 col-md-12">
                    <label for="name">{{ __('placeholders.full_name') }}<span class="name__star">*</span></label>
                </div>
                <div class="col-lg-8 col-md-12">
                    <input  class="@if ($errors->has('name')) error_input @else success_input @endif change_border " id="name" type="text" name="name" value="{{ old('name', $user->name) }}"     placeholder="{{ __('placeholders.full_name') }}" required>
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif

                </div>
            </div>

            <div class="profile-form__phone row">
                <div class="col-lg-4 col-md-12">
                    <label for="phone">{{ __('placeholders.phone') }}<span class="name__star">*</span></label>
                </div>
                <div class="col-lg-8 col-md-12">
                    <input  class="@if ($errors->has('phone')) error_input @else success_input @endif change_border " type="text" id="phone" name="phone" value="{{ old('phone',$user->phone) }}" placeholder="{{ __('placeholders.phone') }}" required>
                    @if ($errors->has('phone'))
                        @foreach ($errors->get('phone') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="button_place">
                <button type="button" id="js-password-toggle" class="button js-password-toggle learn-more learn-more_btn">
                    <div class="circle">
                        <img class="lazyImage loaded" data-src="/img/svg/right-arrow.svg" alt="save button" src="/img/svg/right-arrow.svg" data-was-processed="true">
                    </div>
                    <p class="button-text">{{ __('user_cabinet.change_password') }}</p>
                </button>
            </div>


            <div class="password__wrap">

                <div class="profile-form__password row">
                    <div class="col-lg-4 col-md-12">
                        <label for="password">{{ __('placeholders.password') }}</label>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <label for="" style="position: relative">
                            <input class="js-password @if ($errors->has('password')) error_input @else success_input @endif change_border " id="password" type="password" name="password" placeholder="{{ __('placeholders.password') }}">
                            <div class="input-group-addon js-s-h-pass"
                                 style="position: absolute;
    top: 50%;
    right: 20px;
    transform: translate(0, -50%);">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </div>

                        </label>
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $message)
                                <span class="display error_span">* {{ $message }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="profile-form__newPassword row">
                    <div class="col-lg-4 col-md-12">
                        <label for="password_confirmation">{{ __('placeholders.password_confirmation') }}</label>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <label for="" style="position: relative">
                            <input  class="js-password @if ($errors->has('password_confirmation')) error_input @else success_input @endif change_border " id="password_confirmation" type="password" name="password_confirmation" placeholder="{{ __('placeholders.password_confirmation') }}">
                            <div class="input-group-addon js-s-h-pass"
                                 style="position: absolute;
    top: 50%;
    right: 20px;
    transform: translate(0, -50%);">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </div>

                        </label>
                        @if ($errors->has('password_confirmation'))
                            @foreach ($errors->get('password_confirmation') as $message)
                                <span class="display error_span">* {{ $message }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>





            <div class="user-profile__button">
                <div class="button_place">
                    <button type="submit" class="learn-more learn-more_btn">
                        <div class="circle">
                            <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                        </div>
                        <p class="button-text">{{ __('user_cabinet.save') }}</p>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection