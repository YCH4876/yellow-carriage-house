@extends('layouts.main')
@section('main')

<div class="container">
    <h1 class="mt-5 mb-5">Special Events</h1>
    <p>
        The Yellow Carriage House can support and coordinate a myriad of special events and gatherings. Indoor and
        Outdoor
        event
        space can be made available for anything from Family Reunions, Bridal or Baby Showers, Group Meetings or Small
        Weddings
        and Receptions.
    </p>
    <p>
        Our services include coordination, planning and assisting with reservations, delivery of any rental items,
        flowers,
        centerpieces, food and oversight of set up as well as removal of all items. We can also offer suggestions to
        make
        your
        event a very special day with less stress involved!
    </p>
    <p>
        We use a list of preapproved contractors for events requiring catering and/or event rentals. We will ensure
        quality
        rental items specific to your event needs are provided. A variety of caterers with varied price ranges and menu
        options
        are available also to meet your desires for food and drink service, however, in-house options may be available
        for
        smaller events.
    </p>
    <p>
        Whether you have a small group of friends for a patio luncheon or a reception with 75 guests, we want to be your
        "one stop shop" for coordination of that perfect event!
    </p>

    <div id="gallery" class="container mt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\specialEvents\baby_shower.jpg') }}" class="gallery-image ">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\specialEvents\derby_picnic.jpg') }}" class="gallery-image ">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\specialEvents\event_3.jpg') }}" class="gallery-image ">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\specialEvents\outdoor_party.jpg') }}" class="gallery-image ">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\specialEvents\reunion_at_YCH_event.jpg') }}" class="gallery-image ">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\specialEvents\wedding_grounds_1.jpg') }}" class="gallery-image ">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\specialEvents\wedding_grounds_3.jpg') }}" class="gallery-image ">
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\specialEvents\wedding_reception.jpg') }}" class="gallery-image ">
            </div>
        </div>
    </div>
</div>
@endsection
