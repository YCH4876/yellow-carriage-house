@extends('layouts.main')
@section('main')

<div class="gallery-row">
    <div class="row">
        @if($roomName == 'king-lee-suite')
        <div class="col-12 col-lg-4 gallery-image-container-header">
            <img src="{{ asset('img/rooms/king-lee/king-lee-1.jpg') }}" class="gallery-image-header">
        </div>
        <div class="col-lg-4 d-none d-lg-inline gallery-image-container-header">
            <img src="{{ asset('img/rooms/king-lee/king-lee-2.jpg') }}" class="gallery-image-header">
        </div>
        <div class="col-lg-4 d-none d-lg-inline gallery-image-container-header">
            <img src="{{ asset('img/rooms/king-lee/king-lee-3.jpg') }}" class="gallery-image-header">
        </div>
        @elseif($roomName == 'windsor-queen-suite-plus')
        <div class="col-12 col-lg-4 gallery-image-container-header">
            <img src="{{ asset('img/rooms/windsor-queen/1.jpg') }}" class="gallery-image-header">
        </div>
        <div class="col-lg-4 d-none d-lg-inline gallery-image-container-header">
            <img src="{{ asset('img/rooms/windsor-queen/2.jpg') }}" class="gallery-image-header">
        </div>
        <div class="col-lg-4 d-none d-lg-inline gallery-image-container-header">
            <img src="{{ asset('img/rooms/windsor-queen/3.jpg') }}" class="gallery-image-header">
        </div>
        @elseif($roomName == 'the-carriage-house-apartment-suite')
        <div class="col-12 col-lg-4 gallery-image-container-header">
            <img src="{{ asset('img\rooms\windsor-queen\1.jpg') }}" class="gallery-image-header">
        </div>
        <div class="col-lg-4 d-none d-lg-inline gallery-image-container-header">
            <img src="{{ asset('img\rooms\windsor-queen\2.jpg') }}" class="gallery-image-header">
        </div>
        <div class="col-lg-4 d-none d-lg-inline gallery-image-container-header">
            <img src="{{ asset('img\rooms\windsor-queen\3.jpg') }}" class="gallery-image-header">
        </div>
        @endif
    </div>
</div>

