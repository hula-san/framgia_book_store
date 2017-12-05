@extends('layouts.master')
@section('content')                
    <h3> {{ trans('cart.messOrder') }} </h3>
    <a class="btn btn-default update" href="{{ route('store') }}">{{ trans('cart.goStore') }}</a>
<!--/#do_action-->
@endsection
