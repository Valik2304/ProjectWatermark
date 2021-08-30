@inject('imageService','App\Services\ImageService')
<section class="industry">
    <h2 class="industry__title">{{ __('main_page.industry_solutions') }}</h2>
    <div class="container">
        <div class="row slick__mobile">
            @if(count($industry_solutions) > 0)
                @foreach($industry_solutions as $industry_solution)

                    <div class="industry__item item col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="wrappper">
                            <img class="lazyImage item__image" data-src="{{ url($imageService->resizeImage('storage/'.$industry_solution->image,350,350,false)) }}" alt="post image">
                            <div class="item__info info">
                                <h3 class="info__headline">{{ $industry_solution->getTranslatedAttribute('title',App::getLocale())}}</h3>
                                <p class="info__text">{{ $industry_solution->getTranslatedAttribute('excerpt',App::getLocale()) }}</p>
                                <div class="info__details details">
                                    <a class="details__link" href="{{ route('news.show',['category' => $industry_solution->category->slug,'news'=>$industry_solution->slug]) }}">{{ __('main_page.more_details') }}</a>
                                    <img class="lazyImage" data-src="{{ url('/img/svg/arrow_link.svg') }}" alt="details link">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>industry_solutions not found</p>
            @endif
        </div>
    </div>
    <div class="button_place ">
        <a class="learn-more" href="{{ route('news.industry_solutions') }}">
            <div class="circle">
                <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
            </div>
            <p class="button-text">{{ __('main_page.more') }}</p>
        </a>
    </div>
</section>