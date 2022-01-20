<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        //get the last part of the URL to determine the room
        $roomName = request()->segment(count(request()->segments()));
        //remove dashes from room name
        $roomNameNormal = str_replace("-", " ", $roomName);
        //capitalize all the letters
        $roomNameUppercase = ucwords($roomNameNormal);
        //determine which room was selected
        if ($roomName == 'king-lee-suite') {
            $paragraphOne = 'Named after King Lee, a brown stallion, foaled in 1889.
            He was by Diamond King Yantis out of Daisy. The King Lee is a spacious King Suite located
            on the 1st floor, featuring a King Size Bed, Private Covered Patio with outdoor seating, an
            indoor sitting area with flat screen TV, Private entrance, easy access to the Main Carriage
            House Gathering Room, and an ensuite bath with clawfoot tub and large shower.';
            $paragraphTwo = 'Reservations range from $150 to $175 per night. Special event reservations
            may be slightly higher. All pricing is based on double occupancy. Each additional guest is a
            rate of $25.00 per night. A single bed (or an infant pack and play) can be placed in the suite,
            if needed.';
            $minimumPrice = '150';
        } else if ($roomName == 'windsor-queen-suite-plus') {
            $paragraphOne = 'Named after Windsor Queen, a chestnut mare foaled April
                6, 1953 by Royal Star of Windsor out of Queen Blees.  The beautiful and spacious
                Windsor Queen Suite is located on the 2nd floor and features a queen size bed in the
                main bedroom with a private covered balcony, an indoor sitting area, flat screen TV,
                direct access to the Carriage House Gathering Room, and an en-suite bath with claw-
                foot tub and spacious shower.  As a bonus, this suite also offers a connected but
                separate small bedroom with a twin bed. The 2 rooms are separated by an eating area
                that includes a table/chairs, Keurig with pods and mini refrigerator.';
            $paragraphTwo = 'Reservations range from $160 to $185 per night. Special event reservations may be
                slightly higher. All pricing is based on double occupancy. Each additional guest is a rate
                of $25.00 per night. A single bed (or an infant pack and play) can be placed in the suite, if needed';
            $minimumPrice = '160';
        } else if ($roomName == 'the-carriage-house-apartment-suite') {
            $paragraphOne = 'The unique Carriage House Apartment Suite is
                accessible by an interior staircase with private entrance and breezeway access to the
                Main Carriage House. The fully furnished suite features a living room, dining area,
                complete kitchen, queen bed, antique claw-foot tub, and dual fireplace.';
            $paragraphTwo = 'Reservations range from $175 to $200 per night. Special event reservations may be
                slightly higher. All pricing is based on double occupancy. Each additional guest is a rate
                of $25.00 per night. A single bed (or an infant pack and play) can be placed in the suite, if
                needed. Both short and long term rentals are available for this Apartment Suite and
                prices vary based on length of stay.';
            $minimumPrice = '175';
        }

        //display room data to users
        return view('/rooms/index', [
            'roomName' => $roomName,
            'roomNameUppercase' => $roomNameUppercase,
            'paragraphOne' => $paragraphOne,
            'paragraphTwo' => $paragraphTwo,
            'minimumPrice' => $minimumPrice
        ]);
    }
}
