@extends('Front.layout.master')
@section('content')
    <div class="ps-breadcrumb">
        <div class="ps-container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>{{$industry->name}}</li>
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
            <div class="ps-shop-categories">
                <div class="row align-content-lg-stretch">
                    @foreach ($categories as $category)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 ">
                        <div class="ps-block--category-2" data-mh="categories">
                            <div class="ps-block__thumbnail">
                                <img src="{{url(''.$category->image.'')}}" alt="">
                            </div>
                            <div class="ps-block__content">
                                <h4>{{$category->name}}</h4>
                                <ul>
                                    @foreach ($category->sub_categories as $subCategory )
                                    <li><a href="shop-default.html">{{$subCategory->name}}</a></li>
                                        
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
          
      <div class="ps-page--single ps-page--vendor row">
      
        <section class="ps-store-list">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Store list</h3>
                </div>
                <div class="ps-section__wrapper row">
                    <div class="ps-section__left col-4">
                        <aside class="widget widget--vendor">
                            <form action="">

                            </form>
                            <h3 class="widget-title">Search</h3>
                            <input class="form-control" type="text" placeholder="Search..." id="search">
                        </aside>
                        <aside class="widget widget--vendor">
                            <h3 class="widget-title">Filter by Category</h3>
                            <div class="form-group">
                                <select class="ps-select" id="category">
                                    <option>Choose Category</option>

                                    @foreach ($categories as $category )
                                    
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                     
                                    @endforeach
                                </select>
                            </div>
                        </aside>
                        <aside class="widget widget--vendor">
                            <h3 class="widget-title">Filter by Location</h3>
                            <div class="form-group">
                                <select class="ps-select" id="city">
                                    <option>Chooose city</option>
                                    @foreach ($cities as $city)
                                    
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                     
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="ps-select" id="area">
                                    <option>Chooose Area</option>
                              
                                </select>
                            </div>
                            
                        </aside>
                    </div>
                    <div class="ps-section__right col-8">
                        <section class="ps-store-box">
                           
                            <div class="ps-section__content">
                                <div class="row" id="supplier">
                                    @foreach ($suppliers as $supplier)
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                        <article class="ps-block--store">
                                            <div class="ps-block__thumbnail bg--cover" data-background="{{url('front/img/vendor/store/1.jpg')}}"></div>
                                            <div class="ps-block__content">
                                                <div class="ps-block__author"><a class="ps-block__user" href="#"><img src="img/vendor/store/user/3.jpg" alt=""></a>
                                                    <a class="ps-btn" href="{{route('front.suppliers.index',['supplier'=>$supplier->name])}}">Visit Store</a></div>
                                                <h4>{{$supplier->name}}</h4>
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select>
                                                <p>{{$supplier->address}}</p>
                                                <div class="ps-block__inquiry"><a href="#"><i class="icon-question-circle"></i> inquiry</a></div>
                                            </div>
                                        </article>
                                    </div>
                                         @endforeach
                                </div>
                                <div class="ps-pagination">
                                    <ul class="pagination">
                                     {{$suppliers->appends(Request::all())->links()}}
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    var config ={
        _url:"{{url('/get_areas/')}}",
        f_url:"{{url('/get_suppliers/')}}",
        url:"{{url('/')}}",
        cs_url:"{{url('/get_suppliers_search/')}}",


    }
</script>
<script src="{{ asset('assets/js/pages/ajaxrequests.js') }}"></script>
<script src="{{ asset('assets/js/pages/filters.js') }}"></script>


@stop