@extends('user-cabinet.index')
@section('title',  __('breadcrumbs.your_ZIP') )
@section('user-cabinet')
    <h2 class="zip__title">{{ __('breadcrumbs.your_ZIP') }}</h2>
    <div class="zip" id="zip">
        @if(count($zips) > 0)
            <div class="row zip__filter">
                <div class="col-12">
                    <span class="filter__text">{{ __('user_cabinet.your_ZIP.sorting') }}:</span>
                    <a href="{{ route('zip.index',['sort'=>'date']) }}"
                       class="filter__button button">{{ __('user_cabinet.your_ZIP.date') }}</a>
                    <a href="{{ route('zip.index',['sort'=>'name']) }}"
                       class="filter__button button">{{ __('user_cabinet.your_ZIP.name') }}</a>
                    <a href="{{ route('zip.index',['sort'=>'qty']) }}"
                       class="filter__button button">{{ __('user_cabinet.your_ZIP.count') }}</a>
                </div>
            </div>
            <div class="row zip__product">

                @foreach($zips as $zip)
                    <div class="product__wrap col-12 js-zip-wrap zip-item">
                        <label class="product-check-label">
                            <input class="product-check-input js-checkbox-zip" type="checkbox"
                                   value="{{ $zip['rowId'] }}"
                                   id="check{{$zip['id']}}">
                            <span class="checkmark"></span>

                            <div class="row align-items-center">
                                <div class="col-lg-2 col-sm-12 col-12 product__img">
                                    <img class="lazyImage" data-src="{{ $zip['image'] }}" alt="product">
                                </div>
                                <div class="col-lg-3 col-sm-12 col-12 product__text">
                                    <p class="text__name">{{ $zip['name'] }} </p>
                                    <p class="subtext__name">{{ $zip['category'] }}</p>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-12 product__text">
                                    <p class="text__article">{{ $zip['article'] }}</p>
                                </div>
                                <div class="col-lg-1 col-sm-12 col-12 product__text">
                                    <p class="text__numb">{{ $zip['qty'] }} {{ __('user_cabinet.your_ZIP.piece') }}</p>
                                </div>
                                <div class="col-lg-2 col-sm-12 col-12 product__text">
                                    <p class="text__date">{{ $zip['created_at']->format('d.m.Y') }}</p>
                                </div>
                                <div class="col-lg-1 col-sm-12 col-12 product__close-btn">
                                    <form action="{{ route('zip.destroy',['id'=>$zip['rowId']]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="close-btn">
                                            <svg fill=" #e2e5e9" xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18"
                                                 viewBox="0 0 18 18">
                                                <path id="error_copy_2_копия" data-name="error  copy 2 копия"
                                                      class="cls-1"
                                                      d="M1336.01,282a9,9,0,1,1,9-9A9,9,0,0,1,1336.01,282Zm4.13-11.625a0.45,0.45,0,0,0,0-.612l-0.92-.919a0.441,0.441,0,0,0-.62,0l-2.6,2.6-2.6-2.6a0.441,0.441,0,0,0-.62,0l-0.91.919a0.431,0.431,0,0,0,0,.612l2.6,2.6-2.6,2.6a0.432,0.432,0,0,0,0,.613l0.91,0.919a0.442,0.442,0,0,0,.62,0l2.6-2.6,2.6,2.6a0.442,0.442,0,0,0,.62,0l0.92-.919a0.451,0.451,0,0,0,0-.613l-2.61-2.6Z"
                                                      transform="translate(-1327 -264)"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </label>
                    </div>
                @endforeach

                <div class="button_place ">
                    <a class="learn-more js-zip-button" href="#">
                        <div class="circle">
                            <img class="lazyImage" src="/img/svg/right-arrow.svg" alt="save button">
                        </div>
                        <p class="button-text">{{ __('user_cabinet.your_ZIP.add_to_cart') }}</p>
                    </a>
                </div>
                @else
                    {{ __('user_cabinet.your_ZIP.help_text') }}
                        <div class="button_place fixed_button">
                            <a href="{{ route('shop.index') }}" class="learn-more learn_more_btn" style="background: none">
                                <div class="circle"><img src="/img/svg/right-arrow.svg" alt="save button">
                                    <span class="icon arrow"></span>
                                </div>
                                <p class="button-text btn_basket" style="width: 120px;">{{ __('user_cabinet.your_ZIP.help_plus') }}</p>
                            </a>
                        </div>



                @endif
            </div>
    </div>
    <div class="noZip" style="display: none">
        {{ __('user_cabinet.your_ZIP.help_text') }}
        <div class="button_place fixed_button">
            <a href="{{ route('shop.index') }}" class="learn-more learn_more_btn" style="background: none">
                <div class="circle"><img src="https://topcity.com/img/svg/right-arrow.svg" alt="save button">
                    <span class="icon arrow"></span>
                </div>
                <p class="button-text btn_basket" style="width: 120px;">{{ __('user_cabinet.your_ZIP.help_plus') }}</p>
            </a>
        </div>
    </div>


@endsection
@push('scripts')
    <script>
        let len = $('.zip-item').length;
        $('.js-zip-button').click(function (e) {
            e.preventDefault();
            let arr = [];
            $('input.js-checkbox-zip:checkbox:checked').each(function () {
                arr.push($(this).val());
            });

            if (arr.length === 0) {

            } else {
                $('input.js-checkbox-zip:checkbox:checked').each(function () {
                    $(this).closest('.js-zip-wrap').remove();
                });

                let data = {
                    rowIds: arr,
                    "_token": "{{ csrf_token() }}"
                };
                let url = '{{ route('zip.switchToCart') }}';

                VueApp.$refs.cart.addZipToCart(url, data);
                console.log($('.zip-item').length);
                len = $('.zip-item').length;
                if (len !== 0) {
                    $('.zip').css('display', 'block');
                    $('.noZip').css('display', 'none');
                    console.log('do');

                } else {
                    $('.zip').css('display', 'none');
                    $('.noZip').css('display', 'block');
                    console.log('done');
                }
                console.log($('.zip-item').length);

            }


        })
    </script>
@endpush