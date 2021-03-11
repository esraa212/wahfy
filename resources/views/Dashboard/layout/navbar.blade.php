<nav class="navbar top-navbar">
    <div class="container-fluid">
        <div class="navbar-left">
            <div class="navbar-btn">
                <a href="{{route('admin.index')}}"><img src="{{url('/assets/images/icon.svg')}}" alt="Logo"
                        class="img-fluid logo"></a>
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
            </div>

        </div>
        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i
                                class="icon-magnifier"></i></a></li>
                    <li>
                          <form action="{{url('/logout')}}" method="post" style="background-color:inherit">
                               <button style="background-color:inherit" class="icon-menu btn btn-xs "><i class="icon-power"></i></button>
                                                @csrf
                                 </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
</nav>
