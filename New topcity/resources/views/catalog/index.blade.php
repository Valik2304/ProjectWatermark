@inject('imageService','App\Services\ImageService')
@inject('catalog','App\Services\CatalogService')
@extends('layouts.app')

@section('title', $title)

@section('content')



    <div class="catalog">
        <div class="container">
            {{ Breadcrumbs::render(Route::currentRouteName(),$categories_current ?? '') }}
            <h2 class="catalog__title">{{ $title }}</h2>
            @if(isset($categories_current->description))
                <div class="special-offers">
                    <p class="special-offers__text">{!!  $categories_current->getTranslatedAttribute('description',App::getLocale()) !!} </p>
                </div>
            @endif
            <div class="row">

                <div class="col-lg-4 col-sm-12">
                    <a id="button__filter" class="button button__filter" href="#">
                        {{ __('general.catalog') }}
                    </a>

                    {!! $catalog->getCatalog() !!}


                </div>

                <div class="col-lg-8 col-sm-12 catalog__items">

                    <div class="row items__btn">
                        <div class="btn__sorting col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="sorting-wrap-left">
                                <span>{{ __('general.sort_by') }}:</span>
                                <a class="button button__sorting @if(request()->sort !='in_stock') active @endif"
                                   @if(Route::currentRouteName() == 'shop.index')
                                   href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'all']) }}"
                                   @elseif(Route::currentRouteName() == 'shop.show')
                                   href="{{ route('shop.show', ['category'=> request()->category, 'sort' => 'all']) }}"
                                   @else
                                   href="{{ route('shop.search', ['query'=> request()->get('query'),'checkbox'=> request()->get('checkbox'), 'sort' => 'all']) }}"
                                        @endif>{{ __('general.all') }}</a>
                                <a class="button button__sorting @if(request()->sort == 'in_stock') active @endif"
                                   @if(Route::currentRouteName() == 'shop.index')
                                   href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'in_stock']) }}"
                                   @elseif(Route::currentRouteName() == 'shop.show')
                                   href="{{ route('shop.show', ['category'=> request()->category, 'sort' => 'in_stock']) }}"
                                   @else
                                   href="{{ route('shop.search', ['query'=> request()->get('query'),'checkbox'=> request()->get('checkbox'), 'sort' => 'in_stock']) }}"
                                        @endif>{{ __('general.in_stock') }}</a>
                            </div>
                            @if(file_exists(public_path('storage/'.(isset($category_file) ? $category_file : 'no_file'))))
                                <div class="sorting-wrap-right">


                                    <a class="button__download"
                                       href="{{ url('/storage/' . (isset($category_file) ? $category_file : 'no_file')) }}">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 368 368" style="enable-background:new 0 0 368 368;"
                                             xml:space="preserve">
	                                    <path d="M333.864,82.56h-0.008c0-0.048-0.016-0.024-0.016-0.024h-0.008c-0.056-0.064-0.12-0.128-0.176-0.184l-80-80
				                            C252.16,0.848,250.128,0,248,0h-15.64c-0.232,0-0.488,0-0.72,0H56C42.76,0,32,10.768,32,24v320c0,13.232,10.768,24,24,24h256
				                            c13.232,0,24-10.768,24-24V88C336,85.896,335.184,83.984,333.864,82.56z M320,344c0,4.408-3.584,8-8,8H55.992
				                            c-4.408,0-8-3.592-8-8V24c0-4.408,3.592-8,8-8h168v32H88c-4.416,0-8,3.584-8,8v48c0,4.416,3.584,8,8,8s8-3.584,8-8V64h128v40
				                            c0,4.416,3.576,8,8,8h88V344z M320,96h-80V16h4.688L320,91.32V96z"/>
                                            <path d="M226.344,242.352L192,276.688V136c0-4.416-3.584-8-8-8c-4.416,0-8,3.584-8,8v140.688l-34.344-34.344
				                            c-3.128-3.128-8.184-3.128-11.312,0c-1.56,1.56-2.344,3.608-2.344,5.656c0,2.048,0.784,4.096,2.344,5.656l48,48
				                            c1.424,1.424,3.256,2.2,5.12,2.328h0.008C183.648,304,183.824,304,184,304c0.328,0,0.656-0.016,0.976-0.056
				                            c0.008,0,0.008,0,0.016,0c1.536-0.192,3.024-0.832,4.264-1.904c0.152-0.136,0.296-0.272,0.44-0.416l47.96-47.96
				                            c3.128-3.128,3.128-8.184,0-11.312C234.528,239.224,229.472,239.224,226.344,242.352z"/>
                                </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="btn__search col-lg-6 col-md-6 col-sm-12 col-12">
                            <form action="" method="GET" class="search__form search js-form-searc-catalog">
                                <img class="search__icon lazyImage" data-src="{{ url('/img/svg/search_icon.svg') }}"
                                     alt="">
                                <input type="search" class="search__input js-search-current-category"
                                       placeholder="{{ __('placeholders.search') }}" required>
                            </form>
                        </div>
                    </div>
                    <!-- Modal gear -->
                    @include('catalog.modal-gear')
                    <div class="load" id="loader" style="top: 200px;">
                        <hr/>
                        <hr/>
                        <hr/>
                        <hr/>
                    </div>
                    {!! $categories_current->iframe ?? '' !!}
                    <div class="row items__product js-search-category-result" id="products_box">
                        @foreach($products as $product)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="product__card card js-product-block">
                                    <a href="{{ route('shop.show-product',['category'=> isset($category_slug) ? ($product->categories->where('slug',$category_slug)->count() == 0 ? $product->categories[0]->slug : $category_slug) : $product->categories[0]->slug,'product'=>$product->id]) }}">
                                        <img
                                                data-src="{{ url($imageService->resizeImage($product->image,308,326)) }}"
                                                class="card__img card-img-top img-fluid lazyImage" alt="product">
                                    </a>
                                    <div class="card-body">
                                        <a class="card-title"
                                           href="{{ route('shop.show-product',['category'=> isset($category_slug) ? ($product->categories->where('slug',$category_slug)->count() == 0 ? $product->categories[0]->slug : $category_slug) : $product->categories[0]->slug ,'product'=>$product->id]) }}">
                                            <p>
                                                SIEMENS {{ $product->getTranslatedAttribute('name',App::getLocale()) }}</p>
                                        </a>
                                        <h6 class="card-subtitle ">
                                            <span class="js-product-reference">{{ $product->article }}</span>
                                            <input class="js-product-category" type="hidden"
                                                   value="{{ $category_id ?? $product->categories[0]->id   }}">
                                            @if(getDOT($product->article))
                                                <a href="#" class="modal__button gear" data-toggle="modal"
                                                   data-target="#cartArticle">
                                                    <img class="title__img lazyImage"
                                                         data-src="{{ url('/img/svg/product-card__settings.svg') }}"
                                                         alt="product-settings">
                                                </a>
                                            @endif
                                        </h6>
                                        <p class="card-text">{{ $product->getTranslatedAttribute('details',App::getLocale()) }}</p>
                                        {!! getStockLevel($product->price,$product->old_price,$product->qty) !!}
                                        <div class="card-buttons">
                                            <a @auth
                                               @if(getDOT($product->article))
                                               class="product-card__more-link js-add-to-zip-gear gear"
                                               data-toggle="modal"
                                               data-target="#cartArticle"
                                               @else
                                               class="product-card__more-link js-add-to-zip
                                                   @endif"
                                               @else
                                               data-toggle="modal" data-target="#exampleModalCenter"
                                               @endauth
                                               href="#">{{ __('general.add_to_ZIP') }}</a>

                                            <a class="@if(getDOT($product->article)) gear @else js-buy-button @endif"
                                               @if(getDOT($product->article))
                                               data-toggle="modal"
                                               data-target="#cartArticle"
                                               @endif
                                               href="#">{{ __('general.buy') }}</a>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="my_id"></div>


                    </div>
                    <div class="row justify-content-center mt-4">{{ $products->onEachSide(3)->links() }}</div>
                    <div class="load load2 js-loader-more-button" style="bottom: -35px;">
                        <hr/>
                        <hr/>
                        <hr/>
                        <hr/>
                    </div>
                    <div class="row items__button button_place">
                        <button id="category_button" class="learn-more learn-more_btn" href="{{ $link }}" hidden>
                            <div class="circle">
                                <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}"
                                     alt="save button">
                            </div>
                            <p class="button-text">{{ __('general.more') }}</p>
                        </button>
                    </div>

                    {{--                    --}}{{--<div class="row">--}}
                    {{--                        {{ $products->appends(request()->input())->links() }}--}}
                    {{--                    </div>--}}

                </div>

            </div>

        </div>

        @include('catalog.partners')
    </div>



