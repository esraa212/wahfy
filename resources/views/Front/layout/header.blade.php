    <div class="ps-block--promotion-header bg--cover" data-background="{{url('front/img/promotions/header-promotion.jpg')}}">
        <div class="container">
            <div class="ps-block__left">
                <h3>20%</h3>
                <figure>
                    <p>Discount</p>
                    <h4>For Books Of March</h4>
                </figure>
            </div>
            <div class="ps-block__center">
                <p>Enter Promotion<span>Sale2019</span></p>
            </div><a class="ps-btn ps-btn--sm" href="#">Shop now</a>
        </div>
    </div>
    <header class="header header--standard header--market-place-1" data-sticky="true">
    
        <div class="header__content">
            <div class="container">
                <div class="header__content-left">
                    <div class="menu--product-categories">
                        <div class="menu__toggle">
                            <i class="icon-menu"></i><span> Shop by Department</span></div>
                        <div class="menu__content">
                            <ul class="menu--dropdown">
                                   @foreach ($industries as $industry )
                             <li class="menu-item-has-children has-mega-menu">
                                     <a href="#"><i class="icon-laundry"></i> {{$industry->name}}</a>
                                    @if($industry->categories->count()>0)
                                    <div class="mega-menu">
                                        @foreach ($industry->categories as $i_category ) 
                                        <div class="mega-menu__column">
                                            <h4><a href="{{url('Products/1/'.$i_category->name.'')}}">{{$i_category->name}}</a><span class="sub-toggle"></span></h4>
                                            @if($i_category->sub_categories!=null)
                                            <ul class="mega-menu__list">
                                                @foreach($i_category->sub_categories as $i_sub_category)
                                                <li><a href="{{url('Products/2/'.$i_sub_category->name.'')}}">{{$i_sub_category->name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                           @endforeach
                                      
                                    </div>
                                    @endif
                                </li>
                                  @endforeach
                                
                         
    
                            </ul>
                        </div>
                    </div><a class="ps-logo" href="{{route('front.home')}}"><img src="{{url('front/img/wahfy.png')}}" style="width:180px;height:50px" alt="wahfy"></a>
					
				
                </div>
                <div class="header__content-center">
					
                    <form class="ps-form--quick-search ml-4" action="http://nouthemes.net/html/martfury/index.html" method="get">
                        <div class="form-group--icon"><i class="icon-chevron-down"></i>
                            <select class="form-control">
                                <option value="1">All</option>
                                <option value="1">Smartphone</option>
                                <option value="1">Sounds</option>
                                <option value="1">Technology toys</option>
                            </select>
                        </div>
                        <input class="form-control" type="text" placeholder="I'm shopping for...">
                        <button>Search</button>
                    </form>
                </div>
                <div class="header__content-right">
					
                    <div class="header__actions"><a class="header__extra" href="#"><i class="icon-heart"></i><span><i>0</i></span></a>
                        <div class="ps-cart--mini"><a class="header__extra" href="{{route('front.cart')}}"><i class="icon-bag2"></i><span><i>{{session('cart')?count(session('cart')):0}}</i></span></a>
                            <div class="ps-cart__content">
                                <?php $total = 0 ?>
                             @if(session('cart'))
                     @foreach(session('cart') as $id => $details)
                       <?php $total += $details['price'] * $details['quantity'] ?>
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail"><a href="#"><img src="{{url(''.$details['image'].'')}}" alt="{{$details['title']}}"></a></div>
                        <div class="ps-product_content"><a class="ps-product_remove" href="#"><i class="icon-cross"></i></a><a href="{{route('front.suppliers.product',['product'=>$details['title']])}}">{{$details['title']}}</a>
                            <p><strong>Sold by:</strong> {{$details['brand']}}</p><small>{{$details['quantity']}} x {{$details['price']}}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="ps-cart__footer">
                    <h3>Sub Total:<strong>{{$total}}</strong></h3>
                    <figure><a class="ps-btn" href="{{route('front.cart')}}">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                </div>
                @endif
                            </div>
                        </div>
                        <div class="ps-block--user-header">
                            <div class="ps-block__left"><i class="icon-user"></i></div>
                            <div class="ps-block__right">

									@guest('customers')
					<a href="{{route('front.loginForm')}}">Login</a>
							
				@if (Route::has('register'))
				<a href="{{route('front.registerForm')}}">Register</a>
			@endif
	
			
		
		@else
           <div class="dropdown">
            <button type="button" style="background-color: initial !important;color:black" class="btn  dropdown-toggle"
                data-toggle="dropdown">
          Welcome,{{Auth::guard('customers')->user()->name}}
            </button>
         <div class="dropdown-menu row">
             
               <div class="col-12">
	<form id="logout-form" action="{{ route('front.logout') }}" method="POST">
						    <button style="background-color: white;border:thick;"
                                  class="text-danger">
                                <i class="icon-power" aria-hidden="true"></i>Logout
                                </button>
						@csrf
					</form>
               </div>
         </div>
		
           </div>
				
			@endguest
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navigation">
			
            <div class="container">
                <div class="navigation__left">
                    <div class="menu--product-categories">
						
                        <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                        <div class="menu__content">
                            <ul class="menu--dropdown">
                        @foreach ($industries as $industry )
                                <li class="menu-item-has-children has-mega-menu">
                                    <a href="#"><i class="icon-laundry"></i> {{$industry->name}}</a>
                                    @if($industry->categories->count()>0)
                                    <div class="mega-menu">
                                        @foreach ($industry->categories as $i_category ) 
                                        <div class="mega-menu__column">
                             <h4><a href="{{url('Products/1/'.$i_category->name.'')}}">{{$i_category->name}}</a><span class="sub-toggle"></span></h4>
                                            @if($i_category->sub_categories!=null)
                                            <ul class="mega-menu__list">
                                                @foreach($i_category->sub_categories as $i_sub_category)
                                                <li><a href="{{url('Products/2/'.$i_sub_category->name.'')}}">{{$i_sub_category->name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                           @endforeach
                                      
                                    </div>
                                    @endif
                                </li>
                              @endforeach 
                             
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="navigation__right">
				
                    <ul class="menu fav">
			@php
		$ids=array();
		$ids=['a-skyblue','a-darkgreen','a-purple','a-gold','a-red','a-blue','a-lightgreen','a-skyblue'];
		
		@endphp
		@if(Auth::guard('customers')->user())	
		@php
		$c_categories=json_decode(Auth::guard('customers')->user()->categories);
		@endphp
		@foreach($c_categories as $category)
		@php
		$c_industries=App\Models\Industry::where('id',$category)->get();
		@endphp
	@foreach ($c_industries as $industry)
	<li class=""><a id="{{$ids[$category-1]}}" href="{{route('indusrty.show',['industry'=>$industry->name])}}">{{$industry->name}}</a></li>
	@endforeach
				
		@endforeach
		@else
        
		@foreach ($industries as $item)
				<li class=""><a id="{{$ids[$item->id-1]}}" href="{{route('indusrty.show',['industry'=>$item->name])}}">{{$item->name}}</a></li>
		@endforeach

		@endif
                    </ul>
                   
                </div>
            </div>
        </nav>
    </header>
    <header class="header header--mobile" data-sticky="true">
        <div class="header__top">
            <div class="header__left">
                <p>Welcome to Martfury Online Shopping Store !</p>
            </div>
            <div class="header__right">
                <ul class="navigation__extra">
                    <li><a href="#">Sell on Martfury</a></li>
                    <li><a href="#">Tract your order</a></li>
                    <li>
                        <div class="ps-dropdown"><a href="#">US Dollar</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#">Us Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="ps-dropdown language"><a href="#"><img src="img/flag/en.png" alt="">English</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="#"><img src="img/flag/germany.png" alt=""> Germany</a></li>
                                <li><a href="#"><img src="img/flag/fr.png" alt=""> France</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navigation--mobile">
            <div class="navigation__left"><a class="ps-logo" href="index.html"><img src="img/logo_light.png" alt=""></a></div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-cart--mini"><a class="header__extra" href="{{route('front.cart')}}"><i class="icon-bag2"></i><span><i>{{session('cart')?count(session('cart')):0}}</i></span></a>
                        <div class="ps-cart__content">
                                <?php $total = 0 ?>
                             @if(session('cart'))
                            <div class="ps-cart__items">
                                
                   @foreach(session('cart') as $id => $details)
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="{{route('front.suppliers.product',['product'=>$details['title']])}}"><img src="{{url(''.$details['image'].'')}}" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                                        <p><strong>Sold by:</strong> {{$details['brand']}}</p><small>{{$details['quantity']}} x {{$details['price']}}</small>
                                    </div>
                                </div>
                                @endforeach
                              
                            </div>
                            <div class="ps-cart__footer">
                                <h3>Sub Total:<strong>{{$total}} LE</strong></h3>
                                <figure><a class="ps-btn" href="{{route('front.cart')}}">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><i class="icon-user"></i></div>
                        <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-search--mobile">
            <form class="ps-form--search-mobile" action="http://nouthemes.net/html/martfury/index.html" method="get">
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="Search something...">
                    <button><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
    </header>
    <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
            <h3>Shopping Cart</h3>
        </div>
        <div class="navigation__content">
             <?php $total = 0 ?>
             @if(session('cart'))
            <div class="ps-cart--mobile">
                 
                     @foreach(session('cart') as $id => $details)
                <div class="ps-cart__content">
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail"><a href=""{{route('front.suppliers.product',['product'=>$details['title']])}}""><img src="{{url(''.$details['image'].'')}}" alt=""></a></div>
                        <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="{{route('front.suppliers.product',['product'=>$details['title']])}}">{{$details['title']}}</a>
                            <p><strong>Sold by:</strong> {{$details['brand']}}</p><small>{{$details['quantity']}} x {{$details['price']}}/small>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="ps-cart__footer">
                    <h3>Sub Total:<strong>{{$total}} LE</strong></h3>
                    <figure><a class="ps-btn" href="{{route('front.cart')}}">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="ps-panel--sidebar" id="navigation-mobile">
        <div class="ps-panel__header">
            <h3>Categories</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                     @if($industry->categories->count()>0)
                    <div class="mega-menu">
                            @foreach ($industry->categories as $i_category ) 
                        <div class="mega-menu__column">
                   <h4><a href="{{url('Products/1/'.$i_category->name.'')}}">{{$i_category->name}}</a><span class="sub-toggle"></span></h4>
                                 @if($i_category->sub_categories!=null)
                            <ul class="mega-menu__list">
                            @foreach($i_category->sub_categories as $i_sub_category)
                            <li><a href="{{url('Products/2/'.$i_sub_category->name.'')}}">{{$i_sub_category->name}}</a>
                            </li>
                            @endforeach
                
                            </ul>
                            @endif
                        </div>
                        @endforeach
                       
                    </div>
                    @endif
              
            </ul>
        </div>
    </div>
    <div class="navigation--list">
        <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
    </div>
    <div class="ps-panel--sidebar" id="search-sidebar">
        <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="http://nouthemes.net/html/martfury/index.html" method="get">
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="Search something...">
                    <button><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
        <div class="navigation__content"></div>
    </div>
    <div class="ps-panel--sidebar" id="menu-mobile">
        <div class="ps-panel__header">
            <h3>Menu</h3>
        </div>
        <div class="ps-panel__content">
                  @if($industry->categories->count()>0)
            <ul class="menu--mobile">
               @foreach ($industry->categories as $i_category ) 
                <li class="menu-item-has-children"><a href="{{url('Products/1/'.$i_category->name.'')}}">{{$i_category->name}}</a><span class="sub-toggle"></span>
                           @if($i_category->sub_categories!=null)
                    <ul class="sub-menu">
                        @foreach($i_category->sub_categories as $i_sub_category)
                        <li><a href="{{url('Products/2/'.$i_sub_category->name.'')}}">{{$i_sub_category->name}}</a>
                            </li>
                            @endforeach
       
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
             @endif
        </div>
    </div>