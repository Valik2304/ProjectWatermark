@inject('imageService','App\Services\ImageService')
@extends('layouts.app')

@section('title', $title )

{{--@section('description', $description )--}}

@section('content')
    <section class="news_list">
        <div class="container container_newsList">
            {{ Breadcrumbs::render(Route::currentRouteName(),$category_current ?? '') }}
            <h3 class="block_newsTitle">{{ __('general.news') }}</h3>

            <div class="block_mainMenu">

                <a href="{{ route('news.index') }}"
                   class="@if(!request()->category) punkt_menu_active @else punkt_menu @endif">
                    {{ __('All') }}
                </a>
                @foreach($newsCategories as $category)
                    <a href="{{ route('news.index',['category' => $category->slug]) }}"
                       class="@if(request()->category == $category->slug) punkt_menu_active @else punkt_menu @endif">

                        {{ $category->getTranslatedAttribute('name',App::getLocale()) }}
                    </a>
                @endforeach
            </div>
            @if(count($allnews)>0)
                @foreach($allnews as $news)
                    <div class="details_news">
                        <div class="row oneNews_block">
                            <div class="col-xl-4">
                                <a href="{{ route('news.show',['category'=>$news->category->slug,'slug'=>$news->slug]) }}">
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
                                               href="{{ route('news.show',['category'=>$news->category->slug,'slug'=>$news->slug]) }}">{{ \Illuminate\Support\Str::limit($news->getTranslatedAttribute('title',App::getLocale(),80,'...')) }}</a>
                                        </div>
                                        <p class="TexttBlock__text">{{ $news->getTranslatedAttribute('excerpt',App::getLocale()) }}</p>
                                        @if($news->category->slug == 'discount' && isset($news->product))
                                            <div class="TexttBlock__price">
                                                <p class="price__old">{{ $news->product->old_price }} ₴</p>
                                                <p class="price__new">{{ $news->product->price }} ₴</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="button_block">
                                        <a href="{{ route('news.show',['category'=>$news->category->slug,'slug'=>$news->slug]) }}">{{ __('main_page.more_details') }} ></a>
                                        <div class="button_share_soc">
                                            <p>{{ __('main_page.share') }}:</p>
                                            <a href="{{ getFacebookShareLink(route('news.show',['category'=>$news->category->slug,'slug'=>$news->slug])) }}">
                                                <svg class="social__fb" fill="#00a3d4" width="15px" height="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
                                                <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064 c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996 V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545 C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703 c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"/>
                                            </svg>
                                            </a>
                                            <a href="{{ getTwitterShareLink(route('news.show',['category'=>$news->category->slug,'slug'=>$news->slug])) }}" class="social__link">
                                                <svg class="social__inst" fill="#00a3d4" width="15px" height="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                     viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                                        c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                                        c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                                        c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                                        c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                                        c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                                        C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                                        C480.224,136.96,497.728,118.496,512,97.248z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                    <div class="my_id"></div>
                    <div class="row justify-content-center mt-4">{{ $allnews->onEachSide(3)->links() }}</div>
                    <div class="button_place btn_place_news">
                        <a id="news_button" href="{{ $link }}" class="learn-more">
                            <div class="circle">
                                <img src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                            </div>
                            <p class="button-text">{{ __('general.more') }}</p>
                        </a>
                    </div>
            @else

            @endif
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            // проверка нужна ли кнопка "показать больше"
            let button = document.getElementById('news_button');
            let conditional = button.getAttribute('href');
            if (!conditional) {
                button.hidden = true;
            }

        });

    </script>
    <script>
        $("#news_button").click(function (event) {
            event.preventDefault();
            this.disabled = true;
            url = this.getAttribute('href');
            console.log(url);
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {"_token": "{{ csrf_token() }}"},

                success: function (data) {
                    console.log(data);
                    $(data['body']).insertBefore(".my_id");
                    let button = document.getElementById('news_button');
                    let allA =$('.pagination li').find("a");
                    $.each(allA,function(index,item){
                        /*console.log(data['next']);
                        console.log($(item).attr("href"));*/
                        // console.log('----');
                        if(url == $(item).attr("href")) {
                            console.log($(item).attr("href"));
                            $(item).parent().addClass('active active-pagination-link');
                            $(item).replaceWith(function(){
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
@endpush