@inject('imageService','App\Services\ImageService')
<section class="slider">
    <div class="container">
        <div class="row">
            {{--<div class="slider__wraper col-xl-5">
                <div class="wrapper">
                    @foreach($sliders as $slider)
                        <h2 class="slider__title @if($loop->first) title__active @endif">{{ $slider->getTranslatedAttribute('title',App::getLocale()) }}</h2>
                    @endforeach
                </div>

                <div class="button_place ">
                @foreach($sliders as $slider)

                        <a class="learn-more learn-more_slider slider__more @if($loop->first)slider__more--active @endif" href="{{ $slider->link }}">
                            <div class="circle">
                                <img src="{{ url('/img/svg/right-arrow_black.svg') }}" alt="save button">
                            </div>
                            <p class="button-text">{{ __('main_page.go') }}</p>
                        </a>

                    @endforeach
                </div>
            </div>
            <div class="slider__item col-xl-7">
                <ul class="item__items product-list">
                    @foreach($sliders as $slider)
                        <li @if($loop->first) class="product-item product--active" style="display: block"
                            @else class="product-item"@endif><img
                                    class="img-fluid lazyImage"
                                    data-src="{{ url($imageService->resizeImage('storage/'.$slider->image,665,416)) }}"
                                    alt="">
                        </li>
                    @endforeach
                </ul>
            </div>--}}
            <div class="col-12">
                <div class="single-item">
                    @foreach($sliders as $slider)
                        <a href="{{ $slider->link }}">
                            <img class="img-fluid lazyImage"
                                 @if($slider->{'image_' . app()->getLocale()})
                                    data-src="{{ url('storage/'.  $slider->{'image_' . app()->getLocale()}) }}"
                                 @else
                                    data-src="{{ url('storage/'.  $slider->image ) }}"
                                 @endif

                                 alt="{{ $slider->getTranslatedAttribute('title',App::getLocale()) }}">
                        </a>


                    @endforeach
                </div>

            </div>


            {{--<ul class="slider__dots">
                @foreach($sliders as $count)
                    <li>
                        <a>
                            <svg id="slide{{$loop->index+1}}" class="dots__item  @if($loop->first)active__dot @endif" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                <circle data-name="Ellipse 2 copy" class="cls-2" cx="7" cy="7" r="4"/>
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>--}}
        </div>
    </div>
    <div class="circle__small"></div>
    {{--<div class="circle__big"></div>--}}
</section>