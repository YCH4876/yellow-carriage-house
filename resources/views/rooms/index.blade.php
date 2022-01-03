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
                <h1 class="mb-4">King Lee Suite</h1>
                <ul class="list-inline text-sm mb-4">
                    <li class="list-inline-item me-3"><i class="fa fa-bed me-1 text-secondary"></i> King Size Bed</li>
                    <li class="list-inline-item me-3"><i class="fa fa-bath me-1 text-secondary"></i> Clawfoot Tub &
                        Large Walk
                        In Shower
                    </li>
                    <li class="list-inline-item me-3"><i class="fa fa-couch me-1 text-secondary"></i> Personal Living
                        Area</li>
                </ul>
                <p class="text-muted fw-light">Named after King Lee, a brown stallion, foaled in 1889. He was by Diamond
                    King Yantis out of Daisy. The King Lee is a
                    spacious King Suite located on the 1st floor, featuring a King Size Bed, Private Covered Patio with
                    outdoor seating, an
                    indoor sitting area with flat screen TV, Private entrance, easy access to the Main Carriage House
                    Gathering Room, and an
                    ensuite bath with clawfoot tub and large shower.</p>
                <h6>This Rooms Amentities:</h6>
                <ul class="text-muted fw-light">
                    <li>TV with Netflix and DirectTVNow</li>
                    <li>Free WiFi</li>
                    <li>Gourmet Coffee/Tea making supplies</li>
                    <li>Fresh Sheets and Towels</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="p-4 shadow ms-lg-4 rounded sticky-top" style="top: 100px;">
                <p class="text-muted"><span class="text-primary h2">$120</span> per night</p>
                <hr class="my-4">
                <form class="form" id="booking-form" method="get" action="#" autocomplete="off">
                    <div class="mb-4">
                        <label class="form-label" for="bookingDate">Your stay *</label>
                        <div class="datepicker-container datepicker-container-right">
                            <input class="form-control" type="text" name="bookingDate" id="bookingDate"
                                placeholder="Choose your dates" required="required">
                            <div class="date-picker-wrapper no-shortcuts inline-wrapper no-gap two-months"
                                unselectable="on" style="display: none; user-select: none;">
                                <div class="drp_top-bar">
                                    <div class="normal-top"><span class="selection-top">Selected: </span> <b
                                            class="start-day">...</b> <span class="separator-day"> to </span> <b
                                            class="end-day">...</b> <i class="selected-days">(<span
                                                class="selected-days-num">3</span> Days)</i></div>
                                    <div class="error-top">error</div>
                                    <div class="default-top">Please select a date range</div><input type="button"
                                        class="apply-btn disabled hide btn btn-primary" value="Close">
                                </div>
                                <div class="month-wrapper" style="width: 427px;">
                                    <table class="month1" cellspacing="0" border="0" cellpadding="0">
                                        <thead>
                                            <tr class="caption">
                                                <th> <span class="prev">&lt; </span> </th>
                                                <th colspan="5" class="month-name">
                                                    <div class="month-element">january</div>
                                                    <div class="month-element">2022</div>
                                                </th>
                                                <th><span class="next">&gt;</span> </th>
                                            </tr>
                                            <tr class="week-name">
                                                <th>su</th>
                                                <th>mo</th>
                                                <th>tu</th>
                                                <th>we</th>
                                                <th>th</th>
                                                <th>fr</th>
                                                <th>sa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div time="1640551417417" data-tooltip=""
                                                        class="day lastMonth  invalid ">
                                                        <div style="padding:0 5px;"> <span
                                                                style="font-weight:bold">26</span>
                                                            <div class="day-subtitle">$59</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div time="1640637817417" data-tooltip=""
                                                        class="day lastMonth  invalid ">
                                                        <div style="padding:0 5px;"> <span
                                                                style="font-weight:bold">27</span>
                                                            <div class="day-subtitle">$634</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div time="1640724217417" data-tooltip=""
                                                        class="day lastMonth  invalid ">
                                                        <div style="padding:0 5px;"> <span
                                                                style="font-weight:bold">28</span>
                                                            <div class="day-subtitle">$514</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div time="1640810617417" data-tooltip=""
                                                        class="day lastMonth  invalid ">
                                                        <div style="padding:0 5px;"> <span
                                                                style="font-weight:bold">29</span>
                                                            <div class="day-subtitle">$65</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div time="1640897017417" data-tooltip=""
                                                        class="day lastMonth  invalid ">
                                                        <div style="padding:0 5px;"> <span
                                                                style="font-weight:bold">30</span>
                                                            <div class="day-subtitle">$278</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div time="1640983417417" data-tooltip=""
                                                        class="day lastMonth  invalid ">
                                                        <div style="padding:0 5px;"> <span
                                                                style="font-weight:bold">31</span>
                                                            <div class="day-subtitle">$305</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div time="1641069817417" data-tooltip=""
                                                        class="day toMonth  invalid ">
                                                        <div style="padding:0 5px;"> <span
                                                                style="font-weight:bold">1</span>
                                                            <div class="day-subtitle">$9</div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="dp-clearfix"></div>
                                    <div class="time">
                                        <div class="time1"></div>
                                        <div class="time2"></div>
                                    </div>
                                    <div class="dp-clearfix"></div>
                                </div>
                                <div class="footer"></div>
                                <div class="date-range-length-tip"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="guests">Guests *</label>
                        <select class="form-control" name="guests" id="guests">
                            <option value="1">1 Guest</option>
                            <option value="2">2 Guests</option>
                            <option value="3">3 Guests</option>
                            <option value="4">4 Guests</option>
                            <option value="5">5 Guests</option>
                        </select>
                    </div>
                    <div class="d-grid mb-4">
                        <button class="btn btn-primary" type="submit">Book your stay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection