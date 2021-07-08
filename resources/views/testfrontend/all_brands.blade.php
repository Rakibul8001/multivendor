@extends('testfrontend.layouts.master')
@section('front-content') 


  
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>our collection</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class=""><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> &nbsp; collection</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="collection section-b-space ratio_square ">
        <div class="container">
            <div class="row partition-collection">
                @foreach (\App\Brand::all() as $brand)
                <div class="col-lg-3 col-md-6">
                    <div class="collection-block">
                        <div><img src="{{ asset($brand->logo) }}" class="img-fluid blur-up lazyload bg-img"
                                alt="{{ $brand->getTranslation('name') }}"></div>
                        <div class="collection-content">
                            <h3>{{ $brand->getTranslation('name') }}</h3>
                            <p>{!! $brand->meta_description !!}</p>
                            <a href="{{ route('allproducts.brand',$brand->slug) }}" class="btn btn-outline">shop now !</a>
                                {{-- href="#" class="btn btn-outline">shop now !</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
 
        </div>
    </section>
    <!--Section ends-->




@endsection