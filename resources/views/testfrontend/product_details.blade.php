@extends('testfrontend.layouts.master')
@section('front-content')
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>product</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section>
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-sm-2 col-xs-12">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-right-nav">
                                @php
                                $photos = explode(',', $detailedProduct->photos);
                                @endphp
                                @foreach ($photos as $key => $photo)
                                <div>
                                    <img src="{{ asset($photo)}}" alt="" class="img-fluid blur-up lazyload">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-10 col-xs-12 order-up">
                    <div class="product-right-slick">
                        @foreach ($photos as $key => $photo)
                        <div><img src="{{ asset($photo)}}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 rtl-text">
                    <div class="product-right">
                        <div class="product-count">
                            <ul>
                                <li>
                                    <img src="{{ asset('frontend/assets/images/fire.gif')}}" class="img-fluid"
                                        alt="image">
                                    <span class="p-counter">37</span>
                                    <span class="lang">orders in last 24 hours</span>
                                </li>
                                <li>
                                    <img src="{{ asset('frontend/assets/images/person.gif')}}"
                                        class="img-fluid user_img" alt="image">
                                    @php
                                    $total = 0;
                                    $total += $detailedProduct->reviews->count();
                                    @endphp
                                    <span class="p-counter">({{ $total }}) </span>
                                    <span class="lang">active view this</span>
                                </li>
                            </ul>
                        </div>
                        <h2>{{ $detailedProduct->getTranslation('name') }}</h2>
                        <div class="rating-section">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            </div>
                            <h6>120 ratings</h6>
                        </div>
                        <div class="label-section">
                            <span class="badge badge-grey-color">#1 Best seller</span>
                            <span class="label-text">in fashion</span>
                        </div>
                        <h3 class="price-detail">$32.96 <del>$459.00</del><span>55% off</span></h3>

                        <div id="" class="addeffect-section product-description border-product">
                            <form action="{{ route('cart.addCart',$detailedProduct->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @if ($detailedProduct->choice_options != null)
                                @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)

                                <div class="row no-gutters">
                                    <div class="col-sm-2">
                                        <div class="opacity-50 my-2">
                                            {{ \App\Attribute::find($choice->attribute_id)->getTranslation('name') }}:
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="aiz-radio-inline">
                                            @foreach ($choice->values as $key => $value)
                                            <label class="aiz-megabox pl-0 mr-2">
                                                <input type="radio" name="attribute_id_{{ $choice->attribute_id }}"
                                                    value="{{ $value }}" @if($key==0) checked @endif>
                                                <span
                                                    class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-2">
                                                    {{ $value }}
                                                </span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                @endif

                                @if (count(json_decode($detailedProduct->colors)) > 0)
                                <div class="row no-gutters">
                                    <div class="col-sm-2">
                                        <div class="opacity-50 my-2">{{ translate('Color')}}:</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="aiz-radio-inline">
                                            @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                            <label class="aiz-megabox pl-0 mr-2" data-toggle="tooltip"
                                                data-title="{{ \App\Color::where('code', $color)->first()->name }}">
                                                <input type="radio" name="color"
                                                    value="{{ \App\Color::where('code', $color)->first()->name }}"
                                                    @if($key==0) checked @endif>
                                                <span
                                                    class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                    <span class="size-30px d-inline-block rounded"
                                                        style="background: {{ $color }};"></span>
                                                </span>
                                            </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                @endif

                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number"
                                            value="{{ $detailedProduct->min_qty }}"
                                            min="{{ $detailedProduct->min_qty }}" max="10">
                                        <span class="input-group-prepend"><button type="button"
                                                class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                        </div>
                        <div class="product-buttons">
                            {{-- <a href="javascript:void(0)" id="cartEffect"
                                class="btn btn-solid hover-solid btn-animation"><i class="fa fa-shopping-cart me-1"
                                    aria-hidden="true"></i> add to cart</a>  --}}
                            <button class="btn btn-solid hover-solid btn-animation" type="submit"><i
                                    class="fa fa-shopping-cart me-1" aria-hidden="true"></i>add to cart</button>


                            <a href="{{ route('add-to-wishlist',$detailedProduct->id) }}" class="btn btn-solid"><i
                                    class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>wishlist</a></div>

                        </form>
                        <div class="product-count">
                            <ul>
                                <li>
                                    <img src="{{ asset('frontend/assets/images/icon/truck.png')}}" class="img-fluid"
                                        alt="image">
                                    <span class="lang">Free shipping for orders above $500 USD</span>
                                </li>
                            </ul>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">Sales Ends In</h6>
                            <div class="timer">
                                <p id="demo"></p>
                            </div>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">shipping info</h6>
                            <ul class="shipping-info">
                                <li>100% Original Products</li>
                                <li>Free Delivery on order above Rs. 799</li>
                                <li>Pay on delivery is available</li>
                                <li>Easy 30 days returns and exchanges</li>
                            </ul>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">share it</h6>
                            <div class="product-icon">
                                <ul class="product-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->


<!-- product-tab starts -->
<section class="tab-product m-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                            href="#top-home" role="tab" aria-selected="true"><i
                                class="icofont icofont-ui-home"></i>Details</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab"
                            href="#top-profile" role="tab" aria-selected="false"><i
                                class="icofont icofont-man-in-glasses"></i>Specification</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab"
                            href="#top-contact" role="tab" aria-selected="false"><i
                                class="icofont icofont-contacts"></i>Video</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review"
                            role="tab" aria-selected="false"><i class="icofont icofont-contacts"></i>Write Review</a>
                        <div class="material-border"></div>
                    </li>
                </ul>
                <div class="tab-content nav-material" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="product-tab-discription">
                            <div class="part">
                                <p>{!! $detailedProduct->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <p>The Model is wearing a white blouse from our stylist's collection, see the image for a
                            mock-up of what the actual blouse would look like.it has text written on it in a black
                            cursive language which looks great on a white color.</p>
                        <div class="single-product-tables">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Sleeve Length</td>
                                        <td>Sleevless</td>
                                    </tr>
                                    <tr>
                                        <td>Neck</td>
                                        <td>Round Neck</td>
                                    </tr>
                                    <tr>
                                        <td>Occasion</td>
                                        <td>Sports</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Fabric</td>
                                        <td>Polyester</td>
                                    </tr>
                                    <tr>
                                        <td>Fit</td>
                                        <td>Regular Fit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="">
                            <iframe width="560" height="315" src="{{ $detailedProduct->video_link }}"
                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                        <form class="theme-form">
                            <div class="form-row row">
                                <div class="col-md-12">
                                    <div class="media">
                                        <label>Rating</label>
                                        <div class="media-body ms-3">
                                            <div class="rating three-star"><i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your name"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="review">Review Title</label>
                                    <input type="text" class="form-control" id="review"
                                        placeholder="Enter your Review Subjects" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="review">Review Title</label>
                                    <textarea class="form-control" placeholder="Wrire Your Testimonial Here"
                                        id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-solid" type="submit">Submit YOur
                                        Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-tab ends -->


<!-- product section start -->
<section class="section-b-space ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col-12 product-related">
                <h2>related products</h2>
            </div>
        </div>

        <div class="row search-product">
            @foreach (filter_products(\App\Product::where('category_id', $detailedProduct->category_id)->where('id',
            '!=', $detailedProduct->id))->limit(10)->get() as $key => $product)
            <div class="col-xl-2 col-md-4 col-6">
                <div class="product-box">
                    @include('testfrontend.partials.productbox1',['product'=>$product])
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- product section end -->

@endsection