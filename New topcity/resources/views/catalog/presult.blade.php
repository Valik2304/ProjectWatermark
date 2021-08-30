@inject('imageService','App\Services\ImageService')
@foreach($products as $product)
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="product__card card js-product-block">
            <a href="{{ route('shop.show-product',['category'=> isset($category_slug) ? ($product->categories->where('slug',$category_slug)->count() == 0 ? $product->categories[0]->slug : $category_slug) : $product->categories[0]->slug,'product'=>$product->id]) }}">
                <img
                        src="{{ url($imageService->resizeImage($product->image,308,326)) }}"
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
                                 src="{{ url('/img/svg/product-card__settings.svg') }}"
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