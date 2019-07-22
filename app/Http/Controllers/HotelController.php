<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservationRequest;
use App\Room;
use App\Reservation;
use Mail;
use App\Mail\ReservationConfirm;
use Stripe;

class HotelController extends Controller
{
    //

    public function index()
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $intent = Stripe\PaymentIntent::create([
            'amount' => 20000,
            'currency' => 'aud'
        ]);
        return view('index', ['intent' => $intent]);
    }

    public function reservation(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone'=> 'required',
            'guest_count' => 'required',
            'room_type' => 'required',
            'from_date' => 'required',
            'to_date' => 'required'
        ]);

        $reservation = new ReservationRequest;
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guest_count = $request->guest_count;
        $reservation->room_type = $request->room_type;
        $reservation->from_date = date('Y-m-d', strtotime($request->from_date));
        $reservation->to_date = date('Y-m-d', strtotime($request->to_date));

        $is_succeeded = $reservation->save();
        return response()->json(['success' => $is_succeeded]);
    }

    public function finish_reservation(Request $request)
    {
        //valid input
        $this->validate($request, [
            'reservation_request' => 'required',
            'room_index' => 'required|array',
        ]);
        $reservationRequest = $request->reservation_request;
        // save to database
        $reservationRequestId = $reservationRequest->id;
        $roomNumbers = [];

        foreach ($request->room_index as $rIdx) {
            // save the room to the reservation table
            $rev = new App\Reservation;
            $rev->request_id = $reservationRequestId;
            $rev->room_id = $rIdx;
            $rev->save();
            // find the number of the room
            array_push($roomNumbers, App\Room::where('id', $rIdx)->first()->number);
        }

        // should do this before calculate the deposit
        // 

        $data = [
            'reservation_request' => $request->reservation_request,
            'room_index' => $request->room_index,
            'room_numbers' => $roomNumbers
        ];
        
        // send invoice
        Mail::to($reservationRequest->email)
            ->send(new App\Mail\ReservationConfirm($data));
        
        return response()->json([
            "success" => true,
        ]);

    }
    function payment()
    {
        $intent = \Stripe\PaymentIntent::create([
            'amount' => 1000,
            'currency' => 'dollar'
        ]); 
    }
}
