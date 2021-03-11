 @extends('Front.layout.master')
@section('content')

    <div id="homepage-3" class="mt-5">
        <div class="ps-home-banner" >
            <div class="ps-carousel--nav-inside owl-slider"  data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                @foreach ($banners as $banner )
                     <div class="ps-banner--market-1"  data-background="{{url(''.$banner->image.'')}}"><img src="{{url(''.$banner->image.'')}}" alt="" style="height: 400px !important;background-size: cover !important; background-repeat: no-repeat !important; width:100%!important;">

                </div>
                @endforeach

            </div>
        </div>
        <div class="ps-site-features">
            <div class="container">
                <div class="ps-block--site-features ps-block--site-features-2">
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-rocket"></i></div>
                        <div class="ps-block__right">
                            <h4>Free Delivery</h4>
                            <p>For all oders over $99</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-sync"></i></div>
                        <div class="ps-block__right">
                            <h4>90 Days Return</h4>
                            <p>If goods have problems</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-credit-card"></i></div>
                        <div class="ps-block__right">
                            <h4>Secure Payment</h4>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                    <div class="ps-block__item">
                        <div class="ps-block__left"><i class="icon-bubbles"></i></div>
                        <div class="ps-block__right">
                            <h4>24/7 Support</h4>
                            <p>Dedicated support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-promotions">
            <div class="container">
                <div class="row">
                    @foreach ($advertisings as $advertising )
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                        <a class="ps-collection" href="#"><img src="{{url("$advertising->image")}}" alt="" style="width:500px;height:250px;"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="ps-deal-of-day">
            <div class="ps-container">
                <div class="ps-section__header">
                    <div class="ps-block--countdown-deal">
                        <div class="ps-block__left">
                            <h3>Deal of the day</h3>
                        </div>
                        <div class="ps-block__right">
                            <figure>
                                <figcaption>End in:</figcaption>
                                <ul class="ps-countdown" data-time="December 30, 2021 15:37:25">
                                    <li><span class="days"></span></li>
                                    <li><span class="hours"></span></li>
                                    <li><span class="minutes"></span></li>
                                    <li><span class="seconds"></span></li>
                                </ul>
                            </figure>
                        </div>
                    </div><a href="shop-default.html">View all</a>
                </div>
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                        @foreach ($hotdeals as $hotdeal )
                        <div class="ps-product ps-product--inner">
                            <div class="ps-product__thumbnail"><a href="product-default.html">
                                <img style="width:200px;height:120px;" src="{{url("$hotdeal->product_image")}}" alt=""></a>
                                <div class="ps-product__badge">
                                    {{--  @if ($hotdeal->discount_type=='percentage')
                                       -{{$hotdeal->discount_value}} %
                                       @else
                                       {{$hotdeal->discount_value}} off
                                    @endif  --}}
                                    {{$hotdeal->discount_type=='precentage'?'-'.(int)$hotdeal->discount_value.'%':''.(int)$hotdeal->discount_value.'off'}}
                                </div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Read More"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{$hotdeal->product_name}}</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">{{$hotdeal->product_description}}</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            @if($hotdeal->rating!=null)
                                            @for($i=0;$i<$hotdeal->rating;$i++)
                                            <option value="1">{{(double)$hotdeal->rating}}</option>
                                            @endfor
                                            @else
                                            <option></option>
                                            <option></option>
                                            <option></option>
                                            <option></option>
                                            <option></option>

                                            @endif

                                        </select><span>{{$hotdeal->rating}}</span>
                                    </div>
                                    <p class="ps-product__price sale">{{$hotdeal->product_price}}LE <del>{{$hotdeal->price_before}}LE </del></p>
                                    <div class="ps-product__progress-bar ps-progress" data-value="78">
                                        <div class="ps-progress__value"><span></span></div>
                                        <p>Sold:57</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
        <div class="ps-top-categories">
            <div class="ps-container">
                <h3>Top categories</h3>
                <div class="row">
                    @foreach ($home_industries as $home_industry )
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 ">
                        <div class="ps-block--category"><a class="ps-block__overlay" href="{{route('indusrty.show',['industry'=>$home_industry->name])}}"></a><img src="{{url('front/img/categories/1.jpg')}}" alt="">
                            <p>{{$home_industry->name}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
