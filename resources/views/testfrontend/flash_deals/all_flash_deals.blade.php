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
                @foreach($all_flash_deals as $single)
                <div class="col-lg-4 col-md-6">
                    <div class="collection-block">
                        <a href="{{ route('flashdeal-details',encrypt($single->id)) }}">
                            <div>
                                <img src="{{asset($single->banner)}}" class="img-fluid blur-up lazyload bg-img"
                                    alt="{{ $single->title }}">
                            </div>
                        </a>
            
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Section ends-->




@endsection