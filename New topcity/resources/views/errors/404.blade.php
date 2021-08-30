@extends('layouts.app')

@section('title', __('404.title'))
@section('content')
    <div class="container">
        <div class="page-not-found">
            <p class="page-not-found__title">404</p>
            <p class="page-not-found__text">{{ __('404.message')  }}</p>
        </div>
    </div>
@endsection

