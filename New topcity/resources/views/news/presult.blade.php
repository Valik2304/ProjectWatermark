@inject('imageService','App\Services\ImageService')
@foreach($allnews as $news)
    <div class="details_news">
        <div class="row oneNews_block">
            <div class="col-xl-4">
                <a href="{{ route('news.show',['category'=>$news->category->slug,'slug'=>$news->id]) }}">
                    <img src="{{  url($imageService->resizeImage('storage/'. $news->image,333,333,false)) }}">
                </a>
            </div>
            <div class="col-xl-8 oneNews_contentBlock">
                <div class="btn_calendar">
                    <div class="desiciton_block">{{ $news->category->getTranslatedAttribute('name',App::getLocale()) }}</div>
                    <div class="calendarData_block">
                        <i class="far fa-calendar-alt"></i>
                        <p>{{ \Carbon\Carbon::parse($news->created_at)->format('d.m.Y') }}</p>
                    </div>
                </div>
                <div class="text_button_block">
                    <div class="TexttBlock">
                        <div class="TexttBlock__link__wrap">
                            <a class="TexttBlock__link"
                               href="{{ route('news.show',['category'=>$news->category->slug,'slug'=>$news->id]) }}">{{ $news->getTranslatedAttribute('title',App::getLocale()) }}</a>
                        </div>
                        <p class="TexttBlock__text">{{ $news->getTranslatedAttribute('excerpt',App::getLocale()) }}</p>
                        @if($news->category->slug == 'discount')
                            <div class="TexttBlock__price">
                                <p class="price__old">{{ $news->product->old_price }} ₴</p>
                                <p class="price__new">{{ $news->product->price }} ₴</p>
                            </div>
                        @endif
                    </div>
                    <div class="button_block">
                        <a href="{{ route('news.show',['category'=>$news->category->slug,'slug'=>$news->id]) }}">{{ __('main_page.more_details') }} ></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach
<script src="js/modal-validate.js"></script>