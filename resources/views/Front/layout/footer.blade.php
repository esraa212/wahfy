
     <div class="ps-newsletter row justify-content-center">
    
                <form class="ps-form--newsletter" action="{{route('front.subscribe')}}" method="post" id="subscribeEmailForm">
                    @csrf
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
                    <div class="row">
                       
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__left">
                                <h3>Newsletter</h3>
                                <p>Subcribe to get information about products and coupons</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-form__right">
                              
                                <div class="form-group--nest form-group">
                                    
                                    <input class="form-control" type="email" placeholder="Email address" name="email">
                                             <label for="email"></label>
                                <span class="help-block"></span>
                                    <button class="ps-btn submit-form'">Subscribe</button>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </form>
         
        </div>
    </div>




    <footer class="ps-footer row justify-content-center">

            <div class="ps-footer__widgets">
                <aside class="widget widget_footer widget_contact-us">
                    <h4 class="widget-title">Contact us</h4>
                    <div class="widget_content">
                        <p>Call us 24/7</p>
                        <h3>1800 97 97 69</h3>
                        <p>502 New Design Str, Melbourne, Australia <br><a href="http://nouthemes.net/cdn-cgi/l/email-protection#42212d2c36232136022f2330362437303b6c212d"><span class="__cf_email__" data-cfemail="3754585943565443775a5645435142454e195458">[email&#160;protected]</span></a></p>
                        <ul class="ps-list--social">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </aside>
                <aside class="widget widget_footer">
                    <h4 class="widget-title">Quick links</h4>
                    <ul class="ps-list--link">
                        <li><a href="#">Policy</a></li>
                        <li><a href="#">Term & Condition</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Return</a></li>
                        <li><a href="faqs.html">FAQs</a></li>
                    </ul>
                </aside>
                <aside class="widget widget_footer">
                    <h4 class="widget-title">Company</h4>
                    <ul class="ps-list--link">
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="#">Affilate</a></li>
                        <li><a href="#">Career</a></li>
                        <li><a href="contact-us.html">Contact</a></li>
                    </ul>
                </aside>
                <aside class="widget widget_footer">
                    <h4 class="widget-title">Bussiness</h4>
                    <ul class="ps-list--link">
                        <li><a href="#">Our Press</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="my-account.html">My account</a></li>
                        <li><a href="shop-default.html">Shop</a></li>
                    </ul>
                </aside>
            </div>
        
            <div class="ps-footer__copyright">
                <p>© 2021 WAHFY BY 212Solutions. All Rights Reserved</p>
                <p><span>We Using Safe Payment For:</span><a href="#"><img src="{{url('front/img/payment-method/1.jpg')}}" alt=""></a><a href="#"><img src="{{url('front/img/payment-method/2.jpg')}}" alt=""></a>
                    <a href="#"><img src="{{url('front/img/payment-method/3.jpg')}}" alt=""></a>
                    <a href="#"><img src="{{url('front/img/payment-method/4.jpg')}}" alt=""></a>
                    <a href="#"><img src="{{url('front/img/payment-method/5.jpg')}}" alt=""></a></p>
            </div>
       
    </footer>
    <div id="back2top"><i class="icon icon-arrow-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="http://nouthemes.net/html/martfury/do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
 
