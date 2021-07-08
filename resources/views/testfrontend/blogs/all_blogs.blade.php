@extends('testfrontend.layouts.master')
@section('front-content')



<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>blog</h2>
                </div>
            </div>
    
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space blog-page ratio2_3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($blogs as $blog)
                    
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="{{ route('details.blogs',$blog->slug ) }}"><img src="{{ asset($blog->banner) }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>{{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM Do YYYY')}}</h6> <a href="#">
                                    <h4>{{ $blog->title }}</h4>
                                </a>
                                <ul class="post-social">
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>{!! $blog->short_description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
           
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->



@endsection