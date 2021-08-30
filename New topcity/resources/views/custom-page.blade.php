@inject('imageService','App\Services\ImageService')
@extends('layouts.app')

{{--
@section('title', $title)
@section('description', $description)--}}

@section('content')
    <div itemscope itemtype="http://schema.org/Article" class="news-card">
        <div class="container">
            {{ Breadcrumbs::render(Route::currentRouteName(),$customPage) }}
            <h2 itemprop="headline name" class="news-card__title">{{ $customPage->getTranslatedAttribute('title',App::getLocale()) }}</h2>
            <div class="news-card__description clearfix">
{{--                <img itemprop="image" class="news-card__description--img img-fluid" src="{{ url($imageService->resizeImage('storage/'. $customPage->image,540,410,false)) }}" title="Изображение в статье" alt="news image">--}}
              {{--  <div class="description__wrap">
                    <a class="description__link link" href="#">
                        <span itemprop="articleSection">
--}}{{--                        {{ $customPage->category->getTranslatedAttribute('name',App::getLocale()) }}--}}{{--
                        </span>
                    </a>
                    <div class="description__date">
                        <p itemprop="datePublished" content="2019-09-12">
                            <i class="far fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($customPage->created_at)->format('d.m.Y') }}
                        </p>
                    </div>
                </div>--}}
                <div class="news-card__description--text"><span itemprop="articleBody">{!! $customPage->getTranslatedAttribute('description',App::getLocale()) !!}</span></div>
                <div itemprop="publisher " itemscope="" itemtype="http://schema.org/Organization">
                    <!-- размечаем логотип -->
                    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <link itemprop="url image" href="https://topcity.dev.devloop.pro/img/logo.png"/>
                    </div>
                    <meta itemprop="name" content="ТОВ “Топсітісервіс”">
                </div>
{{--               TODO запитати чи потрібне це тут--}}
                {{--<p class="news-card__description--text">Автор:
                    <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                        <span  itemprop="name">ТОВ “Топсітісервіс”</span>
                    </span>
                </p>--}}
            </div>
        </div>
    </div>
@endsection