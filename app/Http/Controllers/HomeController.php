<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient; 
use App\ReservationRequest;
use App\Room;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // call the api here
        // https://mailtrap.io/api/v1/inboxes 
        return view('home');
    }

    public function reservation_content(Request $request)
    {
        $reservation = ReservationRequest::findOrFail($request->id);
        $rooms = Room::all();

        return view('reservation', [
            'reservation_requests' => $this->reservation_requests,
            'request_count' => $this->request_count,
            'current_request' => $reservation,
            'rooms' => $rooms
        ]);
    }
}
