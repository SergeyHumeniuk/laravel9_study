@extends('layouts.maine')
@section('content')
<!-- SECTION -->


<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12 col-xs-6">
                @foreach ($product as $prod)
                <div class="product col-xs-4">
                    <div class="product-img">
                        @foreach ($prod->productImages as $images)
                            @if ($loop->first)
                                <a href="{{route('product_page',$prod['id'])}}"><img src="{{asset('storage/'.$images['image'])}}" alt=""/></a>
                            @endif
                        @endforeach
                        <div class="product-label">
                            @if ($prod['discount']!=0)
                            <span class="sale">-{{$prod['discount']}}%</span>
                            @endif
                            <span class="new">NEW</span>
                            <!--<span class="sale">-30%</span>
                            <span class="new">NEW</span>-->
                        </div>
                    </div>
                    <div class="product-body">
                        @foreach ($categorys as $category)
                            @if ($category['id']==$prod->productCategory['id_category'])
                                <p class="product-category">{{$category['name']}}</p>
                            @endif
                        @endforeach

                        <h3 class="product-name"><a href="#">{{$prod['name']}}</a></h3>
                        <h4 class="product-price">
                            {{$prod['price']}}
                            @if ($prod['discount']!=0)
                                <del class="product-old-price">{{($prod['price']+ ($prod['price'] * ($prod['discount'] / 100)))}}.00</del>
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
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


@endsection
