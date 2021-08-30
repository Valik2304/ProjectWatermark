@inject('imageService','App\Services\ImageService')
@extends('layouts.app')

@section('title', __('about_us.seo.title'))
@section('description',  __('about_us.seo.description'))

@section('content')
    <div class="about-us">
        <div class="container about-company">
            {{ Breadcrumbs::render(Route::currentRouteName()) }}
            <h2 class="about-us__description--title">{{ $about->name ?? 'Name Company'}}</h2>
            <div class="about-us__description">
                <img class="about-us__description--img lazyImage"
                     data-src="{{ isset($about) ? url($imageService->resizeImage('storage/'.$about->image,350,350)) :  url('/img/no-image.png') }}"
                     alt="image not found">
                <div class="about-us__description--text">
                    {!! $about->description ?? 'Description' !!}
                </div>

                <div class=" carousel slide about_us_slider" data-ride="carousel">
                    <div class="carousel-inner">
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="" aria-hidden="true">
                                <svg class="slider__btn-left" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="16"
                                     height="30" viewBox="0 0 16 30"><g><g><path
                                                    d="M.278 14.401L14.538.25a.857.857 0 0 1 1.21 0 .842.842 0 0 1 0 1.2L2.096 15l13.652 13.548a.842.842 0 0 1 0 1.201.864.864 0 0 1-.602.252.837.837 0 0 1-.602-.252L.284 15.596a.84.84 0 0 1-.006-1.195z"/></g></g></svg>
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="" aria-hidden="true">
                                <svg class="slider__btn-right" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="16"
                                     height="30" viewBox="0 0 16 30"><g><g><path
                                                    d="M15.753 14.401L1.493.25a.857.857 0 0 0-1.21 0 .842.842 0 0 0 0 1.2L13.935 15 .283 28.547a.842.842 0 0 0 0 1.201.864.864 0 0 0 .602.252.837.837 0 0 0 .602-.252l14.26-14.152a.84.84 0 0 0 .006-1.195z"/></g></g></svg>
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="container">
                        <div class="responsive partners__carousel3">
                            @foreach($slider_url as $slide)
                                @if($slide->image)
                                    <div>
                                        <img src="{{asset('storage/'.$slide->image) }}"
                                             alt="partners" class="img-fluid contrast lazyImage">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>


                <img class="about-us__description--img-mobile lazyImage"
                     data-src="{{ isset($about) ? url($imageService->resizeImage('storage/'.$about->image,350,350)) :  url('/img/no-image.png') }}"
                     alt="image not found">
            </div>
        </div>
        <div class="our-team">
            <div class="container">
                <h2 class="our-team__title">{{ __('about_us.Our_team') }}</h2>
                <div class="row about-us__our-team slick__mobile js-team-member-appends">
                    @if(count($team_members) > 0)
                        @foreach($team_members as $member)
                            <div class="col-lg-4 col-md-6 col-sm-12 about-us__our-team-margin">
                                <div class="our-team__card card">
                                    <img class="card-img-top lazyImage"
                                         data-src="{{ url($imageService->resizeImage('storage/'.$member->image,350,350)) }}"
                                         alt="image not found">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $member->name }}</h5>
                                        <p class="card-text">{{ $member->position }}</p>
                                        <p class="card-text card-experience">{{ $member->description }}</p>
                                        <p class="card-text card-mail">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11"
                                                 viewBox="0 0 14 11">
                                                <g>
                                                    <g>
                                                        <path fill="#00a3d4"
                                                              d="M.43 2.486C.143 2.103 0 1.748 0 1.42 0 1.013.108.675.324.403.54.133.85-.003 1.25-.003h11.5c.338 0 .631.122.879.368.247.244.37.54.37.883 0 .411-.127.804-.382 1.18a3.703 3.703 0 0 1-.953.96l-3.656 2.54-.332.238a8.376 8.376 0 0 1-.828.551 2.404 2.404 0 0 1-.45.212c-.14.046-.27.07-.39.07h-.016c-.12 0-.25-.024-.39-.07a2.408 2.408 0 0 1-.45-.212 8.445 8.445 0 0 1-.828-.55l-.332-.239c-.474-.333-1.156-.809-2.047-1.426a319.28 319.28 0 0 1-1.601-1.113 3.878 3.878 0 0 1-.914-.903zM14 3.544V9.75c0 .344-.122.639-.367.883-.245.245-.54.368-.883.368H1.25c-.344 0-.638-.123-.883-.368A1.204 1.204 0 0 1 0 9.75V3.544c.23.256.492.483.789.68 1.885 1.282 3.18 2.181 3.883 2.697.297.219.538.39.722.511.185.123.431.248.739.376.307.127.593.191.859.191h.016c.266 0 .552-.064.86-.191.307-.128.552-.253.737-.376.185-.122.426-.292.723-.511.885-.641 2.182-1.54 3.89-2.696.298-.203.558-.43.782-.68z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                            {{ $member->email }}
                                        </p>
                                        <p class="card-text card-mail">
                                            <img style="display: inline-block; margin-right: 5px;" src="{{ url('/img/svg/footer/footer-item__phone.svg') }}" width="15px" alt="phone">{{ $member->phone }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        @endforeach


                    @else
                        {{ __('about_us.team_members_null') }}

                    @endif

                </div>
            </div>

        </div>

        <div class="container">
            <div class="row about-us__jobs">
                <h2 class="about-us__jobs--title">{{ __('about_us.Vacancies') }}</h2>
                @if($vacancies->count() > 0)
                    @foreach($vacancies as $vacancy)
                        <div class="col-12">
                            <div class="jobs__card card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img class="card-img-top img-fluid lazyImage"
                                             data-src="{{ url($imageService->resizeImage('storage/'.$vacancy->image,369,369)) }}"
                                             alt="image not found">
                                    </div>
                                    <div class="card-body col-md-8">
                                        <div class="">
                                            <div class="card-title">
                                                <h5>{{ $vacancy->name }}</h5>
                                                <h6>₴{{ $vacancy->price }}</h6>
                                            </div>
                                            <div class="card-address">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15"
                                                     viewBox="0 0 12 15">
                                                    <g>
                                                        <g>
                                                            <path fill="#00a3d4"
                                                                  d="M12 5.522c0 .793-.177 1.552-.525 2.254-1.5 3.021-4.376 6.21-5.222 7.116a.345.345 0 0 1-.253.106.345.345 0 0 1-.253-.106C4.9 13.986 2.025 10.796.525 7.776A5.029 5.029 0 0 1 0 5.522C0 2.477 2.692 0 6 0s6 2.477 6 5.522zm-2.884 0C9.116 3.94 7.718 2.653 6 2.653c-1.719 0-3.117 1.287-3.117 2.869C2.883 7.103 4.281 8.39 6 8.39c1.718 0 3.116-1.287 3.116-2.868z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <p>{{ $vacancy->address }}</p>
                                            </div>
                                            <div class="card-experience row">
                                                <div class="experience__item col-lg-4 col-md-4 col-sm-12 col-12">

                                                    <svg version="1.1" id="Capa_1" width="15" height="15" fill="#00a3d4"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;"
                                                         xml:space="preserve">
                                                <path d="M54,58h-3v-4h-5V43.778c0-2.7-1.342-5.208-3.589-6.706L31.803,30l10.608-7.072C44.658,21.43,46,18.922,46,16.222V6h5V2h3
                                                    c0.552,0,1-0.447,1-1s-0.448-1-1-1h-3h-1H10H9H6C5.448,0,5,0.447,5,1s0.448,1,1,1h3v4h5v10.222c0,2.7,1.342,5.208,3.589,6.706
                                                    L28.197,30l-10.608,7.072C15.342,38.57,14,41.078,14,43.778V54H9v4H6c-0.552,0-1,0.447-1,1s0.448,1,1,1h3h1h40h1h3
                                                    c0.552,0,1-0.447,1-1S54.552,58,54,58z M11,4V2h38v2h-3H14H11z M18.698,21.264C17.009,20.137,16,18.252,16,16.222V6h28v10.222
                                                    c0,2.03-1.009,3.915-2.698,5.042L30,28.798L18.698,21.264z M16,43.778c0-2.03,1.009-3.915,2.698-5.042L30,31.202l11.302,7.534
                                                    C42.991,39.863,44,41.748,44,43.778V54H16V43.778z M11,56h3h32h3v2H11V56z"/>
                                                        <path d="M20.917,17.936C20.343,17.553,20,16.912,20,16.222V14c0-0.553-0.448-1-1-1s-1,0.447-1,1v2.222
                                                    c0,1.361,0.676,2.624,1.808,3.378l4.638,3.092c0.17,0.113,0.363,0.168,0.554,0.168c0.323,0,0.64-0.156,0.833-0.445
                                                    c0.306-0.46,0.182-1.08-0.277-1.387L20.917,17.936z"/>
                                                        <path d="M40.192,41.26l-4.638-3.092c-0.46-0.307-1.08-0.183-1.387,0.277c-0.306,0.46-0.182,1.08,0.277,1.387l4.638,3.092
                                                    C39.657,43.307,40,43.947,40,44.638v2.222c0,0.553,0.448,1,1,1s1-0.447,1-1v-2.222C42,43.276,41.324,42.014,40.192,41.26z"/>
                                            </svg>

                                                    <p>{{ $vacancy->work_time }}</p>
                                                </div>
                                                <div class="experience__item col-lg-4 col-md-4 col-sm-12 col-12">
                                                    <svg version="1.1" id="Layer_1" width="15" height="15"
                                                         fill="#00a3d4"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 512 512"
                                                         style="enable-background:new 0 0 512 512;"
                                                         xml:space="preserve">
                                                    <path d="M506.555,208.064L263.859,30.367c-4.68-3.426-11.038-3.426-15.716,0L5.445,208.064
                                                        c-5.928,4.341-7.216,12.665-2.875,18.593s12.666,7.214,18.593,2.875L256,57.588l234.837,171.943c2.368,1.735,5.12,2.57,7.848,2.57
                                                        c4.096,0,8.138-1.885,10.744-5.445C513.771,220.729,512.483,212.405,506.555,208.064z"/>
                                                        <path d="M442.246,232.543c-7.346,0-13.303,5.956-13.303,13.303v211.749H322.521V342.009c0-36.68-29.842-66.52-66.52-66.52
                                                        s-66.52,29.842-66.52,66.52v115.587H83.058V245.847c0-7.347-5.957-13.303-13.303-13.303s-13.303,5.956-13.303,13.303v225.053
                                                        c0,7.347,5.957,13.303,13.303,13.303h133.029c6.996,0,12.721-5.405,13.251-12.267c0.032-0.311,0.052-0.651,0.052-1.036v-128.89
                                                        c0-22.009,17.905-39.914,39.914-39.914s39.914,17.906,39.914,39.914v128.89c0,0.383,0.02,0.717,0.052,1.024
                                                        c0.524,6.867,6.251,12.279,13.251,12.279h133.029c7.347,0,13.303-5.956,13.303-13.303V245.847
                                                        C455.549,238.499,449.593,232.543,442.246,232.543z"/>
                                            </svg>

                                                    <p>{{ $vacancy->type }}</p>
                                                </div>
                                                <div class="experience__item col-lg-4 col-md-4 col-sm-12 col-12">
                                                    <svg version="1.1" id="Capa_1" width="15" height="15" fill="#00a3d4"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;"
                                                         xml:space="preserve">
                                                <path d="M56.99,13.5H55v-3H45v3h-4V7.706C41,5.938,39.562,4.5,37.794,4.5H22.206C20.438,4.5,19,5.938,19,7.706V13.5h-4v-3H5v3H3.01
                                                    C1.351,13.5,0,14.851,0,16.51v35.98c0,1.659,1.351,3.01,3.01,3.01h53.98c1.659,0,3.01-1.351,3.01-3.01V16.51
                                                    C60,14.851,58.649,13.5,56.99,13.5z M47,12.5h6v1h-6V12.5z M21,7.706C21,7.041,21.541,6.5,22.206,6.5h15.588
                                                    C38.459,6.5,39,7.041,39,7.706V13.5H21V7.706z M19,15.5h22h4h5v38H10v-38h5H19z M7,12.5h6v1H7V12.5z M2,52.49V16.51
                                                    c0-0.557,0.453-1.01,1.01-1.01H5h3v38H3.01C2.453,53.5,2,53.047,2,52.49z M58,52.49c0,0.557-0.453,1.01-1.01,1.01H52v-38h3h1.99
                                                    c0.557,0,1.01,0.453,1.01,1.01V52.49z"/>
                                            </svg>
                                                    <p>{{ $vacancy->experience }}</p>
                                                </div>
                                            </div>
                                            <p class="card-text">
                                                {{ $vacancy->description }}
                                            </p>
                                            <div class="card-buttons button_place">
                                                <a href="mailto:logistic@topsity.com.ua" class="learn-more">
                                                    <div class="circle">
                                                        <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                                                    </div>
                                                    <p class="button-text">{{ __('about_us.sent_cv') }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="col-12  тш">{{ __('about_us.vacancies_null') }}</div>
                @endif

            </div>
        </div>

    </div>

@endsection