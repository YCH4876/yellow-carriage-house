<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        {{-- META TAGS --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- TITLE TAG --}}
        <title>Yellow Carriage House</title>
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
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
            rel="stylesheet">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/311d1c9e91.js" crossorigin="anonymous"></script>
        <!-- Custom Styles -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="{{ asset('img/logo/logo.png') }}" class="header-logo"><span
                        id="header-text">Yellow Carriage House</span></a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-2">
                            <a class="nav-link active text-dark" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Rooms
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/rooms/king-lee-suite">King Lee Suite</a>
                                <a class="dropdown-item" href="/rooms/windsor-queen-suite-plus">Windsor Queen Suite
                                    Plus</a>
                                <a class="dropdown-item" href="/rooms/the-carriage-house-apartment-suite">The Carriage
                                    House
                                    Apartment Suite</a>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <a class="dropdown-item" href="/policies">Policies</a>
                            </ul>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link text-dark" href="/special-events">Special Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/local-attractions">Local Attractions</a>
                        </li>
                        <li class="nav-item ms-0 ms-lg-4">
                            <a class="btn btn-primary" href="/#contact">Book Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="main-div">
        @yield('main')
    </main>

    <footer class="bg-dark text-center py-3">
        <small class="text-white">Copyright &copy; 2022 Yellow Carriage House</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    </body>

</html>
