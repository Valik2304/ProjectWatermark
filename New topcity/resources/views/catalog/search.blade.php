@inject('imageService','App\Services\ImageService')
@inject('catalog','App\Services\CatalogService')
@extends('layouts.app')

@section('title', $title)

@section('content')



    <div class="catalog">
        <div class="container">
            {{ Breadcrumbs::render(Route::currentRouteName(),$categories_current ?? '') }}
            <h2 class="catalog__title">{{ $title }}</h2>
            <div class="row">

                <div class="col-lg-4 col-sm-12">
                    <a id="button__filter" class="button button__filter" href="#">
                        {{ __('general.catalog') }}
                    </a>

                    {!! $catalog->getCatalog() !!}


                </div>

                <div class="col-lg-8 col-sm-12 catalog__items">


                    <!-- Modal gear -->
                    @include('catalog.modal-gear')
                    <div class="load" id="loader" style="top: 200px;">
                        <hr/>
                        <hr/>
                        <hr/>
                        <hr/>
                    </div>
                    <div class="row items__product js-search-category-result" id="products_box">
                        @if(count($products) > 0)
                            @foreach($products as $product)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="product__card card js-product-block block @if($product->price > 0) border-green @endif  ">
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
                        @else
                            <div>{{ __('general.search_not_found')}}</div>
                        @endif
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

                </div>

            </div>

        </div>

        @include('catalog.partners')
    </div>



@endsection
@section('css')
    <style>
        /*body{background:#ECF0F1}*/

        .load {
            z-index: 222
        }

        .load {
            display: none;
            position: absolute;

            left: 50%;
            transform: translate(-50%, -50%);
            /*change these sizes to fit into your project*/
            width: 100px;
            height: 100px;
        }

        .load2 {
            position: absolute;
            bottom: 100px;
        }

        .load hr {
            border: 0;
            margin: 0;
            width: 40%;
            height: 40%;
            position: absolute;
            border-radius: 50%;
            animation: spin 2s ease infinite
        }

        .load :first-child {
            background: #00a3d4;
            animation-delay: -1.5s
        }

        .load :nth-child(2) {
            background: #00a3d4;
            animation-delay: -1s
        }

        .load :nth-child(3) {
            background: #00a3d4;
            animation-delay: -0.5s
        }

        .load :last-child {
            background: #00a3d4
        }

        @keyframes spin {
            0%, 100% {
                transform: translate(0)
            }
            25% {
                transform: translate(160%)
            }
            50% {
                transform: translate(160%, 160%)
            }
            75% {
                transform: translate(0, 160%)
            }
        }
    </style>
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
            $.ajax(
                {
                    type: 'GET',
                    url: url,
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {"_token": "{{ csrf_token() }}", "query": query, "category_id": '{{ $category_current }}'},
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
