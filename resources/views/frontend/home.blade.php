@section('title') Umrah and Hazz Packages From Bangaldesh {{date("Y").' | Zamzam Travels BD | '. env('APP_NAME')}} @endsection
@section('keywords') popular mobile phones, top-selling smartphones, best-selling mobiles, popular models {{env('APP_NAME')}} @endsection
@extends('frontend.master')
@section('content')

<!--Slider section start -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                    <a href="#"><img class="d-block w-100 slider-image"
                            src="{{asset('uploaded_files/slider/' . $slider->image)}}" alt="First slide"></a>
                </div>
            @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

<!--Slider section end -->


<!--Popular category section start -->
        <section class="section services">
            <div class="service-right">
                <img src="assets/img/bg/service-right.svg" class="img-fluid" alt="services right">
            </div>
        </section> 
<!--Popular category section start -->

<!--Service category section start -->
        <section class="section popular-car-type">
            <div class="container">
                <div class="section-heading" data-aos="fade-down">
                    <h2> Popular Service Categories </h2>
                    {{-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p> --}}
                </div>
            </div>
        </section>
        <section class="section services">
            <div class="service-right">
                <img src="assets/img/bg/service-right.svg" class="img-fluid" alt="services right">
            </div>
            <div class="container">

                <div class="services-work">
                    <div class="row">
                        @foreach ($serviceCategories as $serviceCategory)
                            <div class="col-lg-3 col-md-3 col-6 aos-init aos-animate "  data-aos="fade-down">
                                <div class="services-group rounded custom_border p-2 py-3 m-1 shadow   zoom-on-hover " >
                                    <a href="{{route('dynamic.url', $serviceCategory->url)}}">
                                    <div class="services-icon border-secondary mb-3">
                                        <img class="icon-img bg-secondary" width="100" src="{{asset('uploaded_files/service_categories/' .$serviceCategory->image)}}"
                                            alt="Choose Locations">
                                    </div>
                                    <div class="services-content">
                                        <h3>{{optional($serviceCategory)->title}}</h3>
                                    </div>
                                </a>
                                </div>
                            </div>
                        @endforeach 
                    </div>
                </div>
            </div>
        </section>
<!--Service category section end -->

<section class="section popular-services popular-explore">
    <div class="container">
        @foreach ($serviceCategories as $serviceCategory)
        @php
            $subCategories = App\Models\Service_Category::where('category_id',$serviceCategory->id)->where('is_active',1)->get();
            
        @endphp
        @if (count($subCategories)>0)
            <div class="section-heading" data-aos="fade-down">
                <h2>{{optional($serviceCategory)->title}}</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12" data-aos="fade-down">
                    <div class="listing-tabs-group">
                        <ul class="nav listing-buttons gap-3" data-bs-tabs="tabs">
                            
                            @foreach ($subCategories as $subCategory)
                                @php
                                    $service = App\Models\Service::where('service_category_id', $subCategory->id)->get();
                                @endphp
                                @if (count($service)>0)
                                    <li>
                                        <a class="" aria-current="true" data-bs-toggle="tab" href="#subcategory{{$subCategory->id}}">
                                            <span>
                                                <img src="assets/img/icons/car-icon-01.svg" alt="Mazda">
                                            </span>
                                            {{optional($subCategory)->title}}
                                        </a>
                                    </li>
                                @endif
                                
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                @php
                    $subCategories = App\Models\Service_Category::where('category_id',$serviceCategory->id)->get();
                @endphp
                @foreach ($subCategories as $data )
                    <div class="tab-pane " id="subcategory{{$data->id}}">
                        <div class="row">
                            @php
                                $services = App\Models\Service::where('service_category_id', $data->id)->get();
                            @endphp
                            @foreach ($services as $service)
                                <x-service-details :service="$service"/>
                            @endforeach 
                        </div>
                        <div class="view-all text-center" style="padding-bottom: 20px;" data-aos="fade-down">
                            <a href="listing-grid.html" class="btn btn-view d-inline-flex align-items-center">See More
                                <span><i class="feather-arrow-right ms-2"></i></span></a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif  
        @endforeach
    </div>
</section>

<!--All Service section start -->
        <section class="section popular-services">
            <div class="container">

                <div class="section-heading "  data-aos="fade-down">
                    <h2 class="pt-2"> Our Services </h2>
                    
                </div>

                <div class="row">
                    <div class="popular-slider-group">
                        <div class="owl-carousel rental-deal-slider owl-theme">
                            @php
                                $services = App\Models\Service::where('is_active',1)->where('is_popular',1)->orderBy('views','DESC')->get();
                            @endphp
                            @foreach ($services as $service)
                            <div class="rental-car-item">
                                <div class="listing-item mb-0">
                                    <div class="listing-img">
                                        <a href="{{route('dynamic.url', $service->url)}}">
                                            <img src="assets/img/cars/car-01.jpg" class="img-fluid" alt="Toyota">
                                        </a>
                                    </div>
                                    <div class="listing-content">
                                        <div class="listing-features">
                                            <div class="fav-item-rental">
                                                <span class="featured-text">Price : {{optional($service)->start_price}} BDT </span>
                                            </div>
                                          
                                            <h3 class="listing-title">
                                                <a href="{{route('dynamic.url', $service->url)}}">{{$service->title}}</a>
                                            </h3>
                                            {{-- <h6>Listed By : <span>Venis Darren</span></h6> --}}
                                        </div>
                                       
                                        <div class="listing-button">
                                            <a href="{{route('dynamic.url', $service->url)}}" class="btn btn-order"><span><i
                                                        class="feather-calendar me-2"></i></span>Rent Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                            {{-- <div class="rental-car-item">
                                <div class="listing-item mb-0">
                                    <div class="listing-img">
                                        <a href="listing-details.html">
                                            <img src="assets/img/cars/car-02.jpg" class="img-fluid" alt="Toyota">
                                        </a>
                                    </div>
                                    <div class="listing-content">
                                        <div class="listing-features">
                                            <div class="fav-item-rental">
                                                <span class="featured-text">$400/day</span>
                                            </div>
                                            <div class="list-rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <span>(5.0)</span>
                                            </div>
                                            <h3 class="listing-title">
                                                <a href="listing-details.html">Toyota Camry SE 350</a>
                                            </h3>
                                            <h6>Listed By : <span>Venis Darren</span></h6>
                                        </div>
                                        <div class="listing-details-group">
                                            <ul>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-01.svg"
                                                            alt="Auto"></span>
                                                    <p>Auto</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-02.svg"
                                                            alt="10 KM"></span>
                                                    <p>10 KM</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-03.svg"
                                                            alt="Petrol"></span>
                                                    <p>Petrol</p>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-04.svg"
                                                            alt="Power"></span>
                                                    <p>Power</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-05.svg"
                                                            alt="2018"></span>
                                                    <p>2018</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-06.svg"
                                                            alt="Persons"></span>
                                                    <p>5 Persons</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="listing-button">
                                            <a href="listing-details.html" class="btn btn-order"><span><i
                                                        class="feather-calendar me-2"></i></span>Rent Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="rental-car-item">
                                <div class="listing-item mb-0">
                                    <div class="listing-img">
                                        <a href="listing-details.html">
                                            <img src="assets/img/cars/car-03.jpg" class="img-fluid" alt="Toyota">
                                        </a>
                                    </div>
                                    <div class="listing-content">
                                        <div class="listing-features">
                                            <div class="fav-item-rental">
                                                <span class="featured-text">$400/day</span>
                                            </div>
                                            <div class="list-rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <span>(5.0)</span>
                                            </div>
                                            <h3 class="listing-title">
                                                <a href="listing-details.html">Toyota Camry SE 350</a>
                                            </h3>
                                            <h6>Listed By : <span>Venis Darren</span></h6>
                                        </div>
                                        <div class="listing-details-group">
                                            <ul>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-01.svg"
                                                            alt="Auto"></span>
                                                    <p>Auto</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-02.svg"
                                                            alt="10 KM"></span>
                                                    <p>10 KM</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-03.svg"
                                                            alt="Petrol"></span>
                                                    <p>Petrol</p>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-04.svg"
                                                            alt="Power"></span>
                                                    <p>Power</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-05.svg"
                                                            alt="2018"></span>
                                                    <p>2018</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-06.svg"
                                                            alt="Persons"></span>
                                                    <p>5 Persons</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="listing-button">
                                            <a href="listing-details.html" class="btn btn-order"><span><i
                                                        class="feather-calendar me-2"></i></span>Rent Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>

                <div class="view-all text-center" data-aos="fade-down">
                    <a href="listing-grid.html" class="btn btn-view d-inline-flex align-items-center">Go to all Services
                        <span><i class="feather-arrow-right ms-2"></i></span></a>
                </div>
            </div>
        </section>
<!--All Service section end -->

<!--About us  section start -->
        <section>
            <div class="container pt-5" style="display: flex;">
                <div class="row">
                    <div class="col-md-6">
                       
                        <p style="text-align: justify !important;">{!!$setting->about_us!!}</p>
                    </div>
                    
                    <div class="col-md-6">
                        {{-- <img style="height: 299px; width: 100%;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwZwdWERZPNEUBKiO3t7rdJyNASjP8WkmRsw&usqp=CAU" alt="">
                         --}}

                         <iframe width="560" height="315" src="https://www.youtube.com/embed/XErajv5AgnA?si=NERzSxTkofIIo-o4"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>

                    </div>
                </div>
                
            </div>
        <section>
<!--About us  section end -->
        <section class="section why-choose popular-explore">
            <div class="choose-left">
            </div>
            <div class="container">

                <div class="why-choose-group">
                    <div class="row">
                        @php
                            $setting= App\Models\Setting::select('home_page_other_contents','logo')->first();
                        @endphp
                        {!! optional($setting)->home_page_other_contents !!}
                    </div>
                </div>
            </div>
        </section>

@endsection