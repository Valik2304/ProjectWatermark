@inject('imageService','App\Services\ImageService')
@extends('layouts.app')

@section('title', $title)
@section('description', $description)

@section('content')
    <div class="product-card" id="product-card">
        <div class="container">
            {{ Breadcrumbs::render(Route::currentRouteName(),$product,$categories_current) }}
            <div class="row card__info js-product-block">
                <div class="col-12 text-center">
                    <h2 class="product-card__title">
                        <span class="js-product-reference">{{ $product->article }}</span>
                        <input class="js-product-category" type="hidden"
                               value="{{ $category_id ?? $product->categories[0]->id }}">
                        <input class="js-product-id" type="hidden"
                               value="{{ $product->id }}">
                        @if(getDOT($product->article))
                            <a href="#" class="modal__button gear" data-toggle="modal" data-target="#cartArticle">
                                <img class="title__img lazyImage"
                                     data-src="{{ url('/img/svg/product-card__settings.svg') }}"
                                     alt="product-settings">
                            </a>
                        @endif

                    </h2>

                    <!-- Modal -->
                    @include('catalog.modal-gear')

                </div>
                <div class="product-card__img col-lg-4 col-md-6 col-sm-12 col-12">
                    <img itemprop="image" class="img-fluid lazyImage"
                         data-src="{{ url($imageService->resizeImage($product->image,380,350 )) }}"
                         alt="product-card">
                </div>
                <div class="product-card__description col-lg-8 col-md-12 col-sm-12 col-12">
                    <p class="description__availability">@if($product->price == 0.00 || $product->qty == 0 ) {{ __('product_page.under_the_order') }}@else
                            {{ __('product_page.in_stock') }} @endif</p>
                    <div class="description__name row">
                        <p class="name__subject subject col-lg-2 col-md-4 col-sm-4 col-4">{{ __('product_page.name') }}:</p>
                        <p itemprop="name"
                           class="name__text text col-lg-10 col-md-8 col-sm-8 col-8">{{ $product->getTranslatedAttribute('name',App::getLocale(),'uk') }}</p>
                    </div>
                    <div class="description__model-number row">
                        <p class="model-number__subject subject col-lg-2 col-md-4 col-sm-4 col-4">{{ __('product_page.article') }}:</p>
                        <p class="model-number__text text col-lg-10 col-md-8 col-sm-8 col-8">{{ $product->article }}</p>
                    </div>
                    <div class="description__category row">
                        <p class="category__subject subject col-lg-2 col-md-4 col-sm-4 col-4">{{ __('product_page.category') }}:</p>
                        <p class="category__text text col-lg-10 col-md-8 col-sm-8 col-8">{{ $category->getTranslatedAttribute('name',App::getLocale(),'uk') }}</p>
                    </div>

                    <div class="description__price row">
                        <p class="price__subject subject col-lg-2 col-md-4 col-sm-4 col-4">{{ __('product_page.price') }}:</p>
                        @if($product->old_price == 0)
                            <p itemprop="offers" itemscope itemtype="http://schema.org/Offer"
                               class="price__text text col-lg-3 col-md-8 col-sm-8 col-8">{!! $product->price == 0.00 ? '<span itemprop="price">'. __('product_page.on_request') .'</span>' : '<span itemprop="price">'. presentPrice($product->price) . '</span> ₴'!!}</p>
                        @else
                            <p class="old__price price__text text col-lg-3 col-md-8">{{ presentPriceString($product->old_price) }}</p>
                            <p class="price__text text col-lg-3 col-md-8">{{ presentPriceString($product->price) }}</p>
                        @endif
                    </div>
                    <p itemprop="description"
                       class="description__describe col-12">{{ $product->getTranslatedAttribute('details',App::getLocale(),'uk') }}
                    </p>

                    <p><a target="_blank" class="description__link" href="https://mall.industry.siemens.com/mall/en/us/Catalog/Product/{{ $product->article }}">{{ __('product_page.see_instruction_siemens') }}</a></p>

                    <p class="description__contact col-12">{{ __('product_page.if_question') }} <a href="#" data-toggle="modal" data-target="#quick-order">{{ __('product_page.contact_the_manager') }}</a></p>

                    <div class="product-card__button">
                        <div class="product-card__button__wrap">
                            <a @auth
                               @if(getDOT($product->article))class="product-card__more-link js-add-to-zip-gear gear"
                               data-toggle="modal" data-target="#cartArticle"
                               @else class="product-card__more-link js-add-to-zip @endif"
                               @else
                               class="product-card__more-link"
                               data-toggle="modal" data-target="#exampleModalCenter"
                               @endauth
                               href="#">{{ __('product_page.add_to_ZIP') }}</a>

                            <!-- Button trigger modal  quick order-->
                            <a class="product-card__more-link more-link__order" href="#" data-toggle="modal"
                               data-target="#quick-order">{{ __('product_page.quick_order') }}</a>

                            <!-- Modal quick order-->
                            @include('catalog.modal-quick-order')


                        </div>
                        <div class="buy__wrapper button_place">
                            <a @if(getDOT($product->article)) data-toggle="modal" data-target="#cartArticle" @endif
                            class="learn-more quick-order-btn learn-more_btn @if(getDOT($product->article)) gear @else js-buy-button @endif" style="background-color: #ffffff;">
                                <div class="circle">
                                    <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}"
                                         alt="save button">
                                </div>
                                <p class="button-text">{{ __('product_page.buy') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if($product->description or $product->characteristics or $product->reviews)
                <div class="product-card__tab row">
                    <div class="col-12 ">
                        <ul class="tab__pills nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @if($product->description)
                                <li class="pills__item nav-item">
                                    <a class="pills__link nav-link active" id="pills-home-tab" data-toggle="pill"
                                       href="#pills-home"
                                       role="tab" aria-controls="pills-home" aria-selected="true">{{ __('product_page.all_about_the_product') }}</a>
                                    <i class="fas fa-chevron-right"
                                       id="pills-home-tab" data-toggle="pill"

                                       role="tab" aria-controls="pills-home"></i>
                                </li>
                            @endif
                            @if($product->description and count($product->characteristics) > 0 )
                                <li class="nav-item disable">|</li> @endif
                            @if(count($product->characteristics)>0)

                                <li class="pills__item nav-item">
                                    <a class="pills__link nav-link @if(count($product->characteristics) > 0 and !$product->description) active @endif" id="pills-profile-tab" data-toggle="pill"
                                       href="#pills-profile"
                                       role="tab" aria-controls="pills-profile"
                                       aria-selected="@if(count($product->characteristics) > 0 and !$product->description) true @else false @endif">{{ __('product_page.characteristic') }} </a>
                                    <i class="fas fa-chevron-right"
                                       id="pills-profile-tab"
                                       data-toggle="pill"

                                       role="tab"
                                       aria-controls="pills-profile"></i>
                                </li>
                            @endif
                            @if(count($product->characteristics) > 0 )
                                <li class="nav-item disable">|</li>
                            @endif
                            <li class="pills__item nav-item">
                                <a class="pills__link nav-link @if(count($product->characteristics) == 0 and !$product->description) active @endif "
                                   id="pills-contact-tab"
                                   data-toggle="pill"
                                   href="#pills-contact"
                                   role="tab" aria-controls="pills-contact" aria-selected="@if(count($product->characteristics) == 0 and !$product->description) true @else false @endif">{{ __('product_page.reviews') }} <span
                                            class="badge-blue js-comment-count">{{ $product->comments->count() > 0 ? '('. $product->comments->count() .')': ''}}</span></a>
                                <i class="fas fa-chevron-right"
                                   id="pills-contact-tab"
                                   data-toggle="pill"

                                   role="tab" aria-controls="pills-contact"></i>
                            </li>
                        </ul>
                        <div class="tab__content tab-content" id="pills-tabContent">
                            @if($product->description)
                                <div class="content__about-product tab-pane fade show active" id="pills-home"
                                     role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <h4 class="about-product__title">{{ __('product_page.description') }}</h4>
                                    <p class="about-product__text">{!! $product->getTranslatedAttribute('description',App::getLocale(),'uk') !!}</p>
                                </div>
                            @endif
                            <div class="content__characteristic tab-pane fade @if(count($product->characteristics) > 0 and !$product->description) show active @endif" id="pills-profile" role="tabpanel"
                                 aria-labelledby="pills-profile-tab">
                                <h4 class="characteristic__title">{{ __('product_page.characteristics') }}</h4>
                                @foreach($product->characteristics as $characteristics)
                                    <div class="row characteristic__items">
                                        <div class="col-6 items__text">
                                            <p class="subject">{{ $characteristics->name }}</p>
                                        </div>
                                        <div class="col-6 items__text">
                                            <p class="text">{{ $characteristics->pivot->value }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="content__feedback tab-pane fade @if(count($product->characteristics) == 0 and !$product->description) show active @endif" id="pills-contact" role="tabpanel"
                                 aria-labelledby="pills-contact-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="feedback__title">{{ __('product_page.reviews') }}</h4>
                                    </div>
                                </div>
                                <form class="js-comment-form">
                                    <div class="feedback__form row">
                                        <div class="col-lg-6 col-sm-12 col-12">
                                            <label for="name">
                                                <input type="text" id="name" name="name" placeholder="{{ __('placeholders.name') }}">
                                            </label>
                                            <label for="email">
                                                <input type="email" id="email" name="email" placeholder="{{ __('placeholders.email') }}">
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 col-12">
                                            <label for="text">
                                                <textarea name="text" id="text" placeholder="{{ __('placeholders.comment_text') }}"></textarea>
                                            </label>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="feedback__button  button_place">
                                            <button class="learn-more learn-more_btn js-comment-button">
                                                <div class="circle">
                                                    <img class="lazyImage"
                                                         data-src="{{ url('/img/svg/right-arrow.svg') }}"
                                                         alt="save button">
                                                </div>
                                                <p class="button-text ">{{ __('product_page.comments.send') }}</p>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div class="feedback__comments row js-comments-row-insert">


                                </div>

                                <div class="row items__button button_place">
                                    <button class="learn-more learn-more_btn js-comments-more" href=""
                                            style="display: none">
                                        <div class="circle">
                                            <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}"
                                                 alt="save button">
                                        </div>
                                        <p class="button-text">{{ __('product_page.comments.more') }}</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection
@push('scripts')

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
        $('.js-quick-order').click(function (e) {
            let article = $(e.target).closest('.js-product-block').find(".js-product-reference").text();
            let category = $(e.target).closest('.js-product-block').find(".js-product-category").val();
            let hiddenArticle = '<input  type="hidden" name="article" value="' + article + '">';
            let hiddenCategory = '<input type="hidden" name="category_id" value="' + category + '">';
            $('.js-quick-order-title').before(hiddenArticle, hiddenCategory);
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route('checkout.quick_store') }}',
                data: $("#quick-order_form").serialize(),
                success: function (response) {
                    console.log(response);
                    $('#quick-order').modal('hide');
                    // alert('SUCCESS ADD');
                    $('#modal_quick-order_success').modal('show');
                },
                error: function (response) {
                    alert('ERROR');
                    console.log(response);
                }
            })
        })
    </script>

    <script>
        $('.js-comment-button').click(function (e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ route('comment.store',$product->id) }}',
                dataTyoe: 'json',
                data: $('.js-comment-form').serialize(),
                success: function (data) {
                    console.log(data);
                    $('.js-comments-row-insert').prepend(data.body);
                    $('.js-comment-count').html('(' + $('.js-comments-row-insert').children().length + ')');
                },
                error: function (data) {
                    alert('ERROR');
                    console.log(data);

                }
            });
        });

        $(document).ready(function () {
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                url: '{{ route('comment.index',['product_id'=>$product->id]) }}',
                success: function (data) {
                    console.log(data);
                    $('.js-comments-row-insert').append(data.body);
                    let button = $('.js-comments-more');
                    button.attr('href', data.next);
                    if (data.next != null) {
                        button.show();
                    }
                    console.log($('.js-comments-more').attr('href'));
                },
                error: function (data) {
                    alert('ERROR');
                    console.log(data);

                }
            });

        });

        $('.js-comments-more').click(function (e) {
            e.preventDefault();
            $('.js-comments-more').attr("disabled", true);
            $.ajax({
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                url: $('.js-comments-more').attr('href'),
                success: function (data) {
                    console.log(data);
                    $('.js-comments-row-insert').append(data.body);
                    let button = $('.js-comments-more');
                    button.attr('href', data.next);
                    if (data.next == null) {
                        button.hide();
                    }
                    button.attr("disabled", false);
                    console.log($('.js-comments-more').attr('href'));
                },
                error: function (data) {
                    alert('ERROR');
                    console.log(data);

                }
            });

        })
    </script>

@endpush