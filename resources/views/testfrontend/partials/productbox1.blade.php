<div class="img-wrapper">
    <div class="front">
        <a href="{{ route('product.details', $product->slug) }}"><img
                src="{{asset($product->thumbnail_img)}}"
                class="img-fluid blur-up lazyload bg-img" alt=""></a>
    </div>
    <div class="back">
        <a href="{{ route('product.details', $product->slug) }}"><img
                src="{{asset($product->photos)}}"
                class="img-fluid blur-up lazyload bg-img" alt=""></a>
    </div>
    <div class="cart-info cart-wrap">
        <button data-bs-toggle="modal" data-bs-target="#addtocart"
            title="Add to cart"><i class="ti-shopping-cart"></i></button> <a
            href="javascript:void(0)" title="Add to Wishlist"><i
                class="ti-heart" aria-hidden="true"></i></a> <a href="#"
            data-bs-toggle="modal" data-bs-target="#quick-view"
            title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
        <a href="compare.html" title="Compare"><i class="ti-reload"
                aria-hidden="true"></i></a>
    </div>
</div>
<div class="product-detail">
    <div class="rating rating-sm mt-1"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
            class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
    </div>
    <a href="product-page(no-sidebar).html">
        <h6>{{ $product->name }}</h6>
    </a>
    <div class="fs-15">
        @if(home_base_price($product->id) != home_discounted_base_price($product->id))
            <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>
        @endif
        <span class="fw-700 text-primary">{{ home_discounted_base_price($product->id) }}</span>
    </div>
    <ul class="color-variant">
        <li class="bg-light0"></li>
        <li class="bg-light1"></li>
        <li class="bg-light2"></li>
    </ul>
</div>