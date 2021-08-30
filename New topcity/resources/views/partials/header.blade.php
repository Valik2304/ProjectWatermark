@inject('languages','App\Services\LangService')
<header class="header">
    <div class="container">
        @include('partials.modal_quick-order')
        @include('partials.modal_zip')
        <div class="row">
            <div class="header__logo logo col-xl-4 col-lg-4 col-md-3 col-sm-4 col-4 ">
                <a href="{{ $languages->getLangUrl('/') }}"><img itemprop="image" class="logo__image" src="{{ asset('/img/svg/logo.svg') }}" alt=""></a>
                <p class="logo__text">{{ __('general.Official_distributor_Siemens') }}</p>
            </div>

            <div class="header__search search col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">

                <form  action="{{ route('shop.search') }}" method="GET" id="header__search" class="header-search__form" style="position: absolute">

                    <span class="search-tooltip__wrap">
                        <img class="search__info" src="{{ url('/img/svg/info_icon.svg') }}" alt="">
                        <div class="search-tooltip">
                            <h2 class="tooltip__title">{{ __('header.how_to_search') }}</h2>
                                <p class="tooltip__text">{{ __('header.how_to_search_block_text') }}</p>
                        </div>
                    </span>

                    <textarea name="query" id="query" type="search" class="search__input js-textarea" placeholder="{{ __('placeholders.search') }}" required>{{ request()->input('query') }}</textarea>


                    <button class="search__button" type="submit">
                        <svg id="search__icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#252525" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                            <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"/>
                        </svg>
                    </button>
                    <div class="reference_checkbox">
                        <input type="checkbox" id="checkbox" name="checkbox">
                        <label for="checkbox">{{ __('header.search_checkbox_text') }}</label>
                    </div>
                </form>
                <div class="load load-header js-loader-more-button" >
                    <hr/>
                    <hr/>
                    <hr/>
                    <hr/>
                </div>

            </div>

            <div class="header__buttons buttons col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4 ">
                <div class="buttons__dropdown dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        {{ $languages->getCurrentLang() == 'uk'? 'ua' : $languages->getCurrentLang() }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($languages->getLanguages() as $lang)
                            <a class="dropdown-item" href="{{ route('setlocale', ['lang' => $lang]) }}">{{ $lang == 'uk'?'ua':$lang }}</a>
                        @endforeach
                    </div>
                </div>

                <a  class="buttons__user user" @guest id="user_button"  data-toggle="modal" data-target="#exampleModalCenter"  @else href="{{ route('users.edit') }}"@endguest >
                    <svg class="user__image" fill="#252525" width="15px" height="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
		                <path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148 C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962 c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216 h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40 c59.551,0,108,48.448,108,108S315.551,256,256,256z"/>
                    </svg>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            @include('auth.login-modal')

                            @include('auth.register-modal')

                            <div class="register-complete">
                                <h2 class="register-complete__title">Дякуємо за реєстрацію</h2>
                                <p class="register-complete__text">Дані про реєстрацію надіслані Ваш на пошту </p>
                            </div>

                            @include('auth.passwords.email-modal')
                        </div>
                    </div>
                </div>
                {{--@if(Route::currentRouteName() != 'checkout')--}}
                    <div id="app">
                        <shop-cart ref="cart" ajax_url = "{{ route('cart.index') }}" count = "{{ cartCount()  }}" translations = "{{ json_encode(__('cart')) }}"></shop-cart>
                    </div>
{{--                @endif--}}
                @guest
                @else
                    <a class="buttons__exit exit" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <svg class="exit__image" fill="#252525" width="15px" height="15px" viewBox="0 0 512.016 512" xmlns="http://www.w3.org/2000/svg"><path d="m496 240.007812h-202.667969c-8.832031 0-16-7.167968-16-16 0-8.832031 7.167969-16 16-16h202.667969c8.832031 0 16 7.167969 16 16 0 8.832032-7.167969 16-16 16zm0 0"/><path d="m416 320.007812c-4.097656 0-8.191406-1.558593-11.308594-4.691406-6.25-6.253906-6.25-16.386718 0-22.636718l68.695313-68.691407-68.695313-68.695312c-6.25-6.25-6.25-16.382813 0-22.632813 6.253906-6.253906 16.386719-6.253906 22.636719 0l80 80c6.25 6.25 6.25 16.382813 0 22.632813l-80 80c-3.136719 3.15625-7.230469 4.714843-11.328125 4.714843zm0 0"/><path d="m170.667969 512.007812c-4.566407 0-8.898438-.640624-13.226563-1.984374l-128.386718-42.773438c-17.46875-6.101562-29.054688-22.378906-29.054688-40.574219v-384c0-23.53125 19.136719-42.6679685 42.667969-42.6679685 4.5625 0 8.894531.6406255 13.226562 1.9843755l128.382813 42.773437c17.472656 6.101563 29.054687 22.378906 29.054687 40.574219v384c0 23.53125-19.132812 42.667968-42.664062 42.667968zm-128-480c-5.867188 0-10.667969 4.800782-10.667969 10.667969v384c0 4.542969 3.050781 8.765625 7.402344 10.28125l127.785156 42.582031c.917969.296876 2.113281.46875 3.480469.46875 5.867187 0 10.664062-4.800781 10.664062-10.667968v-384c0-4.542969-3.050781-8.765625-7.402343-10.28125l-127.785157-42.582032c-.917969-.296874-2.113281-.46875-3.476562-.46875zm0 0"/><path d="m325.332031 170.675781c-8.832031 0-16-7.167969-16-16v-96c0-14.699219-11.964843-26.667969-26.664062-26.667969h-240c-8.832031 0-16-7.167968-16-16 0-8.832031 7.167969-15.9999995 16-15.9999995h240c32.363281 0 58.664062 26.3046875 58.664062 58.6679685v96c0 8.832031-7.167969 16-16 16zm0 0"/><path d="m282.667969 448.007812h-85.335938c-8.832031 0-16-7.167968-16-16 0-8.832031 7.167969-16 16-16h85.335938c14.699219 0 26.664062-11.96875 26.664062-26.667968v-96c0-8.832032 7.167969-16 16-16s16 7.167968 16 16v96c0 32.363281-26.300781 58.667968-58.664062 58.667968zm0 0"/></svg>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>
</header>
<section class="navigation">
    <div class="container">
        <div class="row">
            <nav class="navigation__nav nav col-xl-8 col-lg-8 col-md-9">
                <a class="nav__item" href="{{ route('about.index') }}">{{ __('general.about_us') }}</a>
                <a class="nav__item" href="{{ route('shop.index') }}">{{ __('general.catalog') }}</a>
                <a class="nav__item" href="{{ route('news.industry_solutions') }}">{{ __('general.industry_solutions') }}</a>
                <a class="nav__item" href="{{ route('news.index') }}">{{ __('general.news') }}</a>
                <a class="nav__item" href="{{ route('shop.show',['category'=>'sklad']) }}">{{ __('general.stock') }}</a>
                <a class="nav__item" href="{{ route('landing-page') }}#contacts-footer" >{{ __('general.contacts') }}</a>
            </nav>
            <div class="col-xl-2 col-lg-2 col-md-2 navigation__empty"></div>
            <div class="navigation__social social col-xl-2 col-lg-2 col-md-3 ">

                <a href="https://www.linkedin.com/company/29121314" target="_blank" class="social__link">
                    <svg class="social__lk" fill="#00a3d4" width="15px" height="15px" viewBox="-8 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m111.398438 160.664062h-96.398438c-8.285156 0-15 6.71875-15 15v321.335938c0 8.285156 6.714844 15 15 15h96.398438c8.285156 0 15-6.714844 15-15v-321.335938c0-8.28125-6.714844-15-15-15zm0 0"/>
                        <path d="m63.203125 0c-34.851563 0-63.203125 28.351562-63.203125 63.195312 0 34.851563 28.351562 63.199219 63.203125 63.199219 34.847656 0 63.195313-28.351562 63.195313-63.199219 0-34.84375-28.347657-63.195312-63.195313-63.195312zm0 0"/>
                        <path d="m352.410156 158.542969c-22.800781 0-45.273437 5.496093-65.398437 15.777343-.683594-7.652343-7.109375-13.65625-14.941407-13.65625h-96.40625c-8.28125 0-15 6.71875-15 15v321.335938c0 8.285156 6.71875 15 15 15h96.40625c8.285157 0 15-6.714844 15-15v-176.734375c0-22.734375 18.496094-41.230469 41.234376-41.230469 22.730468 0 41.226562 18.496094 41.226562 41.230469v176.734375c0 8.285156 6.71875 15 15 15h96.402344c8.285156 0 15-6.714844 15-15v-194.933594c0-79.140625-64.382813-143.523437-143.523438-143.523437zm0 0"/>
                    </svg>
                </a>

                <a href="https://www.facebook.com/Topsityservis" target="_blank" class="social__link">
                    <svg class="social__fb" fill="#00a3d4" width="15px" height="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
                        <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064 c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996 V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545 C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703 c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"/>
                    </svg>
                </a>

                <a href="https://www.youtube.com/channel/UCtMRU6n49QQm7EkKPSzWPjQ" target="_blank" class="social__link">
                    <svg class="social__yt" fill="#00a3d4" width="15px" height="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
                        <path id="XMLID_823_" d="M297.917,64.645c-11.19-13.302-31.85-18.728-71.306-18.728H83.386c-40.359,0-61.369,5.776-72.517,19.938 C0,79.663,0,100.008,0,128.166v53.669c0,54.551,12.896,82.248,83.386,82.248h143.226c34.216,0,53.176-4.788,65.442-16.527 C304.633,235.518,310,215.863,310,181.835v-53.669C310,98.471,309.159,78.006,297.917,64.645z M199.021,162.41l-65.038,33.991 c-1.454,0.76-3.044,1.137-4.632,1.137c-1.798,0-3.592-0.484-5.181-1.446c-2.992-1.813-4.819-5.056-4.819-8.554v-67.764 c0-3.492,1.822-6.732,4.808-8.546c2.987-1.814,6.702-1.938,9.801-0.328l65.038,33.772c3.309,1.718,5.387,5.134,5.392,8.861 C204.394,157.263,202.325,160.684,199.021,162.41z"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com/topsityservis/" target="_blank" class="social__link">
                    <svg class="social__inst" fill="#00a3d4" width="15px" height="15px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m75 512h362c41.355469 0 75-33.644531 75-75v-362c0-41.355469-33.644531-75-75-75h-362c-41.355469 0-75 33.644531-75 75v362c0 41.355469 33.644531 75 75 75zm-45-437c0-24.8125 20.1875-45 45-45h362c24.8125 0 45 20.1875 45 45v362c0 24.8125-20.1875 45-45 45h-362c-24.8125 0-45-20.1875-45-45zm0 0"/>
                        <path d="m256 391c74.4375 0 135-60.5625 135-135s-60.5625-135-135-135-135 60.5625-135 135 60.5625 135 135 135zm0-240c57.898438 0 105 47.101562 105 105s-47.101562 105-105 105-105-47.101562-105-105 47.101562-105 105-105zm0 0"/>
                        <path d="m406 151c24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45 20.1875 45 45 45zm0-60c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"/>
                    </svg>
                </a>
                <a href="https://twitter.com/topsityservis" target="_blank" class="social__link">
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
</section>

<section class="navigation-mobile">
    <nav id="nav-mobile">
        <input type="checkbox" id="nav" class="hidden">
        <label for="nav" class="nav-btn">
            <i></i>
            <i></i>
            <i></i>
        </label>
        <div class="nav-wrapper">
            <ul>
                <li><a class="nav__item" href="{{ route('about.index') }}">{{ __('general.about_us') }}</a></li>
                <li><a class="nav__item" href="{{ route('shop.index') }}">{{ __('general.catalog') }}</a></li>
                <li><a class="nav__item" href="{{ route('news.industry_solutions') }}">{{ __('general.industry_solutions') }}</a></li>
                <li><a class="nav__item" href="{{ route('news.index') }}">{{ __('general.news') }}</a></li>
                <li><a class="nav__item" href="{{ route('shop.show',['category'=>'sklad']) }}">{{ __('general.stock') }}</a></li>
                <li><a class="nav__item" href="{{ route('landing-page') }}#contacts-footer" >{{ __('general.contacts') }}</a></li>
            </ul>

            <div class="navigation-mobile__social social">

                <a href="https://www.linkedin.com" target="_blank" class="social__link">
                    <svg class="social__lk" fill="#ffffff" width="15px" height="15px" viewBox="-8 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m111.398438 160.664062h-96.398438c-8.285156 0-15 6.71875-15 15v321.335938c0 8.285156 6.714844 15 15 15h96.398438c8.285156 0 15-6.714844 15-15v-321.335938c0-8.28125-6.714844-15-15-15zm0 0"/>
                        <path d="m63.203125 0c-34.851563 0-63.203125 28.351562-63.203125 63.195312 0 34.851563 28.351562 63.199219 63.203125 63.199219 34.847656 0 63.195313-28.351562 63.195313-63.199219 0-34.84375-28.347657-63.195312-63.195313-63.195312zm0 0"/>
                        <path d="m352.410156 158.542969c-22.800781 0-45.273437 5.496093-65.398437 15.777343-.683594-7.652343-7.109375-13.65625-14.941407-13.65625h-96.40625c-8.28125 0-15 6.71875-15 15v321.335938c0 8.285156 6.71875 15 15 15h96.40625c8.285157 0 15-6.714844 15-15v-176.734375c0-22.734375 18.496094-41.230469 41.234376-41.230469 22.730468 0 41.226562 18.496094 41.226562 41.230469v176.734375c0 8.285156 6.71875 15 15 15h96.402344c8.285156 0 15-6.714844 15-15v-194.933594c0-79.140625-64.382813-143.523437-143.523438-143.523437zm0 0"/>
                    </svg>
                </a>

                <a href="https://www.facebook.com" target="_blank" class="social__link">
                    <svg class="social__fb" fill="#ffffff" width="15px" height="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
                        <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064 c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996 V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545 C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703 c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"/>
                    </svg>
                </a>

                <a href="https://www.youtube.com" target="_blank" class="social__link">
                    <svg class="social__yt" fill="#ffffff" width="15px" height="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 310 310" style="enable-background:new 0 0 310 310;" xml:space="preserve">
                        <path id="XMLID_823_" d="M297.917,64.645c-11.19-13.302-31.85-18.728-71.306-18.728H83.386c-40.359,0-61.369,5.776-72.517,19.938 C0,79.663,0,100.008,0,128.166v53.669c0,54.551,12.896,82.248,83.386,82.248h143.226c34.216,0,53.176-4.788,65.442-16.527 C304.633,235.518,310,215.863,310,181.835v-53.669C310,98.471,309.159,78.006,297.917,64.645z M199.021,162.41l-65.038,33.991 c-1.454,0.76-3.044,1.137-4.632,1.137c-1.798,0-3.592-0.484-5.181-1.446c-2.992-1.813-4.819-5.056-4.819-8.554v-67.764 c0-3.492,1.822-6.732,4.808-8.546c2.987-1.814,6.702-1.938,9.801-0.328l65.038,33.772c3.309,1.718,5.387,5.134,5.392,8.861 C204.394,157.263,202.325,160.684,199.021,162.41z"/>
                    </svg>
                </a>

                <a href="https://www.instagram.com" target="_blank" class="social__link">
                    <svg class="social__inst" fill="#ffffff" width="15px" height="15px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m75 512h362c41.355469 0 75-33.644531 75-75v-362c0-41.355469-33.644531-75-75-75h-362c-41.355469 0-75 33.644531-75 75v362c0 41.355469 33.644531 75 75 75zm-45-437c0-24.8125 20.1875-45 45-45h362c24.8125 0 45 20.1875 45 45v362c0 24.8125-20.1875 45-45 45h-362c-24.8125 0-45-20.1875-45-45zm0 0"/>
                        <path d="m256 391c74.4375 0 135-60.5625 135-135s-60.5625-135-135-135-135 60.5625-135 135 60.5625 135 135 135zm0-240c57.898438 0 105 47.101562 105 105s-47.101562 105-105 105-105-47.101562-105-105 47.101562-105 105-105zm0 0"/>
                        <path d="m406 151c24.8125 0 45-20.1875 45-45s-20.1875-45-45-45-45 20.1875-45 45 20.1875 45 45 45zm0-60c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0"/>
                    </svg>
                </a>
                <a href="https://twitter.com/topsityservis" target="_blank">
                    <svg fill="#ffffff" width="15px" height="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
    </nav>

</section>