<div class="container">
    <div class="row py-5">
        <div class="col-lg-8">
            <div class="text-block">
                <h1 class="mb-3 font-weight-bolder">{{ $roomNameUppercase }}</h1>
                <ul class="list-inline text-sm mb-2 mt-2">
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="fa fa-bed me-2"></i>
                            @if($roomName == 'king-lee-suite')King @elseif($roomName == 'windsor-queen-suite-plus' ||
                            $roomName == 'the-carriage-house-apartment-suite')Queen
                            @endif Size Bed
                        </span>
                    </li>
                    @if($roomName == 'king-lee-suite')
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="bi bi-sun-fill me-2"></i>
                            Private Covered Patio
                        </span>
                    </li>
                    @endif
                    @if($roomName == 'windsor-queen-suite-plus')
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="bi bi-sun-fill me-2"></i>
                            Private Covered Balcony
                        </span>
                    </li>
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="bi bi-door-open-fill me-2"></i>
                            2 Bedrooms
                        </span>
                    </li>
                    @endif
                    @if($roomName == 'the-carriage-house-apartment-suite')
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="bi bi-columns me-2"></i>
                            Complete Kitchen
                        </span>
                    </li>
                    @endif
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="fa fa-bath me-2"></i>
                            Clawfoot Tub
                        </span>
                    </li>
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="fa fa-bath me-2"></i>
                            Large Walk In Shower
                        </span>
                    </li>
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="bi bi-tv-fill me-2"></i>
                            Flat Screen TV with Cable
                        </span>
                    </li>
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="bi bi-thermometer-half me-2"></i>
                            Individually Controller Thermostat
                        </span>
                    </li>
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="bi bi-wifi me-2"></i>
                            WiFi
                        </span>
                    </li>
                    <li class="list-inline-item me-2 my-2">
                        <span class="badge rounded-pill bg-primary py-2 px-3 font-weight-bold">
                            <i class="bi bi-cup-fill me-2"></i>
                            Keurig
                        </span>
                    </li>
                </ul>
                <div>
                    <p class="fw-light mt-3">{{ $paragraphOne }}</p>
                    <p class="fw-light">{{ $paragraphTwo }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-4 mb-4 mb-lg-0 mt-lg-0">
            <div class="p-4 shadow ms-lg-4 rounded sticky-top" style="top: 100px;">
                <h4 class="text-muted">Starting at</h4>
                <p class="text-muted"><span class="text-primary h2">${{ $minimumPrice }}</span> <small>per night</small>
                </p>
                <hr class="my-4">
                <div class="d-grid mb-4">
                    <a href="tel:5025365338" class="btn btn-primary"><i class="bi bi-calendar-check-fill me-2"></i>Book
                        your
                        stay</a>
                </div>
            </div>
        </div>
        <div id="gallery" class="container mt-4 mb-5">
            <div class="row">
                @if($roomName == 'king-lee-suite')
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\king-lee\king-lee-1.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\king-lee\king-lee-2.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\king-lee\king-lee-3.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\king-lee\king-lee-1.jpg') }}" class="gallery-image ">
                </div>
                @elseif($roomName == 'windsor-queen-suite-plus')
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\1.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\2.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\3.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\4.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\5.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\6.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\7.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\8.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\9.jpg') }}" class="gallery-image ">
                </div>
                @elseif($roomName == 'the-carriage-house-apartment-suite')
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\1.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\2.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\3.jpg') }}" class="gallery-image ">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-image-container">
                    <img src="{{ asset('img\rooms\windsor-queen\4.jpg') }}" class="gallery-image ">
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
<div class="bg-light pt-5 pb-5">
    <div class="container">
        <div class="row">
            <h2 class="mb-4 text-subtitle text-center">Other Rooms Available</h2>
        </div>
        <div class="row ">
            <div class="col-12"></div>
            <div class="col-lg-6 mb-5 mb-lg-0 @if($roomName == 'king-lee-suite')d-none @endif">
                <div class="card shadow">
                    <img src="{{ asset('img/rooms/king-lee/king-lee-1.jpg') }}" class="card-img-top"
                        alt="King Lee Suite Image">
                    <div class="card-body">
                        <div class="card-title-text">
                            <h5 class="card-title">King Lee Suite</h5>
                        </div>
                        <a href="/rooms/king-lee-suite" class="btn btn-primary mt-3 stretched-link w-100">See
                            More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 @if($roomName == 'windsor-queen-suite-plus')d-none @endif">
                <div class="card shadow">
                    <img src="{{ asset('img/rooms/windsor-queen/windsor-queen-1.jpg') }}" class="card-img-top"
                        alt="The Windsor Queen Suite Image">
                    <div class="card-body">
                        <div class="card-title-text">
                            <h5 class="card-title">Windsor Queen Suite Plus</h5>
                        </div>
                        <a href="/rooms/windsor-queen-suite-plus" class="btn btn-primary mt-3 stretched-link w-100">See
                            More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 @if($roomName == 'the-carriage-house-apartment-suite')d-none @endif">
                <div class="card shadow">
                    <img src="{{ asset('img/rooms/the-carriage-house-apartment-suite/queen-suite-1.jpg') }}"
                        class="card-img-top" alt="The Carriage House Queen Suite Image">
                    <div class="card-body">
                        <div class="card-title-text">
                            <h5 class="card-title">The Carriage House Apartment Suite</h5>
                        </div>
                        <a href="/rooms/the-carriage-house-apartment-suite"
                            class="btn btn-primary mt-3 stretched-link w-100">See
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pb-5 pt-5">
    <div class="container">
        <h2 class="mb-4 text-subtitle text-center">Contact Us</h2>
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="map-responsive">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25077.01510063838!2d-85.3235413251638!3d38.218558265964205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8869bfd72f30566b%3A0x6f2052f07c06e4f4!2sYellow%20Carriage%20House!5e0!3m2!1sen!2sus!4v1642025754288!5m2!1sen!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-5 mt-5 mt-lg-0">
                <h5>Yellow Carriage House</h5>
                <hr>
                <p><i class="bi bi-person-fill me-3"></i>Amy Steele, Innkeeper</p>
                <p><a href="tel:5025365338" class="text-dark text-decoration-none"><i
                            class="bi bi-telephone-fill me-3"></i>(502)
                        536-5338</a></p>
                <p><a href="mailto:info@yellowcarriagehouse.com" class="text-dark text-decoration-none"><i
                            class="bi bi-envelope-fill me-3"></i>info@yellowcarriagehouse.com</a></p>
                <p><a href="https://www.google.com/maps/dir//Yellow+Carriage+House+4876+Shelbyville+Rd+Simpsonville,+KY+40067/@38.2179679,-85.3091878,13z/data=!4m5!4m4!1m0!1m2!1m1!1s0x8869bfd72f30566b:0x6f2052f07c06e4f4"
                        target="_blank" class="text-dark text-decoration-none"><i
                            class="bi bi-geo-alt-fill me-3"></i>4876 Shelbyville Rd, Simpsonville, KY
                        40067</p>
            </div>
        </div>
    </div>
</div>

@endsection
