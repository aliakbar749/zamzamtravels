<div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
    <div class="listing-item">
        <div class="listing-img">
            <a href="listing-details.html">
                <img src="assets/img/cars/car-01.jpg" class="img-fluid" alt="Toyota">
            </a>
            <div class="fav-item">
                <span class="featured-text">{{$service->title}}</span>
                <a href="javascript:void(0)" class="fav-icon">
                    <i class="feather-heart"></i>
                </a>
            </div>
        </div>
        <div class="listing-content">
            <div class="listing-features">
                <a href="javascript:void(0)" class="author-img">
                    <img src="assets/img/profiles/avatar-0.jpg" alt="author">
                </a>
                <h3 class="listing-title">
                    <a href="listing-details.html">{{$service->title}}</a>
                </h3>
                <div class="list-rating">
                    <i class="fas fa-star filled"></i>
                    <i class="fas fa-star filled"></i>
                    <i class="fas fa-star filled"></i>
                    <i class="fas fa-star filled"></i>
                    <i class="fas fa-star filled"></i>
                    <span>(5.0)</span>
                </div>
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
            <div class="listing-location-details">
                {{-- <div class="listing-price">
                    <span><i class="feather-map-pin"></i></span>Germany
                </div>
                <div class="listing-price">
                    <h6>$400 <span>/ Day</span></h6>
                </div> --}}
                <div class="short-text">
                    <p>
                        {{ Str::limit(strip_tags($service->short_description), 250) }}
                    </p>
                </div>
            </div>
            <div class="listing-button">
                <a href="listing-details.html" class="btn btn-order"><span><i
                            class="feather-calendar me-2"></i></span>View Details</a>
            </div>
        </div>
    </div>
</div>