@extends('layouts.app')

@section('title', 'Sign Up for an Account')

@section('content')
    <div class="container register">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
{{--                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                                <div style="margin: 0 auto" class="col-md-7 col-sm-12">
                                    <input placeholder="П.І.Б" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div style="margin: 0 auto" class="col-md-7  col-sm-12">
                                    <input placeholder="Електронна пошта" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">


                                <div style="margin: 0 auto" class="col-md-7  col-sm-12">
                                    <input placeholder="Пароль" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <div style="margin: 0 auto" class="col-md-7 col-sm-12">
                                    <input placeholder="Повторіть пароль" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="register__button col-md-6 offset-md-4">
                                    <button style="margin: 0" class="register__save more" type="submit" href="{{ route('news.index') }}">{{ __('Register') }}
                                        <span class="more__icon">
                                            <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
