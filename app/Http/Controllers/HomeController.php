<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient; 
use App\ReservationRequest;
use App\Room;

class HomeController extends Controller
{
    public $request_count;
    public $reservation_requests;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->reservation_requests = ReservationRequest::where('is_processed', 0)->get();
        $this->request_count = count($this->reservation_requests);
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
        //$reservation_requests = ReservationRequest::where('is_processed', 0)->get();
        //$request_count = count($reservation_requests);
        return view('home', [
            'reservation_requests' => $this->reservation_requests,
            'request_count' => $this->request_count
        ]);
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
