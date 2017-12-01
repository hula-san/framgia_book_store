<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> {{ trans('master.title') }} </title>
        {{ Html::style('assets/bootstrap/dist/css/bootstrap.min.css') }}
        {{ Html::style('assets/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style('assets/prettyphoto/css/prettyPhoto.css') }}
        {{ Html::style('assets/price-range/price-range.css') }}
        {{ Html::style('assets/animate.css/animate.css') }}
        {{ Html::style('css/main.css') }}
        {{ Html::style('css/responsive.css') }}
        {{ Html::script('assets/jquery/dist/jquery.js') }}
        @yield('css')      
    </head>
    <!--/head-->
    <body>
        <header id="header">
            <!--header-->
            <div class="header_top">
                <!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> {{ trans('master.phone') }} </a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> {{ trans('master.email') }} </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header_top-->
            <div class="header-middle">
                <!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="/"><img src="{{ asset('images/home/logo.png') }}" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    {{ trans('master.USA') }}
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"> {{ trans('master.USA_Canada') }} </a></li>
                                        <li><a href="#"> {{ trans('master.USA_UK') }} </a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    {{ trans('master.DOLLAR') }} 
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"> {{ trans('master.DOLLAR_Canadian') }} </a></li>
                                        <li><a href="#"> {{ trans('master.DOLLAR_Pound') }} </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-user"></i> {{ trans('master.Account') }} </a></li>
                                    <li><a href="#"><i class="fa fa-star"></i> {{ trans('master.Wishlist') }} </a></li>
                                    <li><a href="/checkout"><i class="fa fa-crosshairs"></i> {{ trans('master.Checkout') }} </a></li>
                                    <li><a href="/cart"><i class="fa fa-shopping-cart"></i> {{ trans('master.Cart') }} </a></li>
                                    <li><a href="/login"><i class="fa fa-lock"></i> {{ trans('master.Login') }} </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-middle-->
            <div class="header-bottom">
                <!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only"> {{ trans('master.Toggle') }} </span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="/" class="active"> {{ trans('master.Home') }} </a></li>
                                    <li class="dropdown">
                                        <a href="{{ route('store') }}"> {{ trans('master.BookStore') }} <i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="{{ route('store') }}"> {{ trans('master.AllBook') }} </a></li>
                                            <li><a href="/product"> {{ trans('master.BookEng') }} </a></li>
                                            <li><a href="/product"> {{ trans('master.BookVn') }} </a></li>
                                            <li><a href="/product"> {{ trans('master.EBook') }} </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/#"> {{ trans('master.featured') }} </a></li>
                                    <li><a href="{{ route('newbooks') }}"> {{ trans('master.new') }} </a></li>
                                    <li><a href="/contact"> {{ trans('master.Contact') }} </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <form method="GET" action="{{ route('search') }}">
                                {{ csrf_field() }}
                                <div class="search_box pull-right">
                                    <input name="key_word" type="text" placeholder="{{ trans('index.search_book') }}" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/header-bottom-->
        </header>
        <!--/header-->
        <section id="slider">
            <!--slider-->
            <div class="container">
                @yield('slider')
            </div>
        </section>
        <!--/slider-->

        @if(session('success_msg')))
            @include('layouts.success')
        @endif

        <section>
            <div class="container">
                @yield('content')
            </div>
        </section>
        <footer id="footer">
            <!--Footer-->
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2> {{ trans('master.Service') }} </h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> {{ trans('master.Help') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Contact_us') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Order') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Location') }} </a></li>
                                    <li><a href="#"> {{ trans('master.FAQ') }} </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2> {{ trans('master.BookStore') }} </h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> {{ trans('master.ChildrenBook') }} </a></li>
                                    <li><a href="#"> {{ trans('master.EduBook') }} </a></li>
                                    <li><a href="#"> {{ trans('master.LiteratureBook') }} </a></li>
                                    <li><a href="#"> {{ trans('master.BioBook') }} </a></li>
                                    <li><a href="#"> {{ trans('master.CookBook') }} </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>{{ trans('master.Policies') }} </h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> {{ trans('master.Terms') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Privecy') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Refund') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Billing') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Ticket') }} </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2> {{ trans('master.About') }} </h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> {{ trans('master.Information') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Careers') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Store_Location') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Affillate_Program') }} </a></li>
                                    <li><a href="#"> {{ trans('master.Copyright') }} </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2> {{ trans('master.About_Shopper') }} </h2>
                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                    <p> {{ trans('master.footer_content1') }}  <br/> {{ trans('master.footer_content2') }} </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left"> {{ trans('master.Copyright2013') }} </p>
                        <p class="pull-right"> {{ trans('master.Designed') }} <span><a target="_blank" href="http://www.themeum.com"> {{ trans('master.Designed_name') }} </a></span></p>
                    </div>
                </div>
            </div>
        </footer>
        <!--/Footer-->  

        {{ Html::script('assets/bootstrap/dist/js/bootstrap.min.js') }}
        {{ Html::script('assets/scrollup/src/jquery.scrollUp.js') }}
        {{ Html::script('assets/price-range/price-range.js') }}
        {{ Html::script('assets/prettyphoto/js/jquery.prettyPhoto.js') }}
        {{ Html::script('js/main.js') }}
        @yield('script')
    </body>
</html>
