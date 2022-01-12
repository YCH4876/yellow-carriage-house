@extends('layouts.main')
@section('main')

<div class="row">
    <div class="col-4 p-0">
        <img src="{{ asset('img/rooms/king-lee/king-lee-1.jpg') }}" class="img-fluid">
    </div>
    <div class="col-4 p-0">
        <img src="{{ asset('img/rooms/king-lee/king-lee-2.jpg') }}" class="img-fluid">
    </div>
    <div class="col-4 p-0">
        <img src="{{ asset('img/rooms/king-lee/king-lee-3.jpg') }}" class="img-fluid">
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
                    <p class="text-muted fw-light mt-3">{{ $paragraphOne }}</p>
                    <p class="text-muted fw-light">{{ $paragraphTwo }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded sticky-top" style="top: 100px;">
                <h4 class="text-muted">Starting at</h4>
                <p class="text-muted"><span class="text-primary h2">${{ $minimumPrice }}</span> <small>per night</small>
                </p>
                <hr class="my-4">
                <form class="form" id="booking-form" method="get" action="#" autocomplete="off">
                    <div class="d-grid mb-4">
                        <a href="#" class="btn btn-primary"><i class="bi bi-calendar-check-fill me-2"></i>Book your
                            stay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection