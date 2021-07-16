@extends('testfrontend.layouts.master')
@section('front-content')



<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--  dashboard section start -->
<section class="dashboard-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="dashboard-sidebar">
                    <div class="profile-top">
                        <div class="profile-image">
                            <img src="{{asset(Auth::user()->avatar_original)}}" alt="" class="img-fluid">
                        </div>
                        <div class="profile-detail">
                            <h5>{{ Auth::user()->name }}</h5>

                        </div>
                    </div>
                    <div class="faq-tab">
                        <ul class="nav nav-tabs" id="top-tab" role="tablist">
                            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active"
                                    href="#dashboard">dashboard</a></li>
                            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                    href="#purchaseHistory">Purchase History</a>
                            </li>
                            {{-- <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                    href="#downloads">Downloads</a>
                            </li> --}}
                            <li class="nav-item"><a class="nav-link" href="{{ route('view-wishlist') }}">Wishlist</a>
                            </li>
                            {{-- <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#wallet">My Wallet</a>
                            </li> --}}
                            <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Manage
                                    Profile</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="faq-content tab-content" id="top-tabContent">
                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="counter-section">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="counter-box">
                                        @php
                                        $user_id = Auth::user()->id;
                                        $cart = \App\Cart::where('user_id', $user_id)->get();
                                        @endphp
                                        @if(count($cart) > 0)
                                        <div>
                                            <h3>{{ count($cart) }}</h3>
                                            <h5>Product(s) In your cart</h5>
                                        </div>
                                        @else
                                        <div>
                                            <h3>0</h3>
                                            <h5>Product In your cart</h5>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="counter-box">
                                        @php
                                        $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                                        $total = 0;
                                        foreach ($orders as $key => $order) {
                                        $total += count($order->orderDetails);
                                        }
                                        @endphp
                                        <div>
                                            <h3>{{ count(Auth::user()->wishlists)}}</h3>
                                            <h5>Product(s) In your wishlist</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="counter-box">
                                        @php
                                        $orders = \App\Order::where('user_id', Auth::user()->id)->get();
                                        $total = 0;
                                        foreach ($orders as $key => $order) {
                                        $total += count($order->orderDetails);
                                        }
                                        @endphp
                                        <div>
                                            <h3>{{ $total }}</h3>
                                            <h5>Product(s) You ordered</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="dashboard-right mt-4">
                                <div class="dashboard">

                                    <div class="box-account box-info">
                                        <div class="box-head">
                                            <h2>Account Information</h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="box">
                                                    <div class="box-title">
                                                        <h3>Contact Information</h3><a href="#">Edit</a>
                                                    </div>
                                                    <div class="box-content">
                                                        <h6>{{ Auth::user()->name }}</h6>
                                                        <h6>{{ Auth::user()->email }}</h6>
                                                        <h6><a href="{{ route('profile') }}">Update Profile</a></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="box">
                                                    <div class="box-title">
                                                        <h3>Default Address</h3>
                                                    </div>
                                                    <div class="box-content">
                                                        @foreach (Auth::user()->addresses as $key => $address)
                                                        <address>{{ translate('Address') }}: {{ $address->address }}
                                                        </address>
                                                        <address>{{ translate('Postal Code') }}:
                                                            {{ $address->postal_code }}</address>
                                                        <address>{{ translate('City') }}: {{ $address->city }}</address>
                                                        <address>{{ translate('Country') }}: {{ $address->country }}
                                                        </address>
                                                        <address>{{ translate('Phone') }}: {{ $address->phone }}
                                                        </address>
                                                        <a href="{{ route('edit.address',$address->id) }}">Edit
                                                            Address</a>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="purchaseHistory">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-table mt-0">
                                    <div class="card-body table-responsive-md">
                                        <div class="top-sec">
                                            <h3>Purchase History</h3>
                                        </div>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Delivery Status</th>
                                                    <th scope="col">Payment Status</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>20210520</td>
                                                    <td>20-05-2021</td>
                                                    <td>$45.000</td>

                                                    <td>Pending *</td>
                                                    <td><span class="badge bg-success">Paid</span></td>
                                                    <td class="text-right footable-last-visible"
                                                        style="display: table-cell;">
                                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                            href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                            href="#">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                                            data-href="#">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="downloads">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-table mt-0">
                                    <div class="card-body table-responsive-md">
                                        <div class="top-sec">
                                            <h3>Download Your Product</h3>
                                        </div>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a class=" " href="#"> Adobe Photoshop Elements 2021 & Premiere
                                                            Elements 2021 </a></td>

                                                    <td class="text-right footable-last-visible"
                                                        style="display: table-cell;">

                                                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                            href="#">
                                                            <i class="fa fa-download"></i>
                                                        </a>

                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="wallet">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-table mt-0">
                                    <div class="card-body table-responsive-sm">
                                        <div class="top-sec">
                                            <h3>orders</h3>
                                        </div>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">SL</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Payment method</th>
                                                    <th scope="col">Approval</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>$15.000</td>
                                                    <td>08-03-2021</td>
                                                    <td>Bkash</td>
                                                    <td>N/A</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="row">
                            <div class="col-12">


                                <div class="card mt-0">
                                    <div class="card-body">
                                        <div class="dashboard-box">
                                            <div class="dashboard-title">
                                                <h4>PERSONAL DETAIL</h4>
                                                <span data-toggle="modal" data-bs-target="#edit-profile">edit</span>
                                            </div>
                                            <div class="dashboard-detail">
                                                <ul>

                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>First Name</h6>
                                                            </div>
                                                            <div class="right col-9">
                                                                <input class="form-control" id="validationCustom0"
                                                                    placeholder="First Name" type="text" required="">
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Last Name</h6>
                                                            </div>
                                                            <div class="right col-9">
                                                                <input class="form-control" id="validationCustom0"
                                                                    placeholder="Last Name" type="text" required="">
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Email Address</h6>
                                                            </div>
                                                            <div class="right col-9">
                                                                <input class="form-control" id="validationCustom0"
                                                                    placeholder="Email Address" type="email"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Phone Number</h6>
                                                            </div>
                                                            <div class="right col-9">
                                                                <input class="form-control" id="validationCustom0"
                                                                    placeholder="Your Password" type="number"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Your Message</h6>
                                                            </div>
                                                            <div class="right col-9">
                                                                <input class="form-control" id="validationCustom0"
                                                                    placeholder="Your Message" type="text" required="">
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Photo</h6>
                                                            </div>
                                                            <div class="right col-9">
                                                                <input class="form-control" type="file" id="formFile">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left col-9">
                                                                <h6>Your Password</h6>
                                                            </div>
                                                            <div class="right col-9">
                                                                <input class="form-control" id="validationCustom0"
                                                                    placeholder="Your Password" type="text" required="">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Confirm Password</h6>
                                                            </div>
                                                            <div class="right col-9">
                                                                <input class="form-control" id="validationCustom0"
                                                                    placeholder="Confirm Password" type="text"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                                <div class="col-12">
                                                    <div class="btn-toolbar float-end m-3" role="toolbar"
                                                        aria-label="Toolbar with button groups">
                                                        <div class="btn-group m-2" role="group"
                                                            aria-label="Second group">
                                                            <button type="submit" name="button" value="publish"
                                                                class="btn btn-success">
                                                                Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="dashboard-box">
                                            <div class="dashboard-title">
                                                <h4>SHIPPING ADDRESS</h4>
                                                <span data-toggle="modal" data-bs-target="#edit-profile">edit</span>
                                            </div>
                                            <div class="dashboard-detail">
                                                <ul>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Flat / Plot</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>Downers Grove, IL</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Address *</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>Downers Grove, IL</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Zip Code *</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>2018</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Country *</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>101 - 200 People</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>City *</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>clothing</h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Region/State *</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6>549 Sulphur Springs Road</h6>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</section>
<!--  dashboard section end -->

@endsection