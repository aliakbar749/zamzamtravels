@section('title') All Service categories for this category {{date("Y").' | Zamzam Travels BD | '. env('APP_NAME')}} @endsection
@section('keywords') popular mobile phones, top-selling smartphones, best-selling mobiles, popular models {{env('APP_NAME')}} @endsection
@extends('frontend.master')
@section('content')

<div class="breadcrumb-bar" style=" background-color: black">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title"> All Blogs  </h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Blog  </li>
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
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-4 d-lg-flex">
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid"
                                            src="{{asset('uploaded_files/blogs/'.$blog->image)}}" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <p class="blog-category">

                                    </p>
                                    <h3 class="blog-title"><a href="blog-details.html">{{$blog->title}}</a></h3>
                                    <p class="blog-description"></p>
                                    <ul class="meta-item">
                                        <li>
                                            <div class="post-author" style="text-align: justify">
                                                {{ Str::limit(strip_tags($blog->descriptions), 250) }}
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="{{route('dynamic.url', $blog->url)}}" class="viewlink btn btn-primary">Read More <i
                                            class="feather-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    {{--<div class="col-lg-6 col-md-6 d-lg-flex">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid"
                                        src="assets/img/blog/blog-2.jpg" alt="Post Image"></a>
                            </div>
                            <div class="blog-content">
                                <p class="blog-category">
                                    <a href="javascript:void(0)"><span>Car Showcase</span></a>
                                </p>
                                <h3 class="blog-title"><a href="blog-details.html">The 2023 Ford F-150 Raptor –
                                        A First Look</a></h3>
                                <p class="blog-description">Everyone has the right to freedom of thought,
                                    conscience and religion; this right includes freedom to change his religion
                                    or belief, and freedom, either alone...</p>
                                <ul class="meta-item">
                                    <li>
                                        <div class="post-author">
                                            <div class="post-author-img">
                                                <img src="assets/img/profiles/avatar-04.jpg" alt="author">
                                            </div>
                                            <a href="javascript:void(0)"> <span> Hellan </span></a>
                                        </div>
                                    </li>
                                    <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> <span>Feb 6,
                                            2023</span></li>
                                </ul>
                                <a href="blog-details.html" class="viewlink btn btn-primary">Read More <i
                                        class="feather-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-lg-flex">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid"
                                        src="assets/img/blog/blog-3.jpg" alt="Post Image"></a>
                            </div>
                            <div class="blog-content">
                                <p class="blog-category">
                                    <a href="javascript:void(0)"><span>Car Showcase</span></a>
                                </p>
                                <h3 class="blog-title"><a href="blog-details.html">Tesla Model S: Top Secret Car
                                        Collector’s Garage</a></h3>
                                <p class="blog-description">Everyone has the right to freedom of thought,
                                    conscience and religion; this right includes freedom to change his religion
                                    or belief, and freedom, either alone...</p>
                                <ul class="meta-item">
                                    <li>
                                        <div class="post-author">
                                            <div class="post-author-img">
                                                <img src="assets/img/profiles/avatar-13.jpg" alt="author">
                                            </div>
                                            <a href="javascript:void(0)"> <span> Alphonsa Daniel </span></a>
                                        </div>
                                    </li>
                                    <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> <span>March
                                            6, 2023</span></li>
                                </ul>
                                <a href="blog-details.html" class="viewlink btn btn-primary">Read More <i
                                        class="feather-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-lg-flex">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid"
                                        src="assets/img/blog/blog-4.jpg" alt="Post Image"></a>
                            </div>
                            <div class="blog-content">
                                <p class="blog-category">
                                    <a href="javascript:void(0)"><span>Car Showcase</span></a>
                                </p>
                                <h3 class="blog-title"><a href="blog-details.html">The 2023 Ford F-150 Raptor –
                                        A First Look</a></h3>
                                <p class="blog-description">Everyone has the right to freedom of thought,
                                    conscience and religion; this right includes freedom to change his religion
                                    or belief, and freedom, either alone...</p>
                                <ul class="meta-item">
                                    <li>
                                        <div class="post-author">
                                            <div class="post-author-img">
                                                <img src="assets/img/profiles/avatar-04.jpg" alt="author">
                                            </div>
                                            <a href="javascript:void(0)"> <span> Hellan </span></a>
                                        </div>
                                    </li>
                                    <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> <span>March
                                            28, 2022</span></li>
                                </ul>
                                <a href="blog-details.html" class="viewlink btn btn-primary">Read More <i
                                        class="feather-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-lg-flex">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid"
                                        src="assets/img/blog/blog-5.jpg" alt="Post Image"></a>
                            </div>
                            <div class="blog-content">
                                <p class="blog-category">
                                    <a href="javascript:void(0)"><span>Car Showcase</span></a>
                                </p>
                                <h3 class="blog-title"><a href="blog-details.html">Tesla Model S: Top Secret Car
                                        Collector’s Garage</a></h3>
                                <p class="blog-description">Everyone has the right to freedom of thought,
                                    conscience and religion; this right includes freedom to change his religion
                                    or belief, and freedom, either alone...</p>
                                <ul class="meta-item">
                                    <li>
                                        <div class="post-author">
                                            <div class="post-author-img">
                                                <img src="assets/img/profiles/avatar-04.jpg" alt="author">
                                            </div>
                                            <a href="javascript:void(0)"> <span> Hellan </span></a>
                                        </div>
                                    </li>
                                    <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> <span>March
                                            30, 2023</span></li>
                                </ul>
                                <a href="blog-details.html" class="viewlink btn btn-primary">Read More <i
                                        class="feather-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-lg-flex">
                        <div class="blog grid-blog">
                            <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid"
                                        src="assets/img/blog/blog-6.jpg" alt="Post Image"></a>
                            </div>
                            <div class="blog-content">
                                <p class="blog-category">
                                    <a href="javascript:void(0)"><span>Car Showcase</span></a>
                                </p>
                                <h3 class="blog-title"><a href="blog-details.html">The 2023 Ford F-150 Raptor –
                                        A First Look</a></h3>
                                <p class="blog-description">Everyone has the right to freedom of thought,
                                    conscience and religion; this right includes freedom to change his religion
                                    or belief, and freedom, either alone...</p>
                                <ul class="meta-item">
                                    <li>
                                        <div class="post-author">
                                            <div class="post-author-img">
                                                <img src="assets/img/profiles/avatar-04.jpg" alt="author">
                                            </div>
                                            <a href="javascript:void(0)"> <span> Hellan </span></a>
                                        </div>
                                    </li>
                                    <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> <span>March
                                            31, 2023</span></li>
                                </ul>
                                <a href="blog-details.html" class="viewlink btn btn-primary">Read More <i
                                        class="feather-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>--}}
                </div>

            </div>


            {{--<div class="col-lg-4 theiaStickySidebar">
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
                                    <span>Feb 10, 2023</span>
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
                                    <span>March 18, 2023</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
</div>
@endsection