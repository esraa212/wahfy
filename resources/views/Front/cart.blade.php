@extends('Front.layout.master')
@section('content')
 <div class="ps-section--shopping ps-shopping-cart">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Shopping Cart</h1>
                </div>
     
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--shopping-cart ps-table--responsive" id="cart" >
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php $total = 0 ?>
                             @if(session('cart'))
                     @foreach(session('cart') as $id => $details)
                       <?php $total += $details['price'] * $details['quantity'] ?>
                                <tr>
                                    <td data-label="Product">
                                        <div class="ps-product--cart">
                                            <div class="ps-product__thumbnail"><a href="{{route('front.suppliers.product',['product'=>$details['title'] ])}}"><img src="{{ url(''.$details['image'].'')}}" alt=""></a></div>
                                            <div class="ps-product__content"><a href="{{route('front.suppliers.product',['product'=>$details['title'] ])}}">{{ $details['title'] }}</a>
                                                <p>Sold By:<strong> {{ $details['brand'] }}</strong></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-label="Price">{{$details['price']}}</td>
                                    <td data-label="Quantity">
                                        <div class="form-group--number">
                                            <button class="up">+</button>
                                            <button class="down">-</button>
                                            <input class="form-control" type="text" placeholder="1" value="{{$details['quantity']}}">
                                        </div>
                                    </td>
                                    <td data-label="Total">{{$total}}</td>
                                    <td data-label="Actions"><a href="#"><i class="icon-cross"></i></a></td>
                                </tr>
                                @endforeach
                              
                              
                            </tbody>
                        </table>
                    </div>
           
                 
                </div>
                <div class="ps-section__footer">
                    <div class="row justify-content-center">
                       
         
                        <div class="col-4">
                            <div class="ps-block--shopping-total">
                                <div class="ps-block__header">
                                    <p>Subtotal <span> {{$total}}LE</span></p>
                                </div>
                                <div class="ps-block__content">
                                    <ul class="ps-block__product">
                                 @foreach(session('cart') as $id => $details)

                                        <li><span class="ps-block__shop">Brand:{{$details['brand']}}</span>
                                            <span class="ps-block__shipping">Free Shipping</span>
                                        </li>
                                       @endforeach
                                        
                                    </ul>
                                    <h3 id="price" >{{$total}}</h3>LE
                     <input type="hidden" name="id" value="{{$total}}" id="id">

                                </div>
                                
                            </div><a class="ps-btn ps-btn--fullwidth" href="{{route('front.checkoutForm',['price'=>$total])}}">Proceed to checkout</a>
                            @else
                            <div class="row justify-content-center">
                              
                                 <h1 class="text-warning mb-5">
                                     Your Cart Is Empty
                                 </h1>
                               
                            </div>
                            @endif
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
@endsection
