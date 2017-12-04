@extends('layouts.master')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href=" {{ route('home') }} "> {{ trans('master.Home') }} </a></li>
                <li class="active">{{ trans('cart.checkout') }}</li>
            </ol>
        </div>
        <!--/breadcrums-->
        <div class="review-payment">
            <h2>{{ trans('cart.title') }}</h2>
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
                                <h4>{{ $book->name }}</h4>
                                <p>{{ $book->name }}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{ number_format($book->price) }} {{ trans('cart.vnd') }} </p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $book->qty }}" autocomplete="off" size="2" disabled="">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{ number_format($book->subtotal) }} {{ trans('cart.vnd') }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="register-req">
                <p>{{ trans('cart.register_req') }}</p>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <tr>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td colspan="2">
                                        <h4>{{ trans('cart.update_cart?') }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a class="btn btn-warning" href="{{ route('cartIndex') }}"> {{ trans('cart.back_to_cart') }}</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </div>
                <div class="cart-totals col-md-7">
                    <tr>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>
                                        <h4> {{ trans('cart.cart_sub_total') }} </h4>
                                    </td>
                                    <td>
                                        <h4>{{ Cart::subtotal() }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>{{ trans('cart.eco_tax') }}</h4>
                                    </td>
                                    <td>
                                        <h4>{{ Cart::tax() }}</h4>
                                    </td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>
                                        <h4>{{ trans('cart.ship') }}</h4>
                                    </td>
                                    <td>
                                        <h4>{{ trans('cart.ship_cost') }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>{{ trans('cart.total') }}</h4>
                                    </td>
                                    <td>
                                        <span>
                                            <h3>{{ Cart::total() }}</h3>
                                        </span>
                                    </td>
                                </tr>
                                @if(Auth::check())
                                    <tr>
                                        <td>
                                            <div class="cart-totals-row">
                                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#payment_direct"> {{ trans('cart.userPayment') }}</button>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            <div class="cart-totals-row">
                                                <a href="{{ route('login') }}" class="btn btn-info" role="button"> {{ trans('cart.loginCheckout') }} </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="cart-totals-row">
                                                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#payment_direct"> {{ trans('cart.guestCheckout') }} </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div  id="payment_direct" class="collapse">
                        <form  id="form-thanh-toan" action="{{ route('payment') }}" method="POST">
                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ trans('cart.fullName') }}</label>
                                    @if(Auth::check())
                                        <input type="text" class="form-control" id="txt_ten_kh" name="txt_ten_kh" placeholder="Full name" value="{{ Auth::user()->name }}">
                                    @else
                                        <input type="text" class="form-control" id="txt_ten_kh" name="txt_ten_kh" placeholder="Full name">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> {{ trans('cart.addressReceive') }}</label>
                                    @if(Auth::check())
                                        <input type="text" class="form-control" id="txt_dia_chi_kh" name="txt_dia_chi_kh" placeholder="Address" value="{{ Auth::user()->address }}">
                                    @else
                                        <input type="text" class="form-control" id="txt_dia_chi_kh" name="txt_dia_chi_kh" placeholder="Address">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> {{ trans('cart.phoneClient') }}</label>
                                    <input type="text" class="form-control" id="txt_sdt_kh" name="txt_sdt_kh" placeholder="Reicever phone number">
                                </div>
                                <div class="form-group">
                                    <label> {{ trans('cart.userEmail') }}</label>
                                    @if(Auth::check())
                                        <input type="text" class="form-control" id="txt_email_kh" name="txt_email_kh" placeholder="email" value=" {{ Auth::user()->email }}">
                                    @else
                                        <input type="text" class="form-control" id="txt_email_kh" name="txt_email_kh" placeholder="email">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> {{ trans('cart.paymentMethod') }} </label>
                                    <select class="form-control" id="txt_hinh_thuc_tt" name="txt_hinh_thuc_tt">
                                        <option value="1"> {{ trans('cart.paymentMethod1') }}</option>
                                        <option value="1"> {{ trans('cart.paymentMethod2') }} </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="comment"> {{ trans('cart.note') }} </label>
                                    <textarea class="form-control" rows="15" id="txt_ghi_chu" name="txt_ghi_chu"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="submit_payment" class="btn btn-primary">{{ trans('cart.sentOrder') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#cart_items-->
@endsection
