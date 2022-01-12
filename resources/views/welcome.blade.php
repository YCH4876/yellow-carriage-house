@extends('layouts.main')
@section('main')

<body class="antialiased">
    <div id="homeDiv">
        <div class="overlayDark">
            <div class="container">
                <div class="text-center text-white justify-content-center align-self-center pt-5 pb-5">
                    <h1 class="mb-2 pt-5 font-weight-bold">Yellow Carriage House Inn</h1>
                    <h3 class="font-weight-light pb-5">est. 1875</h3>
                    <p class="font-weight-light">A turn of the century restored dairy farm located between
                        Louisville & Lexington.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="" class="bg-light pb-5 pt-5">
        <div class="container">
            <div class="mb-5 pb-3">
                <p class="text-center text-subtitle">Relax, Refresh, and Unwind</p>
                <h2 class="text-center font-weight-bold">Your Old Kentucky Home Away From Home</h2>
            </div>
            <div class="row mt-5">
                <div class="mb-3 mb-lg-0 text-center col-lg-4">
                    <div class="px-0 px-lg-3">

                        <h4 class="font-weight-bold">Find the perfect rental</h4>
                        <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found
                            himself transformed in his bed in</p>
                    </div>
                </div>
                <div class="mb-3 mb-lg-0 text-center col-lg-4">
                    <div class="px-0 px-lg-3">

                        <h4 class="font-weight-bold">Find the perfect rental</h4>
                        <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found
                            himself transformed in his bed in</p>
                    </div>
                </div>
                <div class="mb-3 mb-lg-0 text-center col-lg-4">
                    <div class="px-0 px-lg-3">

                        <h4 class="font-weight-bold">Find the perfect rental</h4>
                        <p class="text-muted">One morning, when Gregor Samsa woke from troubled dreams, he found
                            himself transformed in his bed in</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--
    <div class="pb-5 pt-5">
        <div class="container">
            <div class="mb-5 pb-3">
                <p class="text-center text-subtitle">Relax, Refresh, and Unwind</p>
                <h2 class="text-center font-weight-bold">Our Rooms</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="card shadow">
                        <img src="{{ asset('img/rooms/king-lee/king-lee-1.jpg') }}" class="card-img-top"
                            alt="King Lee Suite Image">
                        <div class="card-body">
                            <h5 class="card-title">King Lee Suite</h5>
                            <a href="/king-lee-suite" class="btn btn-primary mt-3">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="card shadow">
                        <img src="{{ asset('img/rooms/queen-suite/queen-suite-1.jpg') }}" class="card-img-top"
                            alt="The Carriage House Queen Suite Image">
                        <div class="card-body">
                            <h5 class="card-title">The Carriage House Queen Suite</h5>
                            <a href="/the-carriage-house-queen-suite" class="btn btn-primary mt-3">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="card shadow">
                        <img src="{{ asset('img/rooms/moonlights-dream/moonlights-dream-1.jpg') }}" class="card-img-top"
                            alt="The Moonlight's Dream Bedroom Image">
                        <div class="card-body">
                            <h5 class="card-title">The Moonlight's Dream Bedroom</h5>
                            <a href="/king-lee-suite" class="btn btn-primary mt-3">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="card shadow">
                        <img src="{{ asset('img/rooms/twilight-song/twilight-song-1.jpg') }}" class="card-img-top"
                            alt="The Twilight Song Room Image">
                        <div class="card-body">
                            <h5 class="card-title">The Twilight Song Room</h5>
                            <a href="/king-lee-suite" class="btn btn-primary mt-3">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}

    <div class="pb-5 pt-5">
        <div class="container ">
            <div class="mb-3">
                <p class="text-center text-subtitle">Relax, Refresh, and Unwind</p>
                <h2 class="text-center font-weight-bold">Our Rooms</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3 mb-md-0">
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
                <div class="col-lg-4 mb-3 mb-md-0">
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
        </div>
    </div>

    @endsection