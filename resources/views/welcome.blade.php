@extends('layouts.main')
@section('main')

<body class="antialiased">
    <div id="homeDiv">
        <div class="overlayDark">
            <div class="container">
                <div class="text-center text-white justify-content-center align-self-center pt-5 pb-5">
                    <h1 class="mb-2 pt-5 font-weight-bold cursive text-white heading-text">Yellow Carriage House</h1>
                    <h5 class="font-weight-light pb-5">Located in the heart of Horse Country & the Bourbon Trail</h5>
                </div>
            </div>
        </div>
    </div>

    <div id="" class="bg-light pb-5 pt-5">
        <div class="container">
            <div class="">
                <h2 class="text-center text-subtitle">Relax, Refresh, and Unwind</h2>
            </div>
            <p>
                Whether you're after that perfect romantic getaway, weekend
                adventure or looking for an elegant alternative to chain hotels when traveling for
                business, the Yellow Carriage House offers accommodations to make your stay truly
                memorable. Innkeeper is on site, in a separate suite.
            </p>
        </div>
    </div>

    <div class="pb-5 pt-5">
        <div class="container ">
            <div class="mb-5">
                <h2 class="text-center font-weight-bold mb-3">Our Rooms</h2>
                <p>
                    Our spacious suites have antique furnishings, luxurious beds, private baths, fine linens,
                    Keurigs with pods, free Wi-Fi, mini refrigerators and Cable TV. We offer a quiet,
                    centralized country setting amongst picturesque, rolling hill horse farms.
                </p>
                <p>
                    Awake each morning rested and ready for the day with a bountiful array of
                    complimentary breakfast items before you set off to explore Central Kentucky.
                    After a long day of discovery, you can relax in your private Suite or you can visit
                    with other guests, watch TV, play games, enjoy a beverage or have snacks in the Gathering Room.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
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
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="card shadow">
                        <img src="{{ asset('img/rooms/windsor-queen/windsor-queen-1.jpg') }}" class="card-img-top"
                            alt="The Windsor Queen Suite Image">
                        <div class="card-body">
                            <div class="card-title-text">
                                <h5 class="card-title">Windsor Queen Suite Plus</h5>
                            </div>
                            <a href="/rooms/windsor-queen-suite-plus"
                                class="btn btn-primary mt-3 stretched-link w-100">See
                                More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow">
                        <img src="{{ asset('img/rooms/queen-suite/queen-suite-1.jpg') }}" class="card-img-top"
                            alt="The Carriage House Queen Suite Image">
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
            {{--
            <div class="mt-3">
                <p>Our house and guest rooms include the following</p>
                <ul>
                    <li>In Suite breakfast items, refreshments and snacks (suites have a mini refrigerator, Keurig and
                        seating area)</li>
                    <li>Private Entrances and Covered Verandas</li>
                    <li>Large Private Suites with Balcony or Patio</li>
                    <li>Luxury Bedding, Linens and Individual Robes</li>
                    <li>Complimentary Cable TV and WiFi</li>
                    <li>Individually Controlled Thermostats</li>
                    <li>Soaking Tubs/Walk-In Showers</li>
                    <li>Outdoor Seating areas and Fire pit</li>
                    <li>Large Central Gathering Area and Dining Room with a beverage cooler, breakfast items and snacks
                    </li>
                </ul>
            </div>
            --}}
        </div>
    </div>

    <div class="bg-light pb-5 pt-5">
        <div class="container">
            <h2 class="text-center font-weight-bold mb-3">Contact Us</h2>
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
