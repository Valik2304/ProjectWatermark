@extends('user-cabinet.index')

@section('title', __('breadcrumbs.legal_persons') )

@section('user-cabinet')
    <div class="legal-person">
            <h2 class="legal-person__title">{{ __('breadcrumbs.legal_persons') }}</h2>
            @if(count($legal_entities) > 0)
                @foreach($legal_entities as $legal_entity)
                    <div class="legal-person__info info row">
                        <div class="info__company-name col-lg-4 col-sm-12">
                            <p class="company-name__text">{{ $legal_entity->organization_name }}</p>
                        </div>

                        <div class="info__contact-person col-lg-7 col-10">
                            <a href="{{ route('legal-person.edit',$legal_entity->id) }}">
                                    <p class="contact-person__text text">{{ $legal_entity->inn }}</p>
                                    <p class="contact-person__text">{{ $legal_entity->legal_address }}</p>
                                    <p class="contact-person__text">{{ $legal_entity->last_name . ' ' .  $legal_entity->first_name . ' '. $legal_entity->patronymic_name }}</p>
                                    <p class="contact-person__text">{{ $legal_entity->phone }}</p>
                                    <p class="contact-person__text">{{ $legal_entity->email }}</p>
                            </a>
                        </div>
                        <form class="col-lg-1 col-2" action="{{ route('legal-person.destroy',$legal_entity->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="info__times-circle">
                                <button class="times-circle__btn">
                                    <svg fill=" #e2e5e9" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18"
                                         viewBox="0 0 18 18">
                                        <path id="error_copy_2_копия" data-name="error  copy 2 копия" class="cls-1"
                                              d="M1336.01,282a9,9,0,1,1,9-9A9,9,0,0,1,1336.01,282Zm4.13-11.625a0.45,0.45,0,0,0,0-.612l-0.92-.919a0.441,0.441,0,0,0-.62,0l-2.6,2.6-2.6-2.6a0.441,0.441,0,0,0-.62,0l-0.91.919a0.431,0.431,0,0,0,0,.612l2.6,2.6-2.6,2.6a0.432,0.432,0,0,0,0,.613l0.91,0.919a0.442,0.442,0,0,0,.62,0l2.6-2.6,2.6,2.6a0.442,0.442,0,0,0,.62,0l0.92-.919a0.451,0.451,0,0,0,0-.613l-2.61-2.6Z"
                                              transform="translate(-1327 -264)"/>
                                    </svg>
                                </button>
                            </div>

                        </form>
                    </div>

                @endforeach
            @else

            @endif

            @if(session('success'))
                <div class="row row_alert_success">
                    <div class="col-sm-12 col-12">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">X</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            @if(Route::currentRouteName() == 'legal-person.edit')
                <form action="{{ route('legal-person.update',$legal_person->id) }}" method="post">
                    @method('PATCH')
            @else
                <form action="{{ route('legal-person.store') }}" method="post">
            @endif
                @csrf
                <div class="legal-person__form row">
                    <div class="form__company-name col-lg-4 col-sm-12">
                        <p class="company-name__title">{{ __('user_cabinet.legal_persons.organization') }}:</p>
                    </div>
                    <div class="form__input-info col-lg-8 col-sm-12">
                        <label for="">
                            <img class="lock__icon lazyImage" data-src="{{ url('/img/svg/lock.svg') }}" alt="">
                            <input class="@if ($errors->has('organization_name')) error_input @else success_input @endif lp_change_border" type="text" name="organization_name" placeholder="Назва*"
                                   value="{{ $legal_person->organization_name ?? old('organization_name') }}" required @if(isset($legal_person)) disabled @endif>
                            @if ($errors->has('organization_name'))
                                @foreach ($errors->get('organization_name') as $message)
                                    <span class="lp_display error_span">* {{ $message }}</span>
                                @endforeach
                            @endif
                        </label>
                        <label for="">
                            <input class="success_input lp_change_border" type="text" name="inn" placeholder="ІНН*" value="{{ $legal_person->inn ?? old('inn') }}" required>
                        </label>
                        <label for="">
                            <input  class="@if ($errors->has('legal_address')) error_input @else success_input @endif lp_change_border" type="text" name="legal_address" placeholder="Юридична адреса*"
                                    value="{{ $legal_person->legal_address ?? old('legal_address') }}" required>
                            @if ($errors->has('legal_address'))
                                @foreach ($errors->get('legal_address') as $message)
                                    <span class="lp_display error_span">* {{ $message }}</span>
                                @endforeach
                            @endif
                        </label>
                    </div>
                </div>

                <div class="legal-person__form row">
                    <div class="form__contact-person col-lg-4 col-sm-12">
                        <p class="contact-person__title">{{ __('user_cabinet.legal_persons.contact_person') }}:</p>
                    </div>
                    <div class="form__input-info col-lg-8 col-sm-12">
                        <label for="">
                            <img class="lock__icon lazyImage" data-src="{{ url('/img/svg/lock.svg') }}" alt="">
                            <input  class="@if ($errors->has('email')) error_input @else success_input @endif lp_change_border" type="email" name="email" placeholder="{{ __('placeholders.email') }}*" value="{{ $legal_person->email ?? old('email') }}" required @if(isset($legal_person)) disabled @endif>
                            @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $message)
                                    <span class="lp_display error_span">* {{ $message }}</span>
                                @endforeach
                            @endif
                        </label>
                        <label for="">
                            <input  class="@if ($errors->has('last_name')) error_input @else success_input @endif lp_change_border" type="text" name="last_name" placeholder="{{ __('placeholders.last_name') }}*" value="{{ $legal_person->last_name ?? old('last_name') }}"
                                   required>
                            @if ($errors->has('last_name'))
                                @foreach ($errors->get('last_name') as $message)
                                    <span class="lp_display error_span">* {{ $message }}</span>
                                @endforeach
                            @endif
                        </label>
                        <label for="">
                            <input  class="@if ($errors->has('first_name')) error_input @else success_input @endif lp_change_border" type="text" name="first_name" placeholder="{{ __('placeholders.first_name') }}*" value="{{ $legal_person->first_name ?? old('first_name') }}"
                                   required>
                            @if ($errors->has('first_name'))
                                @foreach ($errors->get('first_name') as $message)
                                    <span class="lp_display error_span">* {{ $message }}</span>
                                @endforeach
                            @endif
                        </label>
                        <label for="">
                            <input  class="@if ($errors->has('patronymic_name')) error_input @else success_input @endif lp_change_border" type="text" name="patronymic_name" placeholder="{{ __('placeholders.patronymic_name') }}"
                                   value="{{ $legal_person->patronymic_name ?? old('patronymic_name') }}">
                            @if ($errors->has('patronymic_name'))
                                @foreach ($errors->get('patronymic_name') as $message)
                                    <span class="lp_display error_span">* {{ $message }}</span>
                                @endforeach
                            @endif
                        </label>
                        <label for="">
                            <input  class="@if ($errors->has('phone')) error_input @else success_input @endif lp_change_border" type="text" name="phone" placeholder="{{ __('placeholders.phone') }}*" value="{{ $legal_person->phone ?? old('phone') }}" required>
                            @if ($errors->has('phone'))
                                @foreach ($errors->get('phone') as $message)
                                    <span class="lp_display error_span">* {{ $message }}</span>
                                @endforeach
                            @endif
                        </label>
                    </div>
                </div>

                <div class="legal-person__description row">
                    <div class="description__icon col-1">
                        <img class="icon__info lazyImage" data-src="{{ url('/img/svg/info_icon.svg') }}" alt="info">
                    </div>
                    <div class="description__text col-11">
                        <p class="text__text">{{ __('user_cabinet.legal_persons.help_text') }}</p>
                    </div>
                </div>

                <div class="button_place">
                    <button class="learn-more">
                        <div class="circle">
                            <img class="lazyImage" data-src="{{ url('/img/svg/right-arrow.svg') }}" alt="save button">
                        </div>
                        <p class="button-text">{{ __('user_cabinet.save') }}</p>
                    </button>
                </div>
            </form>
    </div>
        </form>
    </div>
@endsection