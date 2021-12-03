<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        {{-- META TAGS --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- TITLE TAG --}}
        <title>Yellow Carriage House Inn</title>
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500;700&display=swap"
            rel="stylesheet">
        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
            <div class="container">
                <a class="navbar-brand text-warning" href="/"><i class="bi bi-house-fill me-2"></i> Yellow Carriage
                    House Inn</a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-2">
                            <a class="nav-link active text-dark" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link text-dark" href="#">Rooms</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link text-dark" href="#">Special Events</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link text-dark" href="#">Local Attractions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

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
                    <div class="col-6 col-md-1 order-1 order-md-1 pt-5 align-self-center text-center">
                        <button class="btn btn-primary btn-lg" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                            <i class="bi bi-arrow-left-circle-fill"></i>
                        </button>
                    </div>
                    <div class="col-12 col-md-10 order-3 order-md-2 align-self-center">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-inner p-5">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <div class="card shadow">
                                                <img src="{{ asset('img/rooms/king-lee/king-lee-1.jpg') }}"
                                                    class="card-img-top" alt="King Lee Suite Image">
                                                <div class="card-body">
                                                    <h5 class="card-title">King Lee Suite</h5>
                                                    <a href="/king-lee-suite"
                                                        class="btn btn-primary mt-3 stretched-link">See More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow">
                                                <img src="{{ asset('img/rooms/moonlights-dream/moonlights-dream-1.jpg') }}"
                                                    class="card-img-top" alt="The Moonlight's Dream Bedroom Image">
                                                <div class="card-body">
                                                    <h5 class="card-title">The Moonlight's Dream Bedroom</h5>
                                                    <a href="/the-monnlights-dream-bedroom"
                                                        class="btn btn-primary mt-3 stretched-link">See
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <div class="card shadow">
                                                <img src="{{ asset('img/rooms/windsor-queen/windsor-queen-1.jpg') }}"
                                                    class="card-img-top" alt="The Windsor Queen Suite Image">
                                                <div class="card-body">
                                                    <h5 class="card-title">The Windsor Queen Suite Plus</h5>
                                                    <a href="/the-windsor-queen-suite"
                                                        class="btn btn-primary mt-3 stretched-link">See
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow">
                                                <img src="{{ asset('img/rooms/queen-suite/queen-suite-1.jpg') }}"
                                                    class="card-img-top" alt="The Carriage House Queen Suite Image">
                                                <div class="card-body">
                                                    <h5 class="card-title">The Carriage House Queen Suite</h5>
                                                    <a href="/the-carriage-house-queen-suite"
                                                        class="btn btn-primary mt-3 stretched-link">See
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <div class="card shadow">
                                                <img src="{{ asset('img/rooms/twilight-song/twilight-song-1.jpg') }}"
                                                    class="card-img-top" alt="Twilight Song Room Image">
                                                <div class="card-body">
                                                    <h5 class="card-title">Twilight Song Room</h5>
                                                    <a href="/king-lee-suite"
                                                        class="btn btn-primary mt-3 stretched-link">See More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-1 order-2 order-md-3 pt-5 align-self-center text-center">
                        <button class="btn btn-primary btn-lg" type="button" data-bs-target="#carouselExampleDark"
                            class="pr-0" data-bs-slide="next">
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>

</html>
