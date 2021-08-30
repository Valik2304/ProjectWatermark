@extends('user-cabinet.index')
@section('title',   __('breadcrumbs.orders_history') )

@section('user-cabinet')
    <div class="order-history">
        <div class="container">
            <h2 class="order-history__title">{{ __('breadcrumbs.orders_history') }}</h2>
            <div class="row">
                <div class="col-12">
                    @if(count($orders) > 0)
                        <div class="order_accordion accordion" id="order_accordion">

                            <div class="accordion__heading card">
                                <div class="heading__caption card-header">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-12 col-12">
                                            <p class="caption__title title">{{ __('user_cabinet.orders_history.date') }}</p>
                                        </div>
                                        <div class="col-lg-2 col-sm-12 col-12">
                                            <p class="caption__title title">{{ __('user_cabinet.orders_history.number') }}</p>
                                        </div>
                                        <div class="col-lg-2 col-sm-12 col-12">
                                            <p class="caption__title title">{{ __('user_cabinet.orders_history.sum') }}</p>
                                        </div>
                                        <div class="col-lg-2 col-sm-12 col-12">
                                            <p class="caption__title title">{{ __('user_cabinet.orders_history.status') }}</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-12 col-12">
                                            <p class="caption__title title">{{ __('user_cabinet.orders_history.legal_person') }}</p>
                                        </div>
                                        <div class="col-lg-1 col-sm-12 col-12"></div>
                                    </div>
                                </div>
                            </div>

                            @foreach($orders as $order)
                                {{--@if($order->quick_order) @continue @endif--}}
                                <div class="accordion__items card @if($loop->first) border-active @endif">
                                    <div class="items__head card-header" id="heading{{ $order->id }}">
                                        <div class="row" data-toggle="collapse"
                                             data-target="#collapse{{ $order->id }}" aria-expanded="true"
                                             aria-controls="collapse{{ $order->id }}}">
                                            <div class="items__head__mobile col-sm-6 col-6">
                                                <p class="caption__title caption__title__mobile title">{{ __('user_cabinet.orders_history.date') }}</p>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <p class="head__title title">{{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y') }}</p>
                                            </div>
                                            <div class="items__head__mobile col-sm-6 col-6">
                                                <p class="caption__title caption__title__mobile title">{{ __('user_cabinet.orders_history.number') }}</p>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <p class="head__title title">{{ $order->id }}</p>
                                            </div>
                                            <div class="items__head__mobile col-sm-6 col-6">
                                                <p class="caption__title caption__title__mobile title">{{ __('user_cabinet.orders_history.sum') }}</p>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <p class="head__title title">{{ $order->billing_total }} грн</p>
                                            </div>
                                            <div class="items__head__mobile col-sm-6 col-6">
                                                <p class="caption__title caption__title__mobile title">{{ __('user_cabinet.orders_history.status') }}</p>
                                            </div>
                                            <div class="col-lg-2 col-sm-6 col-6">
                                                <p class="head__title title accepted__btn" style="color: {{ $order->status->color }}">{{ $order->status->getTranslatedAttribute('name',App::getLocale()) }}</p>
                                            </div>

                                            <div class="items__head__mobile col-sm-6 col-6">
                                                <p class="caption__title caption__title__mobile title">{{ __('user_cabinet.orders_history.legal_person') }}</p>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <p class="head__title title">@if(isset($order->content->legal_person)){{ $order->content->legal_person->last_name . ' ' . \Illuminate\Support\Str::limit($order->content->legal_person->first_name,1,'.') .  \Illuminate\Support\Str::limit($order->content->legal_person->patronymic_name,1,'.') }}
                                                    “{{ $order->content->legal_person->organization_name }}”@endif</p>
                                            </div>
                                            <div class="col-lg-1 col-sm-12 col-12 align-self-center">
                                                <button class="head_btn btn btn-link collapsed" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapse{{ $order->id }}" aria-expanded="true"
                                                        aria-controls="collapse{{ $order->id }}">
                                                    <svg class="button-item__img" xmlns="http://www.w3.org/2000/svg"
                                                         width="11" height="5" viewBox="0 0 11 5">
                                                        <path d="M0-.001l5.5 5 5.5-5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapse{{$order->id }}" class="accordion__collapse collapse"
                                         aria-labelledby="heading{{ $order->id }}"
                                         data-parent="#order_accordion">
                                        <div class="items__body accordion__body card-body">
                                            @foreach($order->content->products as $product)

                                                <div class="row align-items-center">
                                                    <div class="col-lg-2 col-sm-12 col-12">
                                                        <img class="img-fluid lazyImage" data-src="{{ $product->image }}" alt="product">
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12 col-12">
                                                        <p class="body__title title__bold">{{ $product->name }}</p>
                                                        <p class="title__light">{{ $product->category }}</p>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-12 col-12">
                                                        <p class="body__title">{{ $product->article }}</p>
                                                    </div>
                                                    <div class="items__body__mobile col-sm-6 col-6">
                                                        <p class="body__title body__title__mobile">Кількість</p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-6 col-6">
                                                        <p class="body__title">{{ $product->qty }} шт.</p>
                                                    </div>
                                                    <div class="items__body__mobile col-sm-6 col-6">
                                                        <p class="body__title body__title__mobile">Ціна</p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-6 col-6">
                                                        <p class="body__title title__bold">{{ $product->price * $product->qty }}
                                                            грн.</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="total__wrapper">
                                                @if(!$order->quick_order)
                                                <div class="row ">
                                                    <div class="col-lg-3 col-sm-12 col-12">
                                                        <p class="body__title title__bold">{{ __('user_cabinet.orders_history.delivery_address') }}:</p>
                                                    </div>

                                                    <div class="col-lg-5 col-sm-12 col-12">
                                                        <p class="body__title">{{ $order->billing_city . ', ' . $order->billing_address }}</p>
                                                    </div>

                                                </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-12 col-12">
                                                        <p class="body__title title__bold">{{ __('user_cabinet.orders_history.payment_method') }}:</p>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12 col-12">
                                                        <p class="body__title">@if($order->payment) {{ $order->payment->name }} @else {{ __('user_cabinet.orders_history.quick_order') }} @endif</p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-6 col-6">
                                                        <p class="body__title title__bold">{{ __('user_cabinet.orders_history.sum') }}:</p>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-6">
                                                        <p class="body__title title__price">@if($order->quick_order) {{ $product->price }}@else {{ $order->billing_total }} @endif
                                                             грн</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <h5>{{ __('user_cabinet.orders_history.help_message') }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection