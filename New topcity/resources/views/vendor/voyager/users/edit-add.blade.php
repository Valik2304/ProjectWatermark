@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                        {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">{{ __('voyager::generic.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="{{ __('voyager::generic.name') }}"
                                       value="{{ $dataTypeContent->name ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="+380"
                                       value="{{ $dataTypeContent->phone ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('voyager::generic.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="{{ __('voyager::generic.email') }}"
                                       value="{{ $dataTypeContent->email ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                @if(isset($dataTypeContent->password))
                                    <br>
                                    <small>{{ __('voyager::profile.password_hint') }}</small>
                                @endif
                                <input type="password" class="form-control" id="password" name="password" value=""
                                       autocomplete="new-password">
                            </div>

                            @can('editRoles', $dataTypeContent)
                                <div class="form-group">
                                    <label for="default_role">{{ __('voyager::profile.role_default') }}</label>
                                    @php
                                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};

                                        $row     = $dataTypeRows->where('field', 'user_belongsto_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                                <div class="form-group">
                                    <label for="additional_roles">{{ __('voyager::profile.roles_additional') }}</label>
                                    @php
                                        $row     = $dataTypeRows->where('field', 'user_belongstomany_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                            @endcan
                            @php
                                if (isset($dataTypeContent->locale)) {
                                    $selected_locale = $dataTypeContent->locale;
                                } else {
                                    $selected_locale = config('app.locale', 'en');
                                }

                            @endphp
                            <div class="form-group">
                                <label for="locale">{{ __('voyager::generic.locale') }}</label>
                                <select class="form-control select2" id="locale" name="locale">
                                    @foreach (Voyager::getLocales() as $locale)
                                        <option value="{{ $locale }}"
                                                {{ ($locale == $selected_locale ? 'selected' : '') }}>{{ $locale }}</option>
                                    @endforeach
                                </select>
                            </div>


                           @if(isset($dataTypeContent->id))
                                @if(count($zips) > 0)
                                    <div class="form-group">
                                        <label for="zip">ЗІПи користувача</label>

                                        <table class="table table-borderless" style="background-color: #F5FFFA">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Назва</th>
                                                <th scope="col">Артикул</th>
                                                <th scope="col">Категорія</th>
                                                <th scope="col">Кількість</th>
                                                <th scope="col">Ціна</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($zips as $product)

                                                <tr>
                                                    <td style="text-align: center; ">
                                                        <img src="{{ $product['image'] }}" alt="">
                                                    </td>
                                                    <td>{{ $product['name'] }}</td>
                                                    <td>{{ $product['article'] }}</td>
                                                    <td>{{ $product['category'] }}</td>
                                                    <td>{{ $product['qty'] }}</td>
                                                    <td>{{ $product['price'] }}</td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                                @if(count($specification_menus) > 0)
                                    <div class="form-group">
                                        <label for="specs">Меню специфікацій</label>

                                        @foreach($specification_menus->where('archive', 0) as $specification)
                                            <div class="form-group" style="margin-left: 10px;margin-bottom: 40px">
                                                <label for="{{ $specification->id }}">Назва
                                                    специфікації: {{ $specification->name }}</label>
                                                <table id="{{ $specification->id }}" class="table table-borderless"
                                                       style="background-color: #F5FFFA">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Назва</th>
                                                        <th scope="col">Артикул</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($specification->content as $content )
                                                        <tr>
                                                            <td>{{ $content->id    }}</td>
                                                            <td>{{ $content->name }}</td>
                                                            <td>{{ $content->article}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label for="specs">Меню специфікацій(Архів)</label>

                                        @foreach($specification_menus->where('archive', 1) as $specification)
                                            <div class="form-group" style="margin-left: 10px;margin-bottom: 40px">
                                                <label for="{{ $specification->id }}">Назва
                                                    специфікації: {{ $specification->name }}</label>
                                                <table id="{{ $specification->id }}" class="table table-borderless"
                                                       style="background-color: #F5FFFA">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Назва</th>
                                                        <th scope="col">Артикул</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($specification->content as $content )
                                                        <tr>
                                                            <td>{{ $content->id    }}</td>
                                                            <td>{{ $content->name }}</td>
                                                            <td>{{ $content->article}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>

                                @endif
                               @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if(isset($dataTypeContent->avatar))
                                    <img src="{{ filter_var($dataTypeContent->avatar, FILTER_VALIDATE_URL) ? $dataTypeContent->avatar : Voyager::image( $dataTypeContent->avatar ) }}"
                                         style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;"/>
                                @endif
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>

        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
              enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            {{ csrf_field() }}
            <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
        </form>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
    </script>
@stop
