@extends('layouts.main')
@section('main')

<div class="container">
    <h1 class="mt-5 mb-5">Gathering Room</h1>

    <p>
        At the heart of the Yellow Carriage House Bed and Breakfast is our Gathering Room. This area is complete with a
        large sectional seating area, a quiet corner with comfortable chairs in front of the fireplace and tables for 2
        to 8 persons for puzzles or board games. The Gathering Room is also equipped wtih a large flat screen TV where
        you can watch a ballgame, read a book, browse magazines, play games or simply enjoy a glass of wine.
    </p>
    <p>
        Afternoon refreshments and breakfast is served in this central area unless other arrangements are made.
    </p>
    <p>
        This area is also available for special events and occasions with prior coordination for set up.
    </p>

    <div id="gallery" class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\rooms\gathering-room\1.jpg') }}" class="gallery-image "
                    alt="Gathering Room Image">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\rooms\gathering-room\2.jpg') }}" class="gallery-image "
                    alt="Gathering Room Image">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\rooms\gathering-room\3.jpg') }}" class="gallery-image "
                    alt="Gathering Room Image">
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 mb-3 mb-sm-0 gallery-image-container">
                <img src="{{ asset('img\rooms\gathering-room\4.jpg') }}" class="gallery-image "
                    alt="Gathering Room Image">
            </div>
        </div>
    </div>
</div>

@endsection
