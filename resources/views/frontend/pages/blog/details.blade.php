@section('title') Blog Details  {{date("Y").' | Zamzam Travels BD | '. env('APP_NAME')}} @endsection
@section('keywords') popular mobile phones, top-selling smartphones, best-selling mobiles, popular models {{env('APP_NAME')}} @endsection
@extends('frontend.master')
@section('content')

    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Blog List</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Blogs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 d-lg-flex">
                            <div class="blog grid-blog">
                                <div class="blog-image-list">
                                    <a href="blog-details.html"><img class="img-fluid"
                                            src="{{asset('uploaded_files/blogs/'.$blog->image)}}" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-list-date">
                                        <ul class="meta-item-list">
                                            <li>
                                                <div class="post-author">
                                                    {{-- <div class="post-author-img">
                                                        <img src="assets/img/profiles/avatar-13.jpg" alt="author">
                                                    </div> --}}
                                                    <a href="javascript:void(0)"> <span> Zmzam Travels BD  </span></a>
                                                </div>
                                            </li>
                                            <li class="date-icon ms-3"><i class="fa-solid fa-calendar-days"></i>
                                                <span>Feb 6, 2023</span></li>
                                        </ul>
                                        
                                    </div>
                                    <h3 class="blog-title"><a href="blog-details.html">{{$blog->title}}</a></h3>
                                    <p class="blog-description">{!! optional($blog)->descriptions !!}</p>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="pagination">
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
                    </div> --}}

                </div>
                <div class="col-lg-4 theiaStickySidebar">
                    <div class="rightsidebar">
                        {{--<div class="card">
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
                        </div>--}}
                        <div class="card">
                            <h4><i class="feather-tag"></i> Recent Blogs </h4>
                            @php
                                $blogs = App\Models\Blog::latest()->take(3)->get();
                            @endphp
                            @foreach ($blogs as $blog )
                                <div class="article">
                                    <div class="article-blog">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="{{asset('uploaded_files/blogs/'.$blog->image)}}" alt="Blog">
                                        </a>
                                    </div>
                                    <div class="article-content">
                                        <h5><a href="{{route('dynamic.url', $blog->url)}}">{{$blog->title}}</a></h5>
                                        <div class="article-date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span>{{$blog->created_at->format('M j, Y')}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection