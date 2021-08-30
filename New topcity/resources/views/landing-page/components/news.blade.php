@inject('imageService','App\Services\ImageService')
<section class="news">
    <h2 class="news__title">{{ __('main_page.news') }}</h2>
    <div class="container">
        <div class="row slick__mobile">
            @if(count($siemens_news) > 0 )
                @foreach($siemens_news as $news)
                    <div class="news__item item col-xl-4 col-lg-4 col-md-6 col-12 mt-md-4 mt-4">
                        <div class="wrapper">
                            <img class="item__image img-fluid lazyImage" data-src="{{ url($imageService->resizeImage('storage/'.$news->image,348,203,false)) }}" alt="news">
                            <div class="item__info info">
                                <div class="info__wrap">
                                    <span class="info__category">{{ $news->category->getTranslatedAttribute('name',App::getLocale()) }}</span>
                                    <span class="info__date"><img class="date__image lazyImage" data-src="{{ url('img/svg/calendar.svg') }}" alt="date"> {{ \Carbon\Carbon::parse($news->created_at)->format('d.m.Y') }}</span>
                                </div>
                                <h3 class="info__title">{{ $news->getTranslatedAttribute('title',App::getLocale()) }}</h3>
                                <p class="info__text">{{ $news->getTranslatedAttribute('excerpt',App::getLocale()) }}</p>
                                <div class="info__details details">
                                    <a class="details__link" href="{{ route('news.show',['category' => $news->category->slug,'news'=>$news->slug]) }}">{{ __('main_page.more_details') }}</a>
                                    <img class="lazyImage" data-src="{{ url('/img/svg/arrow_link.svg') }}" alt="details link">
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            @else
                <p>News not found</p>
            @endif

        </div>
    </div>
    <div class="button_place ">
        <a class="learn-more" href="{{ route('news.index','siemens-news') }}">
            <div class="circle">
                <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
            </div>
            <p class="button-text">{{ __('main_page.all_news') }}</p>
        </a>
    </div>
</section>

