@extends('layouts.master')
@section('content')
@if(count($cart)) 
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href=" {{ route('home') }}"> {{ trans('master.Home') }} </a></li>
                    <li class="active">{{ trans('cart.shopping_cart') }}</li>
                </ol>
            </div>
             
            <div class="table-responsive cart_info">
           
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">{{ trans('cart.Item') }}</td>
                            <td class="description"></td>
                            <td class="price">{{ trans('cart.Price') }}</td>
                            <td class="quantity">{{ trans('cart.Quantity') }}</td>
                            <td class="total">{{ trans('cart.Total') }}</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $book)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ $book->options->image }}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $book->name }}</a></h4>
                                    <p>{{ $book->name }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($book->price) }} {{ trans('cart.vnd') }} </p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form method="POST" action="{{ route('plusCart') }}">
                                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                                            <input type="hidden" name="quantity" value="{{ $book->qty }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="cart_quantity_up" type="submit"> {{ trans('cart.increase') }} </button>
                                        </form>

                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{ $book->qty }}" autocomplete="off" size="2" disabled="">

                                        <form method="POST" action="{{ route('minusCart') }}">
                                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                                            <input type="hidden" name="quantity" value="{{ $book->qty }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="cart_quantity_down" type="submit"> {{ trans('cart.decrease') }} </button>
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ $book->subtotal }}</p>
                                </td>
                                <td class="cart_delete">
                                    <form method="POST" action="{{ route('deleteCart') }}">
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button class="cart_quantity_delete"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            
        </div>
    </section>
<!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <div class="heading">
                            <h3> {{ trans('cart.continueText') }} </h3>
                            <a class="btn btn-default update" href="{{ route('store') }}">{{ trans('cart.continueBtn') }} </a>
                        </div>
                    </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li> {{ trans('cart.cart_sub_total') }}<span> {{ Cart::subtotal() }}</span></li>
                            <li> {{ trans('cart.eco_tax') }} <span> {{ Cart::tax() }}</span></li>
                            <li> {{ trans('cart.ship') }} <span> {{ trans('cart.ship_cost')}}</span></li>
                            <li> {{ trans('cart.total') }} <span>{{ Cart::total() }}</span></li>
                        </ul>
                        <a class="btn btn-default check_out" href="#"> {{ trans('cart.checkout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else                    
    <h3> {{ trans('cart.cartNull') }} </h3>
    <a class="btn btn-default update" href="{{ route('store') }}">{{ trans('cart.goStore') }}</a>
@endif
<!--/#do_action-->
    @endsection
