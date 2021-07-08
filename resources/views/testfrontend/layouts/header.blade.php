    <header>
        <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Welcome to Our store</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 01768618001</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                            </li>
                            <li class="onhover-dropdown mobile-account"> <i class="fa fa-user" aria-hidden="true"></i>
                                My Account
                                <ul class="onhover-show-div">
                                @auth
                                    @if(isAdmin())
                                        <li class="list-inline-item mr-3">
                                            <a href="{{ route('admin.dashboard') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('My Panel')}}</a>
                                        </li>
                                    @else
                                        <li class="list-inline-item mr-3">
                                            <a href="{{ route('dashboard') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('My Panel')}}</a>
                                        </li>
                                    @endif
                                    <li class="list-inline-item">
                                        <a href="{{ route('logout') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Logout')}}</a>
                                    </li>
                                @else
                                    <li class="list-inline-item mr-3">
                                        <a href="{{ route('user.login') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Login')}}</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ route('user.registration') }}" class="text-reset py-2 d-inline-block opacity-60">{{ translate('Registration')}}</a>
                                    </li>
                                @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">

                            {{-- Left Category Menu Start --}}
                            @include('testfrontend.partials.cat-menu')
                            {{-- Left Category Menu end --}}

                            {{-- Header logo --}}
                                @php
                                    $header_logo = get_setting('header_logo');
                                @endphp
                                <div class="brand-logo">
                                    @if($header_logo != null)
                                    <a href="{{ route('front.home') }}"><img src="{{ asset($header_logo) }}"
                                            class="lazyload mw-100 h-30px h-md-40px" height="40" alt="{{ env('APP_NAME') }}"></a>
                                    @else
                                    <a href="{{ route('front.home') }}"><img src="{{asset('frontend/assets/images/icon/logo.png')}}"
                                            class="lazyload mw-100 h-30px h-md-40px" height="40" alt="{{ env('APP_NAME') }}"></a>
                                    @endif
                                </div>
                                {{-- Header logo --}}
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                    aria-hidden="true"></i></div>
                                        </li>
                                        @if ( get_setting('header_menu_labels') !=  null )
                                        @foreach (json_decode( get_setting('header_menu_labels'), true) as $key => $value)
                                        <li>
                                            <a href="{{ json_decode( get_setting('header_menu_links'), true)[$key] }}">{{ translate($value) }}</a>
                                        </li>
                                        @endforeach
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div><img src="{{asset('frontend/assets/images/icon/search.png')}}" onclick="openSearch()"
                                                    class="img-fluid blur-up lazyload" alt=""> <i class="ti-search"
                                                    onclick="openSearch()"></i></div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div> <span class="closebtn" onclick="closeSearch()"
                                                        title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Search a Product">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="fa fa-search"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-setting">
                                            <div><img src="{{asset('frontend/assets/images/icon/setting.png')}}"
                                                    class="img-fluid blur-up lazyload" alt=""> <i
                                                    class="ti-settings"></i></div>
                                            <div class="show-div setting">
                                                <h6>language</h6>
                                                <ul>
                                                    <li><a href="#">english</a></li>
                                                    <li><a href="#">french</a></li>
                                                </ul>
                                                <h6>currency</h6>
                                                <ul class="list-inline">
                                                    <li><a href="#">euro</a></li>
                                                    <li><a href="#">rupees</a></li>
                                                    <li><a href="#">pound</a></li>
                                                    <li><a href="#">doller</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div><img src="{{asset('frontend/assets/images/icon/cart.png')}}"
                                                    class="img-fluid blur-up lazyload" alt=""> <i
                                                    class="ti-shopping-cart"></i></div>
                                            <span class="cart_qty_cls">2</span>
                                            <ul class="show-div shopping-cart">
                                                <li>
                                                    <div class="media">
                                                        <a href="#"><img alt="" class="me-3"
                                                                src="{{asset('frontend/assets/images/fashion/product/1.jpg')}}"></a>
                                                        <div class="media-body">
                                                            <a href="#">
                                                                <h4>item name</h4>
                                                            </a>
                                                            <h4><span>1 x $ 299.00</span></h4>
                                                        </div>
                                                    </div>
                                                    <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                                aria-hidden="true"></i></a></div>
                                                </li>
                                                <li>
                                                    <div class="media">
                                                        <a href="#"><img alt="" class="me-3"
                                                                src="{{asset('frontend/assets/images/fashion/product/2.jpg')}}"></a>
                                                        <div class="media-body">
                                                            <a href="#">
                                                                <h4>item name</h4>
                                                            </a>
                                                            <h4><span>1 x $ 299.00</span></h4>
                                                        </div>
                                                    </div>
                                                    <div class="close-circle"><a href="#"><i class="fa fa-times"
                                                                aria-hidden="true"></i></a></div>
                                                </li>
                                                <li>
                                                    <div class="total">
                                                        <h5>subtotal : <span>$299.00</span></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="buttons"><a href="cart.html" class="view-cart">view
                                                            cart</a> <a href="#" class="checkout">checkout</a></div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>