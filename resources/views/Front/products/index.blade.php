@extends('Front.layout.master')
@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="{{route('front.home')}}">Home</a></li>
                
                <li>Products</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--shop">
        <div class="ps-container">
            <div class="ps-shop-banner">
                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on"><a href="#"><img src="img/slider/shop-default/1.jpg" alt=""></a><a href="#"><img src="img/slider/shop-default/2.jpg" alt=""></a></div>
            </div>
            <div class="ps-shop-brand"><a href="#"><img src="{{url('front/img/brand/1.jpg')}}" alt=""></a><a href="#"><img src="{{url('front/img/brand/2.jpg')}}" alt=""></a>
                <a href="#"><img src="{{url('front/img/brand/3.jpg')}}" alt=""></a>
                <a href="#"><img src="{{url('front/img/brand/4.jpg')}}" alt=""></a>
                <a href="#"><img src="{{url('front/img/brand/5.jpg')}}" alt=""></a>
                <a href="#"><img src="{{url('front/img/brand/6.jpg')}}" alt=""></a>
                <a href="#"><img src="{{url('front/img/brand/7.jpg')}}" alt=""></a>
                <a href="#"><img src="{{url('front/img/brand/8.jpg')}}" alt=""></a></div>
           
            <div class="ps-layout--shop">
                <div class="ps-layout__left">
 
                    <aside class="widget widget_shop">
                    
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div id="nonlinear"></div>
                            <p class="ps-slider__meta">Price:<span class="ps-slider__value">$<span class="ps-slider__min"></span></span>-<span class="ps-slider__value">$<span class="ps-slider__max"></span></span></p>
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Price</h4>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-1" class="price" name="price[]" value="100.00">
                                <label for="review-1">100</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-2" class="price" name="price[]" value="200.00">
                                <label for="review-2">200</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-3" class="price" name="price[]" value="300.00">
                                <label for="review-3">300</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-4" class="price" name="price[]" value="500.00">
                                <label for="review-4">500</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="review-5" class="price" name="price[]" value="1000.00">
                                <label for="review-5">1000</label>
                            </div>
                            <input type="button" id="save_value" name="save_value" style="padding:9px;a5px; !important" value="Check" class=" btn-xs ps-btn mt-3" />
                        </figure>
                        <figure>
                            <h4 class="widget-title">By Color</h4>
                            @foreach ($colors as $color )
                                     <div class="ps-checkbox ps-checkbox--color color-{{$color->id}} ps-checkbox--inline">
                                <input class="form-control filterColor" type="checkbox" id="color-{{$color->id}}" name="color" value="{{$color->id}}">
                                <label class="filterColor" for="{{$color->id}}"></label>
                            </div>
                            @endforeach
   
             
                        </figure>
                        <figure>
                             <figure>
                            <h4 class="widget-title">By Size</h4>
                            @foreach ($sizes as $size )
                                    <div class="ps-checkbox">
                                <input class="form-control" id="{{$size->value}}" type="checkbox"  class="size" name="size[]" value="{{$size->id}}">
                                <label for ="{{$size->value}}">{{$size->value}}</label>
                            </div>  
                            @endforeach
                     
                            <input type="button" id="size_value" name="size_value" style="padding:9px;a5px; !important" value="Check" class=" btn-xs ps-btn mt-3" />
                        </figure>
                        </figure>
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        <div class="ps-shopping__header">
                            <p><strong> {{$products->count()}}</strong> Products found</p>
                            <div class="ps-shopping__actions">
                                <select class="ps-select" data-placeholder="Sort Items">
                                    <option>Sort by latest</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                                <div class="ps-shopping__view">
                                    <p>View</p>
                                    <ul class="ps-tab-list">
                                        <li class="active"><a href="#tab-1"><i class="icon-grid"></i></a></li>
                                        <li><a href="#tab-2"><i class="icon-list4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row" id="products">
                                        @foreach ($products as $product) 
                                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail">
                                                    <a href="{{route('front.suppliers.product',['product'=>$product->title])}}"><img src="{{url(''.$product->image.'')}}" alt="" style="width:200px;height:80px;"></a>
                                                    <ul class="ps-product__actions">
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview{{$product->id}}"><i class="icon-eye"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{$product->title}}</a>
                                                    <div class="ps-product__content"><a class="ps-product__title" href="{{route('front.suppliers.product',['product'=>$product->title])}}">{{$product->title}}</a>
                                                        <p class="ps-product__price">{{round($product->price,2)}}LE</p>
                                                    </div>
                                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('front.suppliers.product',['product'=>$product->title])}}">{{$product->title}}</a>
                                                        <p class="ps-product__price">{{round($product->price,2)}}LE</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        <div class="modal fade" id="product-quickview{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="product-quickview{{$product->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="false">
                            <div class="ps-product__images{{$product->id}}" data-arrow="true">
                                <div class="item"><img src="{{url(''.$product->image.'')}}" alt=""></div>
                                <div class="item"><img src="{{url(''.$product->image.'')}}" alt=""></div>
                                <div class="item"><img src="{{url(''.$product->image.'')}}" alt=""></div>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <h1>{{$product->title}}</h1>
                            <div class="ps-product__meta">
                                <p>Brand:<a href="{{route('front.suppliers.index',['supplier'=>$product->supplier->name])}}">{{$product->supplier->name}}</a></p>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                     @if($product->ratings!=null)
                                            @foreach($product->ratings as $rating)
                                            @for($i=0;$i<$rating->value;$i++)
                                            <option value="1">{{(double)$rating->value}}</option>
                                            @endfor
                                            @endforeach
                                            @else
                                            <option></option>
                                            <option></option>
                                            <option></option>
                                            <option></option>
                                            <option></option>

                                            @endif

                                    </select><span>({{$product->ratings->count()}} review)</span>
                                </div>
                            </div>
                            <h4 class="ps-product__price">{{round($product->price,2)}} LE</h4>
                            <div class="ps-product__desc">
                                <p>Sold By:<a href="{{route('front.suppliers.index',['supplier'=>$product->supplier->name])}}"><strong> {{$product->supplier->name}}</strong></a></p>
                                <ul class="ps-list--dot">
                                   <p>{{$product->description}}</p>
                                </ul>
                            </div>
                            <div class="ps-product__shopping"><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a class="ps-btn" href="#">Buy Now</a>
                                <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
                                   @endforeach
                                    </div>
                                </div>
                       
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="shop-filter-lastest" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="list-group">
                                <a class="list-group-item list-group-item-action" href="#">Sort by</a>
                                <a class="list-group-item list-group-item-action" href="#">Sort by average rating</a><a class="list-group-item list-group-item-action" href="#">Sort by latest</a><a class="list-group-item list-group-item-action" href="#">Sort by price: low to high</a>
                                <a class="list-group-item list-group-item-action" href="#">Sort by price: high to low</a><a class="list-group-item list-group-item-action text-center" href="#" data-dismiss="modal"><strong>Close</strong></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
     var config ={
        url:"{{url('/')}}",
        filter_products:"{{url('/filter_products')}}"
    }
</script>

<script src="{{ asset('assets/js/pages/filters.js') }}"></script>
<script>
    
      $(document).ready(function() {
@foreach($products as $product)
        $('#product-quikviewc'+{{$product->id}}+'').on('shown.bs.modal', function(e){
        $('.ps-product--quickview .ps-product__images'+{{$product->id}}+'').slick('setPosition');
         });
      @endforeach
   
        })

    
</script>


@stop