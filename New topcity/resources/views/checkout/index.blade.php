@extends('layouts.app')

@section('title',__('general.checkout'))

@section('content')
    <div class="container">
        {{ Breadcrumbs::render(Route::currentRouteName()) }}
        <div class="row checkout">
            <form class="checkout-form col-lg-6 col-sm-12 col-12" action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="checkout-item">
                    <h2 class="checkout__title">{{ __('general.checkout') }}</h2>
                    {{--                    @if ($errors->any())--}}
                    {{--                        {!!  implode('', $errors->all('<div style="color:red">:message</div>')) !!}--}}
                    {{--                    @endif--}}
                    <div class="checkout__step">
                        <div class="step__first">
                            <span>1</span>
                        </div>
                        <div class="step__title">
                            <span>{{ __('checkout.contacts') }}</span>
                        </div>
                    </div>
                    @guest
                        <div class="checkout__clients-filter">
                            <button type="button" class="button filter__button" data-toggle="modal"
                                    data-target="#exampleModalCenter">{{ __('checkout.i_am_registered') }}
                            </button>
                        </div>
                    @endguest


                    <div class="form-group">
                        <label for="name" class="">{{ __('checkout.name_and_surname') }}</label>
                        <input class="form-control @if ($errors->has('name')) error_input @else success_input @endif"
                               id="name" name="name" type="text"
                               value="{{  isset($user) ? $user->name : old('name')}}" required>

                    </div>
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="phone" class="">{{ __('checkout.phone') }}</label>
                        <input class="form-control @if ($errors->has('phone')) error_input @else success_input @endif"
                               id="phone" name="phone" type="text"
                               value="{{ isset($user) ? $user->phone : old('phone')  }}"
                               required>
                    </div>
                    @if ($errors->has('phone'))
                        @foreach ($errors->get('phone') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="email" class="">{{ __('checkout.email') }}</label>
                        <input class="form-control  @if ($errors->has('email')) error_input @else success_input @endif"
                               id="email" name="email" type="text"
                               value="{{ isset($user) ? $user->email : old('email') }}"
                               required>
                    </div>
                    <div class="js-email_errors">
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $message)
                                <span class="display error_span">* {{ $message }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>


                <div class="delivery-payment">
                    <div class="checkout__step">
                        <div class="step__second">
                            <span>2</span>
                        </div>
                        <div class="step__title">
                            <span>{{ __('checkout.choose_delivery_and_payments') }}</span>
                        </div>
                    </div>
                    @if ($errors->has('radiobutton'))
                        @foreach ($errors->get('radiobutton') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                    @if ($errors->has('nova_poshta_branch'))
                        @foreach ($errors->get('nova_poshta_branch') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                    @if ($errors->has('nova_poshta_city'))
                        @foreach ($errors->get('nova_poshta_city') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                    @if ($errors->has('delivery_address'))
                        @foreach ($errors->get('delivery_address') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                    @if ($errors->has('new_city'))
                        @foreach ($errors->get('new_city') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                    @if ($errors->has('new_address'))
                        @foreach ($errors->get('new_address') as $message)
                            <span class="display error_span">* {{ $message }}</span>
                        @endforeach
                    @endif
                    <div class="delivery">
                        <h2 class="delivery__title">{{ __('checkout.delivery') }}</h2>
                        <input class="nova_poshta_address__input js-radiobutton-delivery" id="delivery__radiobutton1"
                               name="radiobutton"
                               type="radio"
                               value="nova_poshta_address" checked>
                        <p class="nova_poshta_address__text">{{ __('checkout.select_the_nova_poshta_branch') }}</p>
                        <div class="row nova_poshta_address__block">
                            <div class="col-1 mt-2">
                                <p></p>
                            </div>
                            <div class="col-11">
                                <div class="delivery__form1" id="first">

                                    <select id="mySelect1" name="nova_poshta_city"
                                            class="form-control js-data-example-ajax"
                                            style="width: 300px;" required>
                                        <option></option>
                                    </select>
                                    <select id="mySelect2" name="nova_poshta_branch"
                                            class="form-control mt-2 js-data-example-ajax2"
                                            style="width: 300px;" required>
                                        <option></option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <input class="nova_poshta_address__input js-radiobutton-delivery" id="delivery__radiobutton2"
                               name="radiobutton"
                               type="radio"
                               value="your_address">
                        <p class="nova_poshta_address__text">{{ __('checkout.targeted_address') }}</p>
                        <div class="row nova_poshta_address__block">

                            <div class="js-custom-delivery js_delivery_none__global" id="four">
                                <p class="subtitle_checkout" style="margin-left: 40px;">Введіть службу доставки через яку ви
                                    хочете отримати замовлення</p>
                                <div class="checkout-item col-12">
                                    <div class="form-group" style="width: 300px">
                                        <input class="form-control " name="name_custom_delivery_address" type="text"
                                               >
                                    </div>
                                </div>
                            </div>
                            @auth
                                @if(count($user->delivery_addresses) > 0)
                                    <div class="col-11">
                                        <div class="delivery__form2 js-delivery_address" id="second">
                                            <select class="form-control" name="delivery_address" id="delivery_address"
                                                    style="width: 300px;border: 0">
                                                <option value="" disabled selected
                                                        hidden>{{ __('checkout.choose_your_address') }}</option>

                                                @foreach($user->delivery_addresses as $address)
                                                    <option value="{{ $address->id }}">{{ $address->city . ', ' . $address->address }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                @endif
                            @endauth
                            <div class="delivery-input__block col-12" id="third">
                                @auth
                                    <a class="delivery-input__link">{{ __('checkout.add_your_address') }}</a>
                                @endauth


                                <input class="form-control delivery-input__js js_deliv" id="new_city" name="new_city"
                                       type="text"
                                       placeholder="{{ __('checkout.city') }}"
                                       style="@guest display: block; @endguest width: 300px"

                                >
                                <input class="form-control delivery-input__js js_deliv" id="new_address"
                                       name="new_address" type="text"
                                       placeholder="{{ __('checkout.street') }}"
                                       style="@guest display: block; @endguest width: 300px"
                                >
                            </div>
                        </div>

                        <input class="nova_poshta_address__input js-radiobutton-delivery" id="delivery__radiobutton3"
                               name="radiobutton"
                               type="radio"
                               value="pickup">
                        <p class="nova_poshta_address__text">{{ __('checkout.pickup') }}</p>
                    </div>

                    <div class="payment">
                        <div class="checkout__step">
                            <div class="step__first">
                                <span>3</span>
                            </div>
                            <div class="step__title">
                                <span>{{ __('checkout.payment') }}</span>
                            </div>
                        </div>
                        @if ($errors->has('legal_person'))
                            @foreach ($errors->get('legal_person') as $message)
                                <span class="display error_span">* {{ $message }}</span>
                            @endforeach
                        @endif

                        @foreach($order_payments as $payment)
                            @if(!$conditional && $payment->key == 'liqpay') @continue @endif
                            {{--                            @if( $payment->key == 'no-cash')@guest @continue @endguest @endif--}}
                            {{--                            @if($payment->key == 'no-cash' && count($user->legal_entities) ==0) @continue @endif--}}

                            <p><input id="non-{{ $payment->key }}" class="js-radio-legal-change" name="payment_name"
                                      type="radio" value="{{$payment->key}}"
                                      required> {{ $payment->getTranslatedAttribute('name',App::getLocale()) }}</p>
                            @if($payment->key == 'no-cash')

                                <div class="js-legal-person-block"
                                     style="display: none; padding-left: 20px;padding-bottom: 20px">
                                    @if(isset($user->legal_entities))
                                        @if(count($user->legal_entities)>0)
                                            <div id="legal-person-block" class="form-group">
                                                <label for="city">{{ __('checkout.legal_person') }}</label>

                                                <div class="delivery__form2" style="margin-left: 30px;">

                                                    <select class="form-control" id="legal_person" name="legal_person"
                                                            style="border: 0">
                                                        <option value="" disabled selected
                                                                hidden>{{ __('checkout.select_legal_person') }}
                                                        </option>
                                                        @foreach($user->legal_entities as $entity)
                                                            <option value="{{ $entity->id }}">{{ $entity->organization_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @else
                                            <a href="{{ route('legal-person.create') }}">{{ __('checkout.create_legal_person') }}</a>
                                        @endif
                                    @else
                                        <a href="{{ route('legal-person.create') }}">{{ __('checkout.create_legal_person') }}</a>
                                    @endif
                                </div>



                            @endif

                        @endforeach


                    </div>
                </div>
                <div class="enter__button button_place">
                    <button class="learn-more learn-more_btn" type="submit">
                        <div class="circle">
                            <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                        </div>
                        <p class="button-text">{{ __('checkout.buy') }}</p>
                    </button>
                </div>
            </form>
            <div class="checkout-product col-lg-6 col-sm-12 col-12">
                <div class="row product__title">
                    <p class="col-lg-2 col-sm-12 col-12">{{ __('checkout.product.image') }}</p>
                    <p class="col-lg-3 col-sm-12 col-12">{{ __('checkout.product.name') }}</p>
                    <p class="col-lg-3 col-sm-12 col-12">{{ __('checkout.product.count') }}</p>
                    <p class="col-lg-2 col-sm-12 col-12">{{ __('checkout.product.price') }}</p>
                    <p class="col-lg-2 col-sm-12 col-12">{{ __('checkout.product.total') }}</p>
                </div>
                @foreach($collect as $item)
                    <div class="shopList__body row">
                        <div class="col-lg-2 col-sm-12 col-12 product__img">
                            <img class="img-fluid lazyImage" data-src="{{ $item['image'] }}" alt="product">
                        </div>
                        <div class="col-lg-3 col-sm-12 col-12 product__text">
                            <p class="text__name">{{ $item['name'] }}</p>
                            <p class="subtext__name">{{ $item['category'] }}</p>
                        </div>
                        <div class="col-lg-3 col-sm-12 col-12 product__text">
                            <p class="text__numb">{{ $item['qty'] }} {{ __('checkout.product.piece') }}</p>
                        </div>
                        <div class="col-lg-2 col-sm-12 col-12  product__text">
                            <p class="text__summ">{{ $item['price'] == 0.00 ?  '' : $item['price'] . __('checkout.product.UAH') }} </p>
                        </div>
                        <div class="col-lg-2 col-sm-12 col-12 product__text">
                            <p class="text__summ summ">{{ $item['price'] == 0.00 ? __('checkout.on_request') : $item['price'] * $item['qty'] . __('checkout.product.UAH')}} </p>
                        </div>
                    </div>
                @endforeach

                <div class="row price-text">
                    <div class="col-lg-5 col-sm-12 col-12">
                        <div class="button_place ">
                            <a class="learn-more js-buy" href="#" data-toggle="modal" data-target="#shoplist">
                                <div class="circle">
                                    <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}"
                                         alt="save button">
                                </div>
                                <p class="button-text">{{ __('checkout.edit') }}</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-12 col-12 price__block">
                        <p class="text">{{ __('checkout.product.sum') }}:
                            <span class="price">{{ $conditional ?  $total .  __('checkout.product.UAH') :__('checkout.on_request') }}  </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script>
        function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test($email);
        }

        $("#email")
            .focusout(function () {
                if (!validateEmail($("#email").val())) {
                    $("#email").addClass('error_input');
                    $(".js-email_errors").html('<span class="display error_span">* {{ __('validation.email',['attribute'=>'Email']) }}</span>')
                } else {
                    $("#email").removeClass('error_input');
                    $(".js-email_errors").empty();
                }
            })

        $('#mySelect1').on('select2:select', function (e) {
            var data = e.params.data;
            $.ajax({
                url: '/show',
                type: "GET",
                dataType: 'json',
                data: {ref: data.ref},
            }).then(function (response) {
                console.log(response);
                console.log($('#mySelect2'));
                $('#mySelect2').html('').select2({data: [{id: '', text: ''}]});
                $(".js-data-example-ajax2").select2({
                    placeholder: '{{ __('checkout.select_a_branch') }}',
                    data: $.map(response, function (obj) {
                        return {id: obj.Description, text: obj.Description};
                    })
                });
            });
        });
        $('#mySelect2').select2({placeholder: '{{ __('checkout.select_a_branch') }}'});
        $('#mySelect1').select2({placeholder: '{{ __('checkout.select_a_city') }}'});


        $(document).ready(function (e) {
            $.ajax({
                url: '/index',
                type: "GET",
                dataType: 'json',
            }).then(function (response) {
                $(".js-data-example-ajax").select2({
                    placeholder: '{{ __('checkout.select_a_city') }}',
                    data: $.map(response, function (obj) {
                        return {id: obj.Description, text: obj.Description, ref: obj.Ref};
                    })
                });
            });
            console.log($('#delivery__radiobutton1').is(':checked'));
            //check required on load page
            if ($('#delivery__radiobutton1').is(':checked')) {
                $('#mySelect1').prop('required', true);
                $('#mySelect2').prop('required', true);
            }
            //change on click
            $('.js-radiobutton-delivery').click(function () {
                if ($('#delivery__radiobutton1').is(':checked')) {
                    $('#mySelect1').prop('required', true);
                    $('#mySelect2').prop('required', true);
                } else if ($('#delivery__radiobutton2').is(':checked')) {
                    $('#delivery_address').prop('required', true);

                    $('#mySelect1').prop('required', false);
                    $('#mySelect2').prop('required', false);
                } else if ($('#delivery__radiobutton3').is(':checked')) {
                    $('#delivery_address').prop('required', false);

                    $('#mySelect1').prop('required', false);
                    $('#mySelect2').prop('required', false);
                }
            });
            let sw = false;
            $('.delivery-input__link').click(function () {
                sw = !sw;
                console.log('CHANGE');
                if (sw) {
                    $('#delivery_address').prop('required', false);
                    $('#new_city').prop('required', true);
                    $('#new_address').prop('required', true);
                    $('.js-delivery_address').css('display', 'none');
                } else {
                    $('#delivery_address').prop('required', true);
                    $('.js-delivery_address').css('display', 'block');
                    $('#new_city').prop('required', false);
                    $('#new_address').prop('required', false);
                }
            });

            $('.js-radio-legal-change').change(function () {
                if ($('#non-no-cash').is(':checked')) {
                    $('.js-legal-person-block').css('display', 'block');
                    $('#legal_person').prop('required', true);
                } else {
                    $('.js-legal-person-block').css('display', 'none');
                    $('#legal_person').prop('required', false);
                }
            });


        });

    </script>
@endpush