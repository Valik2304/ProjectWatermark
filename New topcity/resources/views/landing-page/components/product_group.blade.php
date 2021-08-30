@inject('imageService','App\Services\ImageService')
<section class="products">
    <h2 class="products__title">{{ __('main_page.product_group') }}</h2>
    <div class="container">
        <div id="products__wrapp" class="row slick__mobile">
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    @if($category->hide) @continue @endif
                    <div class="products__item item col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="wrapper">
                            <img class="item__image lazyImage" data-src="{{ url($imageService->resizeImage('storage/'. $category->image,348,203)) }}" alt="image post">
                            <h3 class="item__headline"><a class="js-category-title-for-tree" data-group="{{ $category->id }}" href="{{ route('shop.show',['category'=>$category->slug])  }}">{{ $category->getTranslatedAttribute('name',App::getLocale(),'uk') }}</a></h3>
                            @if(!empty($category->children))
                                <ul class="item__param param">
                                    @foreach($category->children as $item)
                                        @if($item->hide) @continue @endif
                                        <li class="param__point"><a  class="js-category-title-for-tree" data-group="{{$category->id}},{{$item->id}}" href="{{ route('shop.show',['category'=>$item->slug])  }}" >{{ $item->getTranslatedAttribute('name',App::getLocale(),'uk') }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                Catalog empty
            @endif
        </div>
    </div>
</section>
