@extends('layouts.master')
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
                                    <a href='#' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>{{ trans('index.book_detail') }}</a>
                                </div>
                            </div>
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