@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // проверка нужна ли кнопка "показать больше"
            let button = document.getElementById('category_button');
            let conditional = button.getAttribute('href');
            if (conditional) {
                button.hidden = false;
            }

            let checked = '{{ request()->input('checkbox') }}';
            let check = false
            if (checked == 'on') {
                check = true;
            }
            $("#checkbox").attr("checked", check);

        });

    </script>
    <script>
        $("#category_button").click(function () {
            this.disabled = true;
            url = this.getAttribute('href');
            console.log(url);
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {"_token": "{{ csrf_token() }}"},
                beforeSend: function () {
                    console.log($('#loader'));
                    $("#category_button").hide();
                    $('.js-loader-more-button').show();
                },
                complete: function () {
                    $("#category_button").show();
                    $('.js-loader-more-button').hide();
                },
                success: function (data) {
                    console.log(data);
                    $(data['body']).insertBefore(".my_id");
                    let button = document.getElementById('category_button');

                    let allA = $('.pagination li').find("a");
                    $.each(allA, function (index, item) {
                        console.log(data['next']);
                        console.log($(item).attr("href"));
                        console.log('----');
                        if (url == $(item).attr("href")) {
                            console.log($(item).attr("href"));
                            $(item).parent().addClass('active');
                            $(item).replaceWith(function () {
                                return $("<span>" + $(this).html() + "</span>").addClass('page-link');
                            });
                        }
                    });

                    if (data['next']) {
                        button.setAttribute('href', data['next']);
                        button.disabled = false;
                    } else {
                        button.hidden = true;
                    }


                },
                error: function (data) {
                    alert(data);
                    console.log(data);
                }
            });
        });
    </script>
    <script>
        function jumpFocus(e) {
            console.log('jump');
            let max = ~~e.getAttribute('maxlength');
            if (max && e.value.length >= max) {
                do {
                    e = e.nextSibling;
                }
                while (e && !(/text/.test(e.type)));
                if (e && /text/.test(e.type)) {
                    e.focus();
                }
            }
        }
    </script>
    <script>
        $('.js-form-searc-catalog').submit(function (e) {

            e.preventDefault();

            let query = $('.js-search-current-category').val();
            let url = '{{ route('shop.searchCurrentCategory') }}';
            let data = {
                "_token": "{{ csrf_token() }}",
                "query": query,

            };
            let category_id = Number('{{ $category_current}}');
            if (category_id !== 0) data.category_id = category_id;
            $.ajax(
                {
                    type: 'GET',
                    url: url,
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: data,
                    beforeSend: function () {
                        console.log($('#loader'));

                        $(".js-search-current-category").prop("disabled", true);
                        $('#loader').show();
                    },
                    complete: function () {
                        $(".js-search-current-category").prop("disabled", false);
                        $('#loader').hide();
                    },
                    success: function (data) {
                        console.log(data);
                        $('.js-search-category-result').html(data['body']);
                        let div = $('<div class="my_id"></div>');
                        $('.js-search-category-result').append(div);
                        let button = document.getElementById('category_button');
                        if (data['next']) {
                            button.setAttribute('href', data['next']);
                            button.hidden = false;
                        } else {
                            button.hidden = true;
                        }


                    },
                    error: function (data) {
                        alert(data);
                        console.log(data);
                    }
                });
        })
    </script>


@endpush
