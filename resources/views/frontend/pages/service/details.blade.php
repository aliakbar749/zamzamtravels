@section('title')
    Service Details for {{ optional($service)->title }} {{ date('Y') . ' | Zamzam Travels BD | ' . env('APP_NAME') }}
@endsection
@section('keywords')
    popular mobile phones, top-selling smartphones, best-selling mobiles, popular models {{ env('APP_NAME') }}
@endsection
@extends('frontend.master')
@section('content')
    <div class="">
        {{-- <div class="breadcrumb-bar">
            <img style="width: 100%" src="{{ asset('uploaded_files/service/' . optional($service)->breadcrumb_image) }}"
                alt="">
               
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Service</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{optional($service)->title}}</li>
                    </ol>
                  </nav>
        </div> --}}
    </div>

    <div class="breadcrumb-bar" style=" background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('uploaded_files/service/'.optional($service)->breadcrumb_image) }}');background-size: cover;">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title"> {{optional($service)->title}} </h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> {{optional($service)->title}} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section product-details" style="padding: 50px 0 0px 0 !important;">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8">
                    <div class="detail-product shadow">
                        <div class="slider detail-bigimg">
                            <div class="product-img">
                                <img style="width: 100%"
                                    src="{{ asset('uploaded_files/service/' . optional($service)->image) }}" alt="Slider">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 theiaStickySidebar">
                    <div class="review-sec mt-0" style="background-color: #127384 !important;">
                        <div class="review-header">
                            <h4 style="color: white"> Send Specific Query </h4>
                        </div>
                        <div class>
                            <form action="{{route('query.submit')}}" method="POST">
                                <input type="hidden" name="service_id" value="{{$service->id}}" id="">
                                @csrf 
                                <ul>
                                    <li class="column-group-main">
                                        <div class="form-group">
                                            <div class="group-img">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Your Name Here" required>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="column-group-main">
                                        <div class="form-group">
                                            <div class="group-img">
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Enter Your Mail Address Here">
                                            </div>
                                        </div>
                                    </li>

                                    <li class="column-group-main">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="group-img">
                                                        <input type="number" name="phone" class="form-control"
                                                            placeholder="Enter Phone Number Here">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="group-img">
                                                        <input type="number" name="nop" class="form-control"
                                                            placeholder="Enter No Of Person ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="column-group-main">
                                        <div class="form-group">
                                            <div class="group-img">
                                                <textarea name="message" id="" class="form-control" cols="45" rows="3"
                                                    placeholder="Enter Your message here "></textarea>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="column-group-last">
                                        <div class="form-group mb-0">
                                            <div class="search-btn">
                                                <button class="btn btn-primary check-available w-100 " type="submit"> Send Message
                                                </button>
                                                {{-- <button class="btn btn-primary check-available w-100" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#pages_edit"> Send Message
                                                </button> --}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- product details start --}}

    <section class="section product-details" style="padding: 0px 0 56px 0 !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="review-sec extra-service mb-0 shadow">

                        <div class="review-header" style="margin:0px !important;">
                            <h4>Service Details </h4>
                        </div>
                        <div class="description-list">

                            <div class="popular-services" style="background: none !important; padding-top:35px;">

                                <div class="row justify-content-center">
                                    <div class="col-lg-12" data-aos="fade-down">
                                        <div class="listing-tabs-group " style="margin: 0px !important;">
                                            <ul class="nav listing-buttons gap-3" data-bs-tabs="tabs">
                                                <li>
                                                    <a class="active" style="padding: 10px 10px !important;"
                                                        aria-current="true" data-bs-toggle="tab" href="#overview">
                                                        {{-- <span>
                                                            <img src="assets/img/icons/car-icon-01.svg" alt="Mazda">
                                                        </span> --}}
                                                        Package Overview
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-bs-toggle="tab" href="#itinerary"
                                                        style="padding: 10px 7px !important;">
                                                        {{-- <span>
                                                            <img src="assets/img/icons/car-icon-02.svg" alt="Audi">
                                                        </span> --}}
                                                        Itinerary
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-bs-toggle="tab" href="#notes"
                                                        style="padding: 10px px !important;">
                                                        {{-- <span>
                                                            <img src="assets/img/icons/car-icon-03.svg" alt="Honda">
                                                        </span> --}}
                                                        Notes & Policy
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-bs-toggle="tab" href="#pricing"
                                                        style="padding: 10px 10px !important;">
                                                        {{-- <span>
                                                            <img src="assets/img/icons/car-icon-04.svg" alt="Toyota">
                                                        </span> --}}
                                                        Packages Pricing
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-12" data-aos="fade-down">

                                                <div class="listing-item">

                                                    <div class="listing-content">
                                                        {!! $service->package_overview !!}

                                                        <div class="listing-button mt-2">
                                                            <a href="listing-details.html" class="btn btn-order"><span><i
                                                                        class="feather-calendar me-2"></i></span>Rent
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="itinerary">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-12" data-aos="fade-down">
                                                <div class="listing-item">

                                                    {!! $service->itinerary !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="notes">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-12" data-aos="fade-down">
                                                <div class="listing-item">
                                                    {!! $service->notes_and_policy !!}
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pricing">
                                        <div class="row">

                                            <div class="col-lg-12 col-md-12 col-12" data-aos="fade-down">
                                                <div class="listing-item">

                                                    {!! $service->package_pricing !!}

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    {{-- <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                        </div>
                    </nav> --}}

                      {{-- <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            1 Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos sunt odio accusantium sequi nihil, ipsum, minus dolore est magnam possimus tempore aliquid animi natus, facilis sapiente dolores expedita eligendi in soluta aspernatur. Cumque modi animi, provident earum at repudiandae nostrum expedita quod! Doloremque non perferendis inventore. Beatae at, alias eaque veniam culpa sunt fugit vero, fugiat rem consectetur perferendis iure, quidem molestias maiores doloribus nihil illum mollitia vel quia aliquam? In animi at nesciunt est fugiat, laborum minima ratione ea tempora vitae neque totam voluptas, facere nemo eaque quas ipsum. Asperiores, enim voluptate? Numquam, labore dolore inventore blanditiis molestiae est?
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">2</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3</div>
                      </div> --}}

                    <div class="review-sec extra-service mb-0 shadow">
                        <div class="review-header">
                            <h4>Additional Information</h4>
                        </div>
                        <div class="description-list">
                            <p>{!! $service->long_description !!}
                            </p>

                        </div>
                    </div>
                    <div class="review-sec extra-service mb-0 shadow">
                        <div class="review-header">
                            <h4>Video</h4>
                        </div>
                        <div class="short-video">
                            {{-- <iframe src="https://www.youtube.com/embed/ExJZAegsOis" width="100" height="350"></iframe> --}}
                            <iframe width="560" height="315" src="{{ $service->video_link }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>


                </div>
                {{-- <div class="col-lg-4 theiaStickySidebar">
                   
                    <div class="review-sec share-car mt-0 mb-0 shadow">
                        <div class="review-header">
                            <h4>View Location</h4>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509170.989457427!2d-123.80081967108484!3d37.192957227641294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v1669181581381!5m2!1sen!2sin"
                            class="iframe-video"></iframe>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>

    {{-- product details start --}}

    <div class="modal custom-modal fade check-availability-modal" id="pages_edit" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="form-header text-start mb-0">
                        <h4 class="mb-0 text-dark fw-bold">Availability Details</h4>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="align-center" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="available-for-ride">
                                <p><i class="fa-regular fa-circle-check"></i>Chevrolet Camaro is available for a
                                    ride</p>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="row booking-info">
                                <div class="col-md-4 pickup-address">
                                    <h5>Pickup</h5>
                                    <p>45, 4th Avanue Mark Street USA</p>
                                    <span>Date & time : 11 Jan 2023</span>
                                </div>
                                <div class="col-md-4 drop-address">
                                    <h5>Drop Off</h5>
                                    <p>78, 10th street Laplace USA</p>
                                    <span>Date & time : 11 Jan 2023</span>
                                </div>
                                <div class="col-md-4 booking-amount">
                                    <h5>Booking Amount</h5>
                                    <h6><span>$300 </span> /day</h6>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="booking-info seat-select">
                                <h6>Extra Service</h6>
                                <label class="custom_check">
                                    <input type="checkbox" name="rememberme" class="rememberme">
                                    <span class="checkmark"></span>
                                    Baby Seat - <span class="ms-2">$10</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="booking-info pay-amount">
                                <h6>Deposit Option</h6>
                                <div class="radio radio-btn">
                                    <label>
                                        <input type="radio" name="radio"> Pay Deposit
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="radio"> Full Amount
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="booking-info service-tax">
                                <ul>
                                    <li>Booking Price <span>$300</span></li>
                                    <li>Extra Service <span>$10</span></li>
                                    <li>Tax <span>$5</span></li>
                                </ul>
                            </div>
                            <div class="grand-total">
                                <h5>Grand Total</h5>
                                <span>$315</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="booking.html" class="btn btn-back">Go to Details<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
