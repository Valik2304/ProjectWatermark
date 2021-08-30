@inject('imageService','App\Services\ImageService')
@extends('layouts.app')


@section('title', $title)
@section('description', $description)

@section('content')
    <div itemscope itemtype="http://schema.org/Article" class="news-card">
        <div class="container">
            {{ Breadcrumbs::render(Route::currentRouteName(),$news ?? '') }}
            <h2 itemprop="headline name" class="news-card__title">{{ $news->getTranslatedAttribute('title',App::getLocale()) }}</h2>
            <div class="news-card__description clearfix">
                <img itemprop="image" class="news-card__description--img img-fluid" src="{{ url($imageService->resizeImage('storage/'. $news->image,540,410,false)) }}" title="Изображение в статье" alt="news image">
                <div class="description__wrap">
                    <a class="description__link link" href="{{ route('news.index',['category' => $news->category->slug]) }}">
                        <span itemprop="articleSection">
                        {{ $news->category->getTranslatedAttribute('name',App::getLocale()) }}
                        </span>
                    </a>
                    <div class="description__date">
                        <p itemprop="datePublished" content="2019-09-12">
                            <i class="far fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($news->created_at)->format('d.m.Y') }}
                        </p>
                    </div>
                </div>
                <div class="news-card__description--text"><span itemprop="articleBody">{!! $news->getTranslatedAttribute('description',App::getLocale()) !!}</span></div>
                <div itemprop="publisher " itemscope="" itemtype="http://schema.org/Organization">
                    <!-- размечаем логотип -->
                    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <link itemprop="url image" href="https://topcity.dev.devloop.pro/img/logo.png"/>
                    </div>
                    <meta itemprop="name" content="ТОВ “Топсітісервіс”">
                </div>
                <p class="news-card__description--text">Автор:
                    <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                        <span  itemprop="name">ТОВ “Топсітісервіс”</span>
                    </span>
                </p>
            </div>
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
@endsection
{{--<script src="js/modal-validate.js"></script>--}}