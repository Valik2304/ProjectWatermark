@extends('layouts.app')
@section('title', __('main_page.seo.title'))
@section('description',  __('main_page.seo.description'))

@section('content')


    @include('landing-page.components.main-slider')
    @include('landing-page.components.product_group')
    @include('landing-page.components.industry_solutions')
    @include('catalog.partners')
    @include('landing-page.components.news')
    @include('landing-page.components.connect')


@endsection

