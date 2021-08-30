@extends('user-cabinet.index')

@section('title',  __('breadcrumbs.specification_menu') )

@section('user-cabinet')
    <div id="spec">
        <div class="specification-menu">
            <specification translations = "{{ json_encode(__('specification_menu')) }}" translate_modal = "{{ json_encode(__('modal')) }}"></specification>
        </div>
    </div>

@endsection