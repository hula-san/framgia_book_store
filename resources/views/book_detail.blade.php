@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('_components.left_sidebar')
    </div>
    <div class="col-sm-9 padding-right">
        <div class="product-details">
            <!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ $book->getImagePathAttribute() }}" alt="" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->
                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                    <h2>{{ $book->name }}</h2>
                    <p> {{ $book->author->name }}</p>
                    <span>
                    <span> {{ number_format($book->price) }}</span>
                    
                    <form method="POST" action="{{ route('cart') }}" class="add_to_cart">
                        <label>{{ trans('admin.quantity') }}:</label>
                        <input type="text" name="quantity" value="1" />
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if($book->quantity > 0)
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>{{ trans('index.add_to_cart') }}
                            </button>
                        @else 
                            <button class="btn btn-fefault cart">
                                {{ trans('cart.out_of_stock') }}
                            </button>
                        @endif
                    </form>
                    </span>
                    <p><b>{{ trans('cart.Availability') }}</b> 
                        @if($book->quantity > 0)
                            {{ trans('cart.in_stock') }}
                        @else
                            <label> {{ trans('cart.out_of_stock') }} </label>
                        @endif
                    </p>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
        <div class="category-tab shop-details-tab">
            <!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab"> {{ trans('cart.Details') }}</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab"> {{ trans('cart.Reviews') }} ({{ $book->reviews->count() }})</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details" >
                    <div class="col-md-12">
                        <p><b>{{ trans('cart.publish_year') }}</b> {{ $book->publish_year }}</p>
                        <p><b>{{ trans('cart.publisher') }} </b> {{ $book->publisher->name }}</p>
                        <p> <b>{{ trans('cart.author') }} </b>{{ $book->author->name }}</p>
                        <p><b>{{ trans('cart.description') }} </b>{{ $book->description }}</p>
                    </div>
                </div>
                <div class="tab-pane fade active in" id="reviews" >
                    @foreach($reviews as $review)
                        <div class="col-sm-12">
                            <ul>
                                <li><a href=""><b><i class="fa fa-user"></i>{{ $review->user->name }}</b></a></li>
                                <li><a href=""><i class="fa fa-calendar-o"></i>{{ $review->updated_at }}</a></li>
                            </ul>
                            <ul>
                                <li><a><h4><span>{{ $review->rate }}</span><span><i class="fa fa-star-o" aria-hidden="true"></i>
                                </span></h4></a></li>
                                <li><p><span>{{ $review->content_comment }}</span></p></li>
                            </ul>
                        </div>
                    @endforeach
                    <div class="col-md-12">
                        <p><h3>{{ trans('cart.title_review') }}</h3></p>
                        @if(Auth::check())
                            <form action="#" method="POST">
                                <div class="col-md-2">
                                    <ul>
                                        <li><b>{{ trans('cart.Rating') }}</b></li>
                                        <li><a>1 <i class="fa fa-star-o" aria-hidden="true"></i><input type="radio" name="rate" value="1" checked></a></li>
                                        <li><a>2 <i class="fa fa-star-o" aria-hidden="true"></i><input type="radio" name="rate" value="2"></a></li>
                                        <li><a>3 <i class="fa fa-star-o" aria-hidden="true"></i><input type="radio" name="rate" value="3"></a></li>
                                        <li><a>4 <i class="fa fa-star-o" aria-hidden="true"></i><input type="radio" name="rate" value="4"></a></li>
                                        <li><a>5 <i class="fa fa-star-o" aria-hidden="true"></i><input type="radio" name="rate" value="5"></a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6"></div>
                                    <textarea name="commentContent"></textarea>
                                    <button type="button" class="btn btn-default pull-right">{{ trans('cart.Submit') }}</button>
                                </div>
                            </form>
                        @else
                            <div class="col-md-12">
                                <div class="cart-totals-row">
                                    <a href="{{ route('login') }}" class="btn btn-info" role="button"> {{ trans('cart.review') }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--/category-tab-->
    </div>
</div>
@endsection
