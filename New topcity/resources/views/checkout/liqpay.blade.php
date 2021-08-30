@extends('layouts.app')
@section('title','LiqPay')
@section('content')
    <div id="liqpay_checkout"></div>
@endsection
@push('scripts')
    {!! $liqpay_script !!}
@endpush