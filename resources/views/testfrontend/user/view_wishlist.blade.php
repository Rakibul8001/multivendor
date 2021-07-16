@extends('testfrontend.layouts.master')
@section('front-content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>wishlist</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="wishlist-section section-b-space">
    <div class="container">
        @if($wishlists && count($wishlists)>0)
        <div class="row">
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    @foreach ($wishlists as $key=>$wishlist )
                    @if ($wishlist->product != null)
                    <tbody>
                        <tr>
                            <td>
                                <a href="#"><img src="{{ asset($wishlist->product->thumbnail_img) }}" alt=""></a>
                            </td>
                            <td><a href="#">{{ $wishlist->product->name }}</a></td>
                            <td>
                                @if(home_base_price($wishlist->product->id) !=
                                home_discounted_base_price($wishlist->product->id))
                                <del class="opacity-60 mr-1">{{ home_base_price($wishlist->product->id) }}</del>
                                @endif
                                <span
                                    class="fw-600 text-primary">{{ home_discounted_base_price($wishlist->product->id) }}</span>

                            </td>
                            <td><a href="{{ route('delete-wishlist',$wishlist->id) }}" class="icon me-3"><i
                                        class="ti-close"></i> </a></td>
                        </tr>
                    </tbody>
                    @endif
                    @endforeach

                </table>
            </div>
        </div>
        <div class="row wishlist-buttons">
            <div class="col-12"><a href="#" class="btn btn-solid">continue shopping</a> <a href="#"
                    class="btn btn-solid">check out</a></div>
        </div>
        @else
        <div class="row">
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center p-5">
                                No Products In Wishlist!
                            </td>

                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
        @endif
    </div>
</section>
<!--section end-->



@endsection