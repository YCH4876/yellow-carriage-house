<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        //get the last part of the URL to determine the room
        $roomName = request()->segment(count(request()->segments()));

        //determine which room was selected
        if ($roomName == 'king-lee-suite') {
            //remove dashes from room name
            $roomNameNormal = str_replace("-", " ", $roomName);
            $roomNameUppercase = ucwords($roomNameNormal);
            $paragraphOne = 'Named after King Lee, a brown stallion, foaled in 1889. He was by Diamond King Yantis out of Daisy. The King Lee is a spacious King Suite located on the 1st floor, featuring a King Size Bed, Private Covered Patio with outdoor seating, an indoor sitting area with flat screen TV, Private entrance, easy access to the Main Carriage House Gathering Room, and an ensuite bath with clawfoot tub and large shower.';
            $paragraphTwo = 'Reservations range from $180 to $195 per night. Special event reservations may be slightly higher. All pricing is based on double occupancy. Each additional guest is a rate of $5.00 per night. A single bed (or an infant pack and play) can be placed in the suite, if needed.';
            $minimumPrice = '180';

            //display room data to users
            return view('/rooms/index', [
                'roomNameUppercase' => $roomNameUppercase,
                'paragraphOne' => $paragraphOne,
                'paragraphTwo' => $paragraphTwo,
                'minimumPrice' => $minimumPrice
            ]);
        } else {
            //if no matching room send to default page
            return view('welcome');
        }
    }
}
