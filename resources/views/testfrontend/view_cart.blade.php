@extends('testfrontend.layouts.master')
@section('front-content')

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--section start-->
<section class="cart-section section-b-space" id="cart-summary">
    <div class="container">
        @if( $carts && count($carts) > 0 )
        <div class="row">
            <div class="col-sm-12">
                {{-- <div class="cart_counter">
                    <div class="countdownholder">
                        Your cart will be expired in<span id="timer"></span> minutes!
                    </div>
                    <a href="checkout.html" class="cart_checkout btn btn-solid btn-xs">check out</a>
                </div> --}}
            </div>
            <div class="col-sm-12 table-responsive-xs">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">tax</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>
                    @php
                    $total = 0;
                    @endphp
                    @foreach ($carts as $key => $cartItem)
                    @php
                    $product = \App\Product::find($cartItem['product_id']);
                    $total = $total + ($cartItem['price'] * $cartItem['quantity']) + $cartItem['tax'];
                    $product_name_with_choice = $product->getTranslation('name');
                    if ($cartItem['variation'] != null) {
                    $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variation'];
                    }
                    @endphp
                    <tbody>
                        <tr>
                            <td>
                                <a href="#"><img src="{{ asset($product->thumbnail_img) }}"
                                        alt="{{ $product->getTranslation('name')  }}"></a>
                            </td>
                            <td>
                                <a href="#">{{ $product->getTranslation('name')  }}</a>
                            </td>
                            <td>
                                <h2>{{ single_price($cartItem['price']) }}</h2>
                            </td>
                            <td>
                                <h2>{{ single_price($cartItem['tax']) }}</h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    @if($cartItem['digital'] != 1)
                                    <div class="input-group">
                                        <input type="number" name="quantity[{{ $cartItem['id'] }}]"
                                            class="form-control input-number" value="{{ $cartItem['quantity'] }}"
                                            min="1" max="10" onchange="updateQuantity({{ $cartItem['id'] }}, this)">
                                    </div>
                                    @endif
                                </div>
                            </td>
                            <td><a href="{{ route('cart.removeCart',$cartItem->id) }}" class="icon"><i
                                        class="ti-close"></i></a></td>
                            <td>
                                <h2 class="td-color">
                                    {{ single_price(($cartItem['price'] + $cartItem['tax']) * $cartItem['quantity']) }}
                                </h2>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach

                </table>
                <div class="table-responsive-md">
                    <table class="table cart-table ">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>{{ single_price($total) }}</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-6"><a href="#" class="btn btn-solid">continue shopping</a></div>
            <div class="col-6"><a href="#" class="btn btn-solid">check out</a></div>
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
                            <th scope="col">tax</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td colspan="7" class="text-center p-5">
                                Your Cart Is Empty Now !
                            </td>

                        </tr>
                    </tbody>


                </table>

                @endif
            </div>
</section>
<!--section end-->


@endsection

@push('front-script')
<script type="text/javascript">
    function removeFromCartView(e, key){
            e.preventDefault();
            removeFromCart(key);
        }

        function updateQuantity(key, element){
            $.post('{{ route('cart.updateQuantity') }}', { 
                _token   :  '{{ csrf_token() }}', 
                id       :  key, 
                quantity :  element.value
            }, function(data){
                updateNavCart();
                $('#cart-summary').html(data);
            });
        }

</script>
@endpush