@extends('testfrontend.layouts.master')
@section('front-content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>profile</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- personal deatail section start -->
<section class="contact-page register-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h3>PERSONAL DETAIL</h3>
                <form class="theme-form" action="{{ route('customer.profile.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row row">
                        <div class="col-md-12">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Your name" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="col-md-12">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="last-name" placeholder="Phone Number"
                                name="phone" value="{{ Auth::user()->phone }}">
                        </div>

                        <div class="col-md-12">
                            <label for="inputPhoto">Photo<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo"
                                    value="{{ Auth::user()->avatar_original }}">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>

                        <div class="col-md-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="password"
                                name="new_password">
                        </div>
                        <div class="col-md-12">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Confirm Password"
                                name="confirm_password">
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">{{translate('Update Profile')}}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->


<!-- address section start -->
<section class="contact-page register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h3>SHIPPING ADDRESS</h3>
                <form class="theme-form" role="form" action="{{ route('addresses.store') }}" method="POST">
                    @csrf
                    <div class="form-row row">
                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <textarea class="form-control mb-3" placeholder="Address" id="address" rows="3"
                                name="address" required></textarea>
                        </div>

                        <div class="col-md-12 select_input">
                            <label for="country">Country *</label>
                            <select class="form-control" name="country" required>
                                <option value="">Select Country</option>
                                @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="City" name="city"
                                required="">
                        </div>
                        <div class="col-md-12">
                            <label for="postal-code">Postal Code</label>
                            <input type="text" class="form-control" id="postal-code" placeholder="Postal Code"
                                name="postal_code" required="">
                        </div>
                        <div class="col-md-12">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone"
                                required="">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-solid" type="submit">Save setting</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

@endsection
@push('front-style')
<style>
    .input-group .btn {
        height: 64%;
    }
</style>
@endpush

@push('front-script')
<script>
    $('#lfm').filemanager('image');
</script>
@endpush