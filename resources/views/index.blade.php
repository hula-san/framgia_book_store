@extends('layouts.master')
@section('slider')  
<!-- <section id="slider"> --><!--slider-->
<!-- <div class="container"> -->
<div class="row">
    <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#slider-carousel" data-slide-to="1"></li>
                <li data-target="#slider-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-6">
                        <h1><span> {{ trans('index.name') }} </span>{{ trans('index.store') }}</h1>
                        <h2>{{ trans('index.slide1_name')}}</h2>
                        <p>{{ trans('index.slide1_des')}}</p>
                        <button type="button" class="btn btn-default get">{{ trans('index.get_it_now')}}</button>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ config('index.link.image_home_folder') }}/sachkinhtekynangsong.jpg" class="girl img-responsive" alt="" />
                    </div>
                </div>
                <div class="item">
                    <div class="col-sm-6">
                        <h1><span> {{ trans('index.name') }} </span>{{ trans('index.store') }}</h1>
                        <h2>{{ trans('index.slide2_name')}}</h2>
                        <p>{{ trans('index.slide2_des')}} </p>
                        <button type="button" class="btn btn-default get">{{ trans('index.get_it_now')}}</button>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ config('index.link.image_home_folder') }}/camnanglamchame.jpg" class="girl img-responsive" alt="" />
                    </div>
                </div>
                <div class="item">
                    <div class="col-sm-6">
                        <h1><span> {{ trans('index.name') }} </span>{{ trans('index.store') }}</h1>
                        <h2>{{ trans('index.slide3_name')}}</h2>
                        <p>{{ trans('index.slide3_des')}}</p>
                        <button type="button" class="btn btn-default get">{{ trans('index.get_it_now')}}</button>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ config('index.link.image_home_folder') }}/sachtruyenthieunhi.jpg" class="girl img-responsive" alt="" />
                    </div>
                </div>
            </div>
            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>
<!-- </div> -->
<!-- </section> --><!--/slider-->
@endsection
@section('content')
<!-- <section> -->
<!-- <div class="container"> -->
@include('layouts.search')

<div class="row">
    <div class="col-sm-3">
        @include('_components.left_sidebar')
    </div>
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center">{{ trans('index.new_items') }}</h2>
            @foreach($books as $book)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ $book->getImagePathAttribute() }}" alt=""/>
                                <h2>{{ $book->price }}</h2>
                                <p>{{ $book->name }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{ trans('index.add_to_cart') }}</a>
                                <a href='#' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>{{ trans('index.book_detail') }}</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{ $book->price }}</h2>
                                    <p>{{ $book->description }}</p>
                                    <form method="POST" action="{{ route('cart') }}">
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>{{ trans('index.add_to_cart') }}
                                        </button>
                                    </form>
                                    <a href="{{ route('detailBook', ['id' => $book->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>{{ trans('index.book_detail') }}</a>
                                </div>
                            </div>
                            <img src="{{ config('index.link.image_book_new') }}" class="new" alt="" />
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>{{ trans('index.add_to_wishlist') }}</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>{{ trans('index.add_to_compare') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- </div> -->
<!-- </section> -->
@endsection
