@extends('Front.layout.master')
@section('content')
    <div class="ps-page--product">
        <div class="ps-container">
            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">
                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            <div class="item"><a href="{{url('/')}}{{$product->image}}"><img src="{{url('/')}}{{$product->image}}" alt=""></a></div>
                                            <div class="item"><a href="{{url('/')}}{{$product->image}}"><img src="{{url('/')}}{{$product->image}}" alt=""></a></div>
                                            <div class="item"><a href="{{url('/')}}{{$product->image}}"><img src="{{url('/')}}{{$product->image}}" alt=""></a></div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    <div class="item"><img src="{{url('/')}}{{$product->image}}" alt=""></div>
                                    <div class="item"><img src="{{url('/')}}{{$product->image}}" alt=""></div>
                                    <div class="item"><img src="{{url('/')}}{{$product->image}}" alt=""></div>
                                </div>
                            </div>
                            <div class="ps-product__info">
                                <h1>{{$product->title}}</h1>
                                <div class="ps-product__meta">
                                    <p>Brand:<a href="shop-default.html">{{$product->supplier->name}}</a></p>
                                    <div class="ps-product__rating" >
                                        <select class="ps-rating" data-read-only="true">
                                                        @if($product->ratings->count()>0)
                                                        @for($i=0;$i<round($product->ratings->avg('value'));$i++)
                                                        <option value="1">{{$i+1}}</option>
                                                        @endfor
                                                        @for($i=0;$i<5-round($product->ratings->avg('value'));$i++)
                                                         <option value="2"></option> 
                                                        @endfor
                                                           
                                                        @else
                                                            <option value="2"></option> 
                                                            <option value="2"></option>    
                                                          <option value="2"></option> 
                                                            <option value="1"></option>    
                                                            <option value="2"></option>    

                                                        @endif
                                        </select><span>({{$product->ratings->count()}} review)</span>
                                    </div>
                                </div>
                                <h4 class="ps-product__price">{{round($product->price)}} LE</h4>
                                <div class="ps-product__desc">
                                  
                                    <ul class="ps-list--dot">
                             <p>{{$product->description}}</p>
                                    </ul>
                                </div>
                                <div class="ps-product__variations">
                                    <figure>
                                        <figcaption>Color</figcaption>
                                        <div class="ps-variant ps-variant--color color--1"><span class="ps-variant__tooltip">Black</span></div>
                                        <div class="ps-variant ps-variant--color color--2"><span class="ps-variant__tooltip"> Gray</span></div>
                                    </figure>
                                </div>
                                <div class="ps-product__shopping row">
                                    <figure>
                                        <figcaption>Quantity</figcaption>
                                        <div class="form-group--number">
                                            <button class="up"><i class="fa fa-plus"></i></button>
                                            <button class="down"><i class="fa fa-minus"></i></button>
                                            <input class="form-control" type="text" placeholder="1">
                                        </div>
                                    </figure>
                                    <a class="ps-btn ps-btn--black " href="#">Add to cart</a>
                                    <a class="ps-btn" href="#">Buy Now</a>
                                    <div class="ps-product__actions col-12"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                                </div>
                                <div class="ps-product__specification">
                                    <p><strong>SKU:</strong> {{$product->id}}</p>
                                    <p class="categories">
                                        <strong> Categories:</strong>
                                        <a href="#">{{$product->product_category->name}}</a>
                                        ,<a href="#">{{$product->product_sub_category->name}}</a>
                                    </p>
                                  
                                </div>
                            
                            </div>
                        </div>
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1">Description</a></li>
                                <li><a href="#tab-4" id="count">Reviews ({{$product->ratings->count()}})</a></li>

                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1">
                                    <div class="ps-document">
                                       
                                        <p>{{$product->description}}</p> 
                                    </div>
                                </div>
                 
                                <div class="ps-tab" id="tab-4">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                                            <div class="ps-block--average-rating">
                                                <div class="ps-block__header">
                                                    <h3>{{$product->ratings->avg('value')}}</h3>
                                                    <select class="ps-rating" data-read-only="true">
                                                        @if($product->ratings->count()>0)
                                                        @for($i=0;$i<round($product->ratings->avg('value'));$i++)
                                                        <option value="1">{{$i+1}}</option>
                                                        @endfor
                                                        @for($i=0;$i<5-round($product->ratings->avg('value'));$i++)
                                                         <option value="2"></option> 
                                                        @endfor
                                                           
                                                        @else
                                                            <option value="2"></option> 
                                                            <option value="2"></option>    
                                                          <option value="2"></option> 
                                                            <option value="2"></option>    
                                                            <option value="2"></option>    

                                                        @endif
                                                    </select><span>{{$product->ratings->count()}} Review</span>
                                                </div>
                                                @foreach ($product->ratings->groupBy('value') as $key=>$value )
                                             
                                                      <div class="ps-block__star">
                                                             @if($key==5)
                                                             <span>5 Star</span>
                                                             @endif
                                                            @if($key==4)
                                                             <span>4 Star</span>
                                                             @endif      
                                                              @if($key==3)
                                                             <span>3 Star</span>
                                                             @endif      
                                                             @if($key==2)
                                                             <span>2 Star</span>
                                                             @endif       
                                                             @if($key==1)
                                                             <span>1 Star</span>
                                                             @endif
                                                    <div class="ps-progress" data-value="{{round($key*$value->count()*100/100)}}"><span></span></div><span>{{round($key*$value->count()*100/100)}}%</span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                                            <form class="ps-form--review" action="{{route('front.review')}}" method="post" id="productReview">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    <div class="row justify-content-center">
                                                    @if(session()->has('success'))
                                                                        <div class="alert alert-success" role="alert">
                                                                            {{session('success') }}
                                                                        </div>
                                                                        @endif
                                                                        @if(session()->has('error'))
                                                                        <div class="alert alert-danger" role="alert">
                                                                            {{session('error') }}
                                                                        </div>
                                                                        @endif
                                                    </div>
                                                <h4>Submit Your Review</h4>
                                                <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                                                <div class="form-group form-group__rating">
                                                    <label>Your rating of this product</label>
                                                    <select class="ps-rating" data-read-only="false" name="value">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="6" placeholder="Write your review here" name="description"></textarea>
                                                </div>
                                        
                                                <div class="form-group submit">
                                                    <button class="ps-btn submit-form">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tab" id="tab-5">
                                    <div class="ps-block--questions-answers">
                                        <h3>Questions and Answers</h3>
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Have a question? Search for answer?">
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-tab active" id="tab-6">
                                    <p>Sorry no more offers available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-page__right">
                    <aside class="widget widget_product widget_features">
                        <p><i class="icon-network"></i> Shipping worldwide</p>
                        <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
                        <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
                        <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
                    </aside>
                    <aside class="widget widget_sell-on-site">
                        <p><i class="icon-store"></i> Sell on WAHFY?<a href="#"> Register Now !</a></p>
                    </aside>
                    <aside class="widget widget_ads"><a href="#"><img src="img/ads/product-ads.png" alt=""></a></aside>
                    <aside class="widget widget_same-brand">
                        <h3>Same Brand</h3>
                        <div class="widget__content">
                            @foreach($brands as $brand)
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{url('front/img/products/shop/5.jpg')}}" alt=""></a>
                                
                                    <ul class="ps-product__actions">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{$brand->name}}</a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">{{$brand->name}}</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                @if($brand->ratings->avg('value')<5 && $brand->ratings->avg('value')>0)
                                                        @for($i=0;$i<round($brand->ratings->avg('value'));$i++)
                                                        <option value="1">{{$i+1}}</option>
                                                        @endfor
                                                        @for($i=0;$i<5-round($brand->ratings->avg('value'));$i++)
                                                          <option value="2"></option> 
                                                        @endfor
                                                          
                                                        @else
                                                            <option value="2"></option> 
                                                            <option value="2"></option>    
                                                          <option value="2"></option> 
                                                            <option value="2"></option>    
                                                            <option value="2"></option>    

                                                        @endif
                                            </select><span>{{$brand->ratings->avg('value')}} Out Of 5</span>
                                        </div>
                                     
                                    </div>
                                   
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </aside>
                </div>
            </div>
            <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>Related products</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach ($related_products as $related_product)
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="{{route('front.suppliers.product',['product'=>$related_product->title])}}"><img style="width:200px;Height:100px;" src="{{url('/')}}{{$related_product->image}}" alt=""></a>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{$product->supplier->name}}</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="{{route('front.suppliers.product',['product'=>$related_product->title])}}">
                                  {{$related_product->title}}</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                                    @if($related_product->ratings->count()>0)
                                                        @for($i=0;$i<round($related_product->ratings->avg('value'));$i++)
                                                        <option value="1">{{$i+1}}</option>
                                                        @endfor
                                                        @for($i=0;$i<5-round($related_product->ratings->avg('value'));$i++)
                                                            <option value="2"></option> 
                                                        @endfor
                                                        
                                                        @endif
                                                        @if($related_product->ratings->count()==0)
                                                            <option value="2"></option> 
                                                            <option value="2"></option>    
                                                          <option value="2"></option> 
                                                            <option value="2"></option>    
                                                            <option value="2"></option>    

                                                        @endif
                                        </select><span>{{$related_product->ratings->avg('value')}} out of 5</span>
                                    </div>
                                    <p class="ps-product__price">{{$related_product->price}}LE</p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="{{route('front.suppliers.product',['product'=>$related_product->title])}}">{{$product->title}}</a>
                                    <p class="ps-product__price">{{$related_product->price}}LE</p>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@if($product->ratings->count()<=0)
@section('after-styles')
<style>

.br-theme-fontawesome-stars .br-widget a.br-selected:after {
color: #d2d2d2;
}
</style>

@endsection
@endif
@section('scripts')
<script src="{{ asset('front/pages/review.js') }}"></script>
@endsection