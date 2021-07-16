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
<!-- address section start -->
<section class="contact-page register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <h3>SHIPPING ADDRESS</h3>
                <form class="theme-form" role="form" action="{{ route('addresses.update', $address_data->id) }}"
                    method="POST">
                    @csrf
                    <div class="form-row row">
                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <textarea class="form-control mb-3" placeholder="Address" id="address" rows="3"
                                name="address" required>{{ $address_data->address }}</textarea>
                        </div>

                        <div class="col-md-12 select_input">
                            <label for="country">Country *</label>
                            <select class="form-control" name="country" required>
                                @foreach (\App\Country::where('status', 1)->get() as $key => $country)
                                <option value="{{ $country->name }}" @if($address_data->country == $country->name)
                                    selected @endif>
                                    {{ $country->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="City" name="city" required=""
                                value="{{ $address_data->city }}">
                        </div>
                        <div class="col-md-12">
                            <label for="postal-code">Postal Code</label>
                            <input type="text" class="form-control" id="postal-code" placeholder="Postal Code"
                                name="postal_code" required="" value="{{ $address_data->postal_code }}">
                        </div>
                        <div class="col-md-12">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone"
                                required="" value="{{ $address_data->phone }}">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-solid" type="submit">Update Address</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
@endsection