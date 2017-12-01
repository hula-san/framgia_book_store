@extends('layouts.master')
@section('content')
    <div class="container text-center">
        <div class="logo-404">
            <a href="/"><img src="images/home/logo.png" alt="" /></a>
        </div>
        <div class="content-404">
            <img src="images/404/404.png" class="img-responsive" alt="" />
            <h1><b> {{ trans('404.OPPS') }} </b> {{ trans('404.OPPS_title') }} </h1>
            <p> {{ trans('404.OPPS_content') }} </p>
            <h2><a href="index.html"> {{ trans('404.OPPS_back') }} </a></h2>
        </div>
    </div>
@endsection
