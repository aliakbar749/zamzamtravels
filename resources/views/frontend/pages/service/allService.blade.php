@section('title') All Services for this category {{date("Y").' | Zamzam Travels BD | '. env('APP_NAME')}} @endsection
@section('keywords') popular mobile phones, top-selling smartphones, best-selling mobiles, popular models {{env('APP_NAME')}} @endsection
@extends('frontend.master')
@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                @foreach ($services as $service)
                <h2 class="breadcrumb-title">{{$service->serviceCategory->title}}</h2>
                @endforeach
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog List</li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="section-heading "  data-aos="fade-down">
                        <h2 class="pt-2">ALl Packages </h2>
                        {{-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p> --}}
                    </div>
                    @foreach ($services as $service)
                    <x-service-details :service="$service"/>
                    @endforeach
                    
                </div>

                <div class="pagination">
                    <nav>
                        <ul class="pagination mt-0">
                            <li class="previtem">
                                <a class="page-link" href="#"><i class="fas fa-regular fa-arrow-left me-2"></i>
                                    Prev</a>
                            </li>
                            <li class="justify-content-center pagination-center">
                                <div class="page-group">
                                    <ul>
                                        <li class="page-item">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="active page-link" href="#">2 <span
                                                    class="visually-hidden">(current)</span></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">5</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nextlink">
                                <a class="page-link" href="#">Next <i
                                        class="fas fa-regular fa-arrow-right ms-2"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="col-lg-4 theiaStickySidebar">
                <div class="rightsidebar">
                    <div class="card">
                        <h4><img src="assets/img/icons/details-icon.svg" alt="details-icon"> Filter</h4>
                        <div class="filter-content looking-input form-group mb-0">
                            <input type="text" class="form-control" placeholder="To Search type and hit enter">
                        </div>
                    </div>
                    <div class="card">
                        <h4><img src="assets/img/icons/category-icon.svg" alt="details-icon"> Categories</h4>
                        <ul class="blogcategories-list">
                            <li><a href="javascript:void(0)">Accept Credit Cards</a></li>
                            <li><a href="javascript:void(0)">Smoking Allowed</a></li>
                            <li><a href="javascript:void(0)">Bike Parking</a></li>
                            <li><a href="javascript:void(0)">Street Parking</a></li>
                            <li><a href="javascript:void(0)">Wireless Internet</a></li>
                            <li><a href="javascript:void(0)">Pet Friendly</a></li>
                        </ul>
                    </div>
                    <div class="card tags-widget">
                        <h4><i class="feather-tag"></i> Tags</h4>
                        <ul class="tags">
                            <li>Air </li>
                            <li>Engine </li>
                            <li>Item </li>
                            <li>On Road </li>
                            <li>Rims </li>
                            <li>Speed </li>
                            <li>Make </li>
                            <li>Transmission </li>
                        </ul>
                    </div>
                    <div class="card">
                        <h4><i class="feather-tag"></i>Top Article</h4>
                        <div class="article">
                            <div class="article-blog">
                                <a href="blog-details.html">
                                    <img class="img-fluid" src="assets/img/blog/blog-3.jpg" alt="Blog">
                                </a>
                            </div>
                            <div class="article-content">
                                <h5><a href="blog-details.html">Great Business Tips in 2023</a></h5>
                                <div class="article-date">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>Jan 6, 2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="article">
                            <div class="article-blog">
                                <a href="blog-details.html">
                                    <img class="img-fluid" src="assets/img/blog/blog-4.jpg" alt="Blog">
                                </a>
                            </div>
                            <div class="article-content">
                                <h5><a href="blog-details.html">Excited News About Cars.</a></h5>
                                <div class="article-date">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>Feb 5, 2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="article">
                            <div class="article-blog">
                                <a href="blog-details.html">
                                    <img class="img-fluid" src="assets/img/blog/blog-5.jpg" alt="Blog">
                                </a>
                            </div>
                            <div class="article-content">
                                <h5><a href="blog-details.html">8 Amazing Tricks About Business</a></h5>
                                <div class="article-date">
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <span>March 10, 2023</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection