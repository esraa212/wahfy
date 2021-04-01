@extends('Front.layout.master')
@section('content')
 <div class="ps-page--simple">
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{route('front.home')}}">Home</a></li>
                    <li><a href="shop-default.html">Shop</a></li>
                    <li>Whishlist</li>
                </ul>
            </div>
        </div>
        <div class="ps-section--shopping ps-whishlist">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Wishlist</h1>
                </div>
                   <div class="row justify-content-center">
                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success') }}
                        </div>
                        @endif
                    </div>
                <div class="row ps-section__content">
                    <div class="table-responsive">
                                        @if(session('wishlist'))
                        <table class="table ps-table--whishlist ps-table--responsive">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product name</th>
                                    <th>Unit Price</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                     @foreach(session('wishlist') as $key => $value)
                                <tr class=row"">
                                    <td data-label="Remove"><a href="#"><i class="icon-cross"></i></a></td>
                                    <td data-label="Product">
                                        <div class="ps-product--cart">
                                            <div class="ps-product__thumbnail"><a href="{{route('front.suppliers.product',['product'=>$value['title'] ])}}"><img src="{{url(''.$value['image'].'')}}" alt=""></a></div>
                                            <div class="ps-product__content"><a href="{{route('front.suppliers.product',['product'=>$value['title'] ])}}">{{$value['title']}}</a>
                                                <p>Sold By:<strong> {{$value['brand']}}</strong></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-label="Price">{{round($value['price'])}} LE</td>
                                    <td data-label="Status"><span class="ps-tag ps-tag--in-stock">In-stock</span></td>
                                    <td data-label="action"><a class="ps-btn mr-5" href="{{ url('add-to-cart/'.$value['product_id']) }}">Add to cart</a></td>
                                </tr>
                          @endforeach
                        
                            </tbody>
                        </table>
                          @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection