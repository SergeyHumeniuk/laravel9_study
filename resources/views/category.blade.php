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
                    </div>
                    <div class="add-to-cart">
                        <form action="/cart/add/{{$prod['id']}}'" method="post">
                            @csrf
                            <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> добавити в кошик</button>
                        </form>
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
