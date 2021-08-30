@extends('user-cabinet.index')


@section('title',  __('breadcrumbs.targeted_address') )



@section('user-cabinet')
    <div class="delivery-address">

        <h2 class="delivery-address__title">{{ __('breadcrumbs.targeted_address') }}</h2>


        <div class="delivery-address__info info row">
            <div class="info__address col-lg-4 col-sm-12">
                <p class="address__text">{{ __('user_cabinet.targeted_addresses.delivery_addresses') }}</p>
            </div>
            <div class="col-lg-8 col-sm-12">
                @if(count($deliveryAddresses) > 0)
                    @foreach($deliveryAddresses as $deliveryAddress)
                        <div class="row info__item">
                            <div class="item__contact-person col-lg-11 col-10">
                                <a href="{{ route('delivery-address.edit',$deliveryAddress->id) }}"><p
                                            class="contact-person__text">{{ $deliveryAddress->city  . ', '.$deliveryAddress->address }}</p>
                                </a>
                            </div>
                            <form class="col-lg-1 col-2 item__close"
                                  action="{{ route('delivery-address.destroy',$deliveryAddress->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="info__times-circle">
                                    <button class="times-circle__btn">
                                        <svg fill=" #e2e5e9" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18"
                                             viewBox="0 0 18 18">
                                            <path id="error_copy_2_копия" data-name="error  copy 2 копия" class="cls-1"
                                                  d="M1336.01,282a9,9,0,1,1,9-9A9,9,0,0,1,1336.01,282Zm4.13-11.625a0.45,0.45,0,0,0,0-.612l-0.92-.919a0.441,0.441,0,0,0-.62,0l-2.6,2.6-2.6-2.6a0.441,0.441,0,0,0-.62,0l-0.91.919a0.431,0.431,0,0,0,0,.612l2.6,2.6-2.6,2.6a0.432,0.432,0,0,0,0,.613l0.91,0.919a0.442,0.442,0,0,0,.62,0l2.6-2.6,2.6,2.6a0.442,0.442,0,0,0,.62,0l0.92-.919a0.451,0.451,0,0,0,0-.613l-2.61-2.6Z"
                                                  transform="translate(-1327 -264)"/>
                                        </svg>
                                    </button>
                                </div>

                            </form>
                        </div>

                    @endforeach
                @else
                    <div class="row info__item">

                    </div>
                @endif
{{--


                @if(session('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-11 offset-md-1">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                                {{ session()->get('success') }}
                            </div>
                        </div>
                    </div>
                @endif
--}}

                @if(Route::currentRouteName() == 'delivery-address.edit')
                    <form action="{{ route('delivery-address.update',$delivery_address->id) }}" method="post">
                        @method('PATCH')
                        @else
                            <form action="{{ route('delivery-address.store') }}" method="post">
                                @endif
                                @csrf
                                <div class="delivery-address__form row">
                                    <div class="form__input-info col-12">
                                        <label for="">
                                            <input class="@if ($errors->has('city')) error_input @else success_input @endif da_change_border"
                                                   type="text" name="city" placeholder="{{ __('placeholders.city') }}"
                                                   value="{{ $delivery_address->city ?? old('city') }}" required>
                                            @if ($errors->has('city'))
                                                @foreach ($errors->get('city') as $message)
                                                    <span class="da_display error_span">* {{ $message }}</span>
                                                @endforeach
                                            @endif
                                        </label>
                                        <label for="">
                                            <input class="@if ($errors->has('address')) error_input @else success_input @endif da_change_border"
                                                   type="text" name="address"
                                                   placeholder="{{ __('placeholders.city_address') }}"
                                                   value="{{ $delivery_address->address ?? old('address') }}"
                                                   required>
                                            @if ($errors->has('address'))
                                                @foreach ($errors->get('address') as $message)
                                                    <span class="da_display error_span">* {{ $message }}</span>
                                                @endforeach
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="delivery-address__button  button_place row">
                                    <button class="learn-more learn-more_btn" type="submit">
                                        <div class="circle">
                                            <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                                        </div>
                                        <p class="button-text">{{ __('user_cabinet.save') }}</p>
                                    </button>
                                </div>
                            </form>
                    </form>
            </div>
        </div>
    </div>

@endsection