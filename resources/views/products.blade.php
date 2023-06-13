@extends('layouts.master')
@section('css')
<title>Laravel </title>
<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/source/assets/dest/css/font-awesome.min.css">
<link rel="stylesheet" href="/source/assets/dest/vendors/colorbox/example3/colorbox.css">
<link rel="stylesheet" href="/source/assets/dest/rs-plugin/css/settings.css">
<link rel="stylesheet" href="/source/assets/dest/rs-plugin/css/responsive.css">
<link rel="stylesheet" title="style" href="/source/assets/dest/css/style.css">
<link rel="stylesheet" href="/source/assets/dest/css/animate.css">
<link rel="stylesheet" title="style" href="/source/assets/dest/css/huong-style.css">
@endsection
{{-- hiển thị --}}
{{-- ////////////////////////////////////////// --}}
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Lọc theo</label>
                        <select name="{{route('products')}}"  id="select-filter" class="form-control select-filter" >
                            <option value="0">--Chọn lọc--</option>
                            <option value="?name=ASC">Tên A-Z</option>
                            <option value="?name=DESC">Tên Z-A</option>
                            <option value="?gia=ASC">Giá tăng dần</option>
                            <option value="?gia=DESC">Giá giảm dần</option>
                        </select>

                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Sản phẩm yêu thích</h5>
                        <div class="widget-body">
                            @isset($productFavourites)
                                
                           
                            @foreach ($productFavourites as $product)
                            
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{route('product',['id'=>$product['item']['id']]) }}"><img src="/source/image/product/{{$product['item']['image']}}" alt=""></a>
                                    
                                    <div class="media-body">
                                        <a class="cart-item-delete" href="{{ route('banhang.xoaFavourite',$product['item']['id'])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                              </svg>
                                        </a>
                                        {{$product['item']['name']}}
                                       
                                        @if ($product['item']['promotion_price'] != 0)
                                        <span class="beta-sales-price">{{number_format($product['item']['promotion_price'])}}</span>
                                        @else
                                        <span class="beta-sales-price">{{number_format($product['item']['unit_price'])}}</span>

                                        @endif
                                        
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>New Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>

                        @php
                        $stt = 0;
                    @endphp
                    <div class="row">
                            @isset($new_products)
                                  
                            @foreach ($new_products as $item)
                            @php
                            $stt++;
                        @endphp
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($item ->promotion_price !=0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                                
                                            @endif
                                    <div class="single-item-header">
                                        <a href="{{route('product',['id'=>$item->id]) }}"><img src="/source/image/product/{{$item ->image}}" width="" height="320" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item -> name}}</p>
                                        @if ($item ->promotion_price !=0)
                                        <p class="single-item-price">
                                        <span class="flash-del">{{number_format($item -> unit_price)}}</span>
                                        <span class="flash-sale">{{number_format($item -> promotion_price)}}</span>
                                    </p>
                                        @else
                                        <p class="single-item-price">
                                            <span>{{number_format($item -> unit_price)}}</span>
                                        </p>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('banhang.addToCart',$item ->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product',['id'=>$item->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <ul class="nav nav-pills nav-justified">
                                       
                                        <li><a href="{{route('banhang.addToFavourite',['id'=>$item->id])}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                            @if ($stt % 3==0)
                            <div class="space40">&nbsp;</div>
                        @endif
                        @endforeach
                        @endisset
                           
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Top Products</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">438 styles found</p>
                            <div class="clearfix"></div>
                        </div>
                        @php
                        $stt = 0;
                    @endphp
                    <div class="row">
                            @isset($products)
                                  
                            @foreach ($best_product as $item)
                            @php
                            $stt++;
                        @endphp
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if ($item ->promotion_price !=0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                                
                                            @endif
                                    <div class="single-item-header">
                                        <a href="{{route('product',['id'=>$item->id]) }}"><img src="/source/image/product/{{$item ->image}}" width="" height="320" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item -> name}}</p>
                                        @if ($item ->promotion_price !=0)
                                        <p class="single-item-price">
                                        <span class="flash-del">{{number_format($item -> unit_price)}}</span>
                                        <span class="flash-sale">{{number_format($item -> promotion_price)}}</span>
                                    </p>
                                        @else
                                        <p class="single-item-price">
                                            <span>{{number_format($item -> unit_price)}}</span>
                                        </p>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('banhang.addToCart',$item ->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('product',['id'=>$item->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="{{route('banhang.addToFavourite',['id'=>$item->id])}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                            @if ($stt % 3==0)
                            <div class="space40">&nbsp;</div>
                        @endif
                        @endforeach
                        @endisset
                           
                        </div>
                        <div class="space40">&nbsp;</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->
            <center><div class="">
                {{$products->appends(request()->all())->links()}}
              </div></center>

        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
</div>
@endsection

{{-- /////////////////////////////////// --}}
{{-- footer --}}
@section('js')

<script src="/source//source/assets/dest/js/custom2.js"></script>
<script>
$(document).ready(function($) {    
    $(window).scroll(function(){
        if($(this).scrollTop()>150){
        $(".header-bottom").addClass('fixNav')
        }else{
            $(".header-bottom").removeClass('fixNav')
        }}
    )
})
</script>
<script>
    $(document).ready(function(){
        var active = location.search;
        $('#select-filter option[value="'+active+'"]').attr('selected','selected');
    })

    $('.select-filter').change(function(){
        var value = $(this).find(':selected').val();
        // alert(value);

        if(value !=0) {
            var url = value;
            window.location.replace(url)

        }
        else {
            alert('hãy lọc')
        }


    })

</script>
@endsection
