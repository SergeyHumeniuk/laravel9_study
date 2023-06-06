@extends('layouts.maine')
@php
        foreach ($settings as $setting){
            $phone = $setting['phone'];
            $email = $setting['email'];
            $adres = $setting['adres'];
            $logo = $setting['media-logo'];
            $title = $setting['title'];
            $text_maine_proposition = $setting['text_maine_proposition'];
            $baner_maine_proposition = $setting['baner_maine_proposition'];
        }
    @endphp
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                @foreach ($categorys as $category)
                 @if ($category['show_baners']==1)
                    <div class="col-md-4 col-xs-6">
                        <div class="shop">
                            <a href="{{route('category_page',$category['id'])}}">
                                <div class="shop-img">
                                    <img src="{{asset('storage/'.$category['image'])}}" alt="">
                                </div>
                                <div class="shop-body">
                                    <h3>{{$category['name']}}<br>Collection</h3>
                                    <a href="{{route('category_page',$category['id'])}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </a>
                        </div>
                    </div>
                 @endif
                @endforeach
                <!-- /shop -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Нові продукти</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach ($categorys as $category)
                                    @if ($loop->first)
                                        <li class="active"><a data-toggle="tab" href="{{route('category_page',$category['id'])}}">{{ $category['name'] }}</a></li>
                                    @else
                                        <li><a data-toggle="tab" href="{{route('category_page',$category['id'])}}">{{ $category['name'] }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach ($products_new_prod as $product)

                                        <div class="product">
                                            <div class="product-img">
                                                @foreach ($product->productImages as $images)
                                                    @if ($loop->first)
                                                        <a href="{{route('product_page',$product['id'])}}"><img src="{{asset('storage/'.$images['image'])}}" alt=""/></a>
                                                    @endif
                                                @endforeach
                                                <div class="product-label">
                                                    @if ($product['discount']!=0)
                                                    <span class="sale">-{{$product['discount']}}%</span>
                                                    @endif
                                                    <span class="new">NEW</span>
                                                    <!--<span class="sale">-30%</span>
                                                    <span class="new">NEW</span>-->
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                @foreach ($categorys as $category)
                                                    @if ($category['id']==$product->productCategory['id_category'])
                                                        <p class="product-category">{{$category['name']}}</p>
                                                    @endif
                                                @endforeach

                                                <h3 class="product-name"><a href="#">{{$product['name']}}</a></h3>
                                                <h4 class="product-price">
                                                    {{$product['price']}}
                                                    @if ($product['discount']!=0)
                                                        <del class="product-old-price">{{($product['price']+ ($product['price'] * ($product['discount'] / 100)))}}.00</del>
                                                    @endif

                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="left-img">
                        <img src="{{asset('storage/' . $baner_maine_proposition)}}" alt=""/>
                    </div>
                    <div class="hot-deal">
                        {!!html_entity_decode($text_maine_proposition)!!}
                        <a class="primary-btn cta-btn" href="#">Купуйте зараз</a>
                    </div>

                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Топ продаж</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach ($categorys as $category)
                                    @if ($loop->first)
                                        <li class="active"><a data-toggle="tab" href="#tab1">{{ $category['name'] }}</a></li>
                                    @else
                                        <li><a data-toggle="tab" href="#tab1">{{ $category['name'] }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">

                                    <!-- product -->
                                    @foreach ($products_top_sale as $product)

                                        <div class="product">
                                            <div class="product-img">
                                                @foreach ($product->productImages as $images)
                                                    @if ($loop->first)
                                                        <a href="{{route('product_page',$product['id'])}}"><img src="{{asset('storage/'.$images['image'])}}" alt=""></a>
                                                    @endif
                                                @endforeach
                                                <div class="product-label">
                                                    @if ($product['discount']!=0)
                                                    <span class="sale">-{{$product['discount']}}%</span>
                                                    @endif
                                                    <!--<span class="sale">-30%</span>
                                                    <span class="new">NEW</span>-->
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                @foreach ($categorys as $category)
                                                    @if ($category['id']==$product->productCategory['id_category'])
                                                        <p class="product-category">{{$category['name']}}</p>
                                                    @endif
                                                @endforeach

                                                <h3 class="product-name"><a href="#">{{$product['name']}}</a></h3>
                                                <h4 class="product-price">
                                                    {{$product['price']}}
                                                    @if ($product['discount']!=0)
                                                        <del class="product-old-price">{{($product['price']+ ($product['price'] * ($product['discount'] / 100)))}}.00</del>
                                                    @endif

                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection
