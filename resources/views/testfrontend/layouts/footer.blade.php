    <footer class="footer-light">
        <div class="light-layout">
            <div class="container">
                <section class="small-section border-section border-top-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="subscribe">
                                <div>
                                    <h4>KNOW IT ALL FIRST!</h4>
                                    <p>Never Miss Anything From Multikart By Signing Up To Our Newsletter.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form class="form-inline subscribe-form auth-form needs-validation" method="POST" action="{{ route('subscribers.store') }}" target="_blank">
                                @csrf
                                <div class="form-group mx-sm-3">
                                    <input type="email" class="form-control" placeholder="{{ translate('Your Email Address') }}" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-solid">
                                    {{ translate('Subscribe') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <section class="section-b-space light-layout">
            <div class="container">
                <div class="row footer-theme partition-f">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-title footer-mobile-title">
                            <h4>about</h4>
                        </div>
                        <div class="footer-contant">
                            <div class="footer-logo">
                                @php
                                    $header_logo = get_setting('header_logo');
                                @endphp
                                @if($header_logo != null)
                                    <img src="{{ asset($header_logo) }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40">
                                @else
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="mw-100 h-30px h-md-40px" height="40">
                                @endif
                            </div>
                            <p>
                            @php
                                echo get_setting('about_us_description');
                            @endphp
                            </p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>{{ get_setting('contact_address') }}</li>
                                    <li><i class="fa fa-phone"></i>Call Us: {{ get_setting('contact_phone') }}</li>
                                    <li><i class="fa fa-envelope-o"></i>Email: <a href="mailto:{{ get_setting('contact_email') }}">{{ get_setting('contact_email')  }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>why we choose</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">shipping & return</a></li>
                                    <li><a href="#">secure shopping</a></li>
                                    <li><a href="#">gallary</a></li>
                                    <li><a href="#">affiliates</a></li>
                                    <li><a href="#">contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>my account</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                @if (Auth::check())
                                    <li >
                                        <a href="{{ route('logout') }}">
                                            {{ translate('Logout') }}
                                        </a>
                                    </li>
                                @else
                                    <li >
                                        <a  href="{{ route('user.login') }}">
                                            {{ translate('Login') }}
                                        </a>
                                    </li>
                                @endif
                                <li >
                                    <a href="{{ route('purchase_history.index') }}">
                                        {{ translate('Order History') }}
                                    </a>
                                </li>
                                <li >
                                    <a  href="{{ route('wishlists.index') }}">
                                        {{ translate('My Wishlist') }}
                                    </a>
                                </li>
                                <li >
                                    <a  href="{{ route('orders.track') }}">
                                        {{ translate('Track Order') }}
                                    </a>
                                </li>
                                @if (\App\Addon::where('unique_identifier', 'affiliate_system')->first() != null && \App\Addon::where('unique_identifier', 'affiliate_system')->first()->activated)
                                    <li >
                                        <a  href="{{ route('affiliate.apply') }}">{{ translate('Be an affiliate partner')}}</a>
                                    </li>
                                @endif
                                @if (get_setting('vendor_system_activation') == 1)
                                    <div class="mt-3">
                                        <h4 >
                                            {{ translate('Be a Seller') }}
                                        </h4>
                                        <a href="{{ route('shops.create') }}" class="btn btn-primary btn-sm shadow-md">
                                            {{ translate('Apply Now') }}
                                        </a>
                                    </div>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="footer-end">
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2021 powered by ETL Tech Team.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="payment-card-bottom">
                            <ul>
                                <li>
                                    <a href="#"><img src="{{asset('frontend/assets/images/icon/visa.png')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('frontend/assets/images/icon/mastercard.png')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('frontend/assets/images/icon/paypal.png')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('frontend/assets/images/icon/american-express.png')}}" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{asset('frontend/assets/images/icon/discover.png')}}" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>