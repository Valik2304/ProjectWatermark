@extends('layouts.app')

@section('title', 'Products')

@section('content')



    <div class="catalog">
        <div class="container">
            <h2 class="catalog__title">Каталог</h2>
            <div class="row">

                <div class="col-4">
                       {{-- @php
                            $nodes = App\Models\Category::get()->toTree();

                        $traverse = function ($categories, $prefix = '-') use (&$traverse) {
                            foreach ($categories as $category) {
                                echo PHP_EOL.'<a href="' . route('shop.index', ['category' => $category->id]).'">'.$prefix.' '.$category->name.'</a>'.'<br>';

                                $traverse($category->children, $prefix.'-');
                            }
                        };

                        $traverse($nodes);
                        @endphp--}}

                    <div class="accordion" id="accordion">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Приводная техника
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <ul id="treeview" class="treeview">
                                        <li class="menu caret"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>
                                            <ul class="nested">
                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                    <ul class="nested">
                                                        <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>
                                                            <ul class="nested">
                                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                                </li>
                                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>
                                                            <ul class="nested">
                                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                                </li>
                                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>

                                                </li>
                                                <li class="menu menu-margin "><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>
                                                    <ul class="nested">
                                                        <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>
                                                            <ul class="nested">
                                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                                </li>
                                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>
                                            <ul class="nested">
                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                </li>
                                                <li class="menu menu-margin"><a class="menu__title" href="#"><i class="far fa-minus-square"></i>Системы автоматизации</a>

                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Техника автоматизации
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Energy
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-8 catalog__items">
                    <div class="row items__btn">
                        <div class="btn__sorting col-lg-6 col-md-12">
                            <span>Сортування:</span>
                            <button type="button" class="button button__sorting">всі</button>
                            <button type="button" class="button button__sorting">в наявності</button>
                        </div>
                        <div class="btn__search col-lg-6 col-md-12">
                            <form action="" method="GET" class="search__form search">
                                <img class="search__icon" src="{{ url('/img/svg/search_icon.svg') }}" alt="">
                                <input type="search" class="search__input" placeholder="Текст" required>
                            </form>
                        </div>
                    </div>
                    <div class="row items__product" id="lol">

                        {{--@foreach($products as $product)
                            <div class="col-lg-6 col-md-12">
                                <div class="product__card card">
                                    <img src="{{ url('/img/product-card.png') }}"
                                         class="card__img card-img-top img-fluid" alt="product">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{ route('shop.show',['product'=>$product->id]) }}">{{ $product->name }}</a></h5>
                                        <h6 class="card-subtitle">
                                            {{ $product->article }}
                                            @if(getDOT($product->article))
                                                <img class="title__img"
                                                     src="{{ url('/img/svg/product-card__settings.svg') }}"
                                                     alt="product-settings">
                                            @endif
                                        </h6>
                                        <p class="card-text">{{ $product->details }}</p>
                                        <span class="card-availability">{!! getStockLevel(rand(0,1)) !!}</span>
                                        <span class="card-price">€ 15.00</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach--}}
{{--{{ $products->appends(request()->input())->links() }}--}}
                        <div class="my_id"></div>
                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="product__card card">
                                <img src="{{ url('/img/product-card.png') }}" class="card__img card-img-top img-fluid" alt="product">
                                <div class="card-body">
                                    <a href="#" class="card-title">Контакторная сборка Siemens</a>
                                    <h6 class="card-subtitle">
                                        3RA1316-8XB30-1AP0 . . .
                                        <img class="title__img" src="{{ url('/img/svg/product-card__settings.svg') }}" alt="product-settings">
                                    </h6>
                                    <p class="card-text">Реверсивная контакторная сборка ac-3 4квт/ 400v, 3-полюса, типоразмер s00 винтовые...</p>
                                    <span class="card-availability">в наявності</span>
                                    <span class="card-price">€ 15.00</span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row items__button" style="margin: 0 auto">
                            <button id="button" class="items__button__more more" >{{ __('More') }}
                                <span class="more__icon">
                                    <img src="{{ url('/img/svg/right-arrow.svg') }}" alt="details button">
                                </span>
                            </button>
{{--                            <button class="myclass" id="button1" href="{{ $products->appends(request()->input())->nextPageUrl() }}">LOL</button>--}}
{{--                        {{ $products->links() }}--}}
                    </div>
                </div>

            </div>

        </div>
        @php
        $partners = [
        '1' => '1',
        '2' => '1',
        '3' => '1',
        '4' => '1',
        '5' => '1',
        '6' => '1',
        '7' => '1',
        '8' => '1',
        ]
        @endphp
        <div class="partners">
            <h2 class="partners__title">Партнери</h2>
            <div class="container">
                <div id="carouselExampleIndicators" class="partners__carousel carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($partners as $partner)
                            @if($loop->first)
                                <div class="carousel-item active">
                                    <div class="row">
                            @endif

                                        <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners" class="w-100 carousel-img"></div>

                            @if($loop->iteration % 4 == 0 && !$loop->last)
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                            @endif
                                        @if($loop->last)
                                    </div>
                                </div>
                            @endif
                        @endforeach
{{--                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                                <div class="col-3"><img src="{{ url('/img/slider.png') }}" alt="partners"
                                                        class="w-100 carousel-img"></div>
                            </div>
                        </div>--}}
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="" aria-hidden="true">
                        <svg class="slider__btn-left" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="30" viewBox="0 0 16 30"><g><g><path
                                            d="M.278 14.401L14.538.25a.857.857 0 0 1 1.21 0 .842.842 0 0 1 0 1.2L2.096 15l13.652 13.548a.842.842 0 0 1 0 1.201.864.864 0 0 1-.602.252.837.837 0 0 1-.602-.252L.284 15.596a.84.84 0 0 1-.006-1.195z"/></g></g></svg>
                    </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="" aria-hidden="true">
                        <svg class="slider__btn-right" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="30" viewBox="0 0 16 30"><g><g><path
                                            d="M15.753 14.401L1.493.25a.857.857 0 0 0-1.21 0 .842.842 0 0 0 0 1.2L13.935 15 .283 28.547a.842.842 0 0 0 0 1.201.864.864 0 0 0 .602.252.837.837 0 0 0 .602-.252l14.26-14.152a.84.84 0 0 0 .006-1.195z"/></g></g></svg>
                    </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>


        </div>
    </div>



@endsection
@push('scripts')
    <script>
        $( document ).ready(function() {
            /* globals Tree */
            'use strict';
            let pointid = $(this).attr("data-pointid");
            $.ajax({
                type: 'GET',
                url: '{{ route('shop.catalog') }}',
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {id:pointid,"_token": "{{ csrf_token() }}"},

                success: function (data) {
                    var tree = new Tree(document.getElementById('tree'), {
                        navigate: true // allow navigate with ArrowUp and ArrowDown
                    });
                    let json = new Array();
                    json= JSON.parse(data['arr']);
                    // console.log(arr);
                    tree.json(json);


                },
                error: function (data) {
                    alert(data);
                    console.log(data);
                }
            });

        });


    </script>
    <script>
        $(".more").click(function(){



            let condition = document.getElementById('button').hasAttribute('href');
            let url;
            console.log(condition);
            if (condition) {
                 url = document.getElementById('button').getAttribute('href');
            } else {
                url = '{{ $products->appends(request()->input())->nextPageUrl() }}';
            }
            console.log(url);
            let pointid = $(this).attr("data-pointid");
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {id:pointid,"_token": "{{ csrf_token() }}"},

                success: function (data) {
                    console.log(data);
                    $(data['body']).insertAfter(".my_id");
                    let button = document.getElementById('button');
                    if(data['next']) {
                        button.setAttribute('href', data['next']);
                    }else{
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


@endpush
