<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{route('admin.index')}}"><img src="{{url('assets/images/icon.svg')}}" alt="Logo"
                class="img-fluid logo"><span>WAHFY</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i
                class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{url('assets/images/user.png')}}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="user-name" data-toggle="dropdown"><strong>
                        {{isset(\Auth::guard('dashboard')->user()->name) ? \Auth::guard('dashboard')->user()->name : null}}</strong></a>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">

             
            
          
                <li class="{{ Request::segment(2) === 'locations' ? 'active open' : null }}">
                    <a href="" class="has-arrow"><i class="icon-anchor"></i><span>Locations</span></a>
                    <ul>
                        <li><a href="{{route('admin.cities.index')}}">Cities</a></li>
                        <li><a href="{{route('admin.areas.index')}}">Areas</a></li>

                    </ul>
                </li>
                <li class="{{ Request::segment(2) === 'Industries' ? 'active open' : null }}">
                    <a href="{{route('admin.industries.index')}}"><i class="icon-tag"></i><span>Industries</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'Industry Categories' ? 'active open' : null }}">
                    <a href="" class="has-arrow"><i class="icon-layers"></i><span>industry Categories</span></a>
                    <ul>
                        <li><a href="{{route('admin.categories.index')}}">Categories</a></li>
                        <li><a href="{{route('admin.subCategories.index')}}">Sub Categories</a></li>

                    </ul>
                </li>

                <li class="{{ Request::segment(2) === 'suppliers' ? 'active open' : null }}">
                    <a href="{{route('admin.suppliers.index')}}"><i class="icon-frame"></i><span>suppliers</span></a>
                </li>

                <li class="{{ Request::segment(2) === 'Product Categories' ? 'active open' : null }}">
                    <a href="" class="has-arrow"><i class="icon-bag"></i><span>Supplier Categories</span></a>
                    <ul>
                        <li><a href="{{route('admin.product_categories.index')}}">Categories</a></li>
                        <li><a href="{{route('admin.product_subCategories.index')}}">Sub Categories</a></li>

                    </ul>
                </li>
                <li class="{{ Request::segment(2) === 'products' ? 'active open' : null }}">
                    <a href="" class="has-arrow"><i class="icon-badge"></i><span>Products </span></a>
                    <ul>
                        <li><a href="{{route('admin.products.index')}}"> products</a></li>
                        <li><a href="{{route('admin.colors.index')}}">product Colors</a></li>
                         
                        <li><a href="{{route('admin.attributes.index')}}">product Attributes</a></li>
                        <li><a href="{{route('admin.favorites.index')}}">Favorite products</a></li>

                        <li><a href="{{route('admin.rating.index')}}">products Rating</a></li>

                    </ul>
                </li>
                <li class="{{ Request::segment(2) === 'deals' ? 'active open' : null }}">
                    <a href="{{route('admin.deals.index')}}"><i class="icon-present"></i><span>Deals</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'banners' ? 'active open' : null }}">
                    <a href="{{route('admin.banners.index')}}"><i class="icon-paper-clip"></i><span>Banners</span></a>
                </li>
               
                <li class="{{ Request::segment(2) === 'advertisments' ? 'active open' : null }}">
                    <a href="{{route('admin.advertisments.index')}}"><i class="icon-film"></i><span>Advertisments</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'customers' ? 'active open' : null }}">
                    <a href="{{route('admin.customers.index')}}"><i class="icon-users"></i><span>Customers</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'notifications' ? 'active open' : null }}">
                    <a href="{{route('admin.notifications.index')}}"><i class="icon-bell"></i><span>Notifications</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'payments' ? 'active open' : null }}">
                    <a href="{{route('admin.payments.index')}}"><i class="icon-wallet"></i><span>Payments</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'feedback' ? 'active open' : null }}">
                    <a href="{{route('admin.feedback.index')}}"><i class="icon-book-open"></i><span>Feedback</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'dialogs' ? 'active open' : null }}">
                    <a href="{{route('admin.dialogs.index')}}"><i class="icon-bubble"></i><span>Dialogs</span></a>
                </li>
                <li class="{{ Request::segment(2) === 'orders' ? 'active open' : null }}">
                    <a href="{{route('admin.orders.index')}}"><i class="icon-equalizer"></i><span>orders</span></a>
                </li>
                     <li class="{{ Request::segment(2) === 'subscriptions' ? 'active open' : null }}">
                    <a href="{{route('admin.subscriptions.index')}}"><i class="icon-arrow-up"></i><span>subscriptions</span></a>
                </li>
            </ul>


        </nav>
    </div>
</div>
