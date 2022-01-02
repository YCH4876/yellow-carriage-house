<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index($RoomName)
    {
        //determine which room was selected
        if ($RoomName == 'king-suite') {
            //display room data to users
            return view('/rooms/index');
        } else {
            //if no matching room send to default page
            return view('welcome');
        }
    }
}
