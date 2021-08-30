@extends('layouts.app')

@section('title', __('cart.empty') )

@section('content')
    <div class="container">
        <div class="page-not-found">
            <p class="page-not-found__text">{{ __('cart.empty')  }}</p>
        </div>
    </div>
@endsection