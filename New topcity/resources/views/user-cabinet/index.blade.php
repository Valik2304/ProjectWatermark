@extends('layouts.app')

@section('title', __('breadcrumbs.my_cabinet'))
@section('content')



    <section class="user-profile">
        <div class="container">
            {{ Breadcrumbs::render(Route::currentRouteName()) }}
            <div class="row">
                <a id="button__user-profile" class="button button__user-profile col-sm-12" href="#">
                    {{ __('breadcrumbs.my_cabinet') }}
                </a>
                <div id="user-profile__account" class="user-profile__account account col-lg-3  col-md-12">
                    <h2 class="account__title">{{ __('breadcrumbs.my_cabinet') }}</h2>
                    {{ menu('user-cabinet','user-cabinet.nav') }}
                </div>
                <div class="col-lg-8 col-sm-12 offset-lg-1">@yield('user-cabinet')</div>


            </div>
        </div>
    </section>

@endsection