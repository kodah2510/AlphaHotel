<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservationRequest;
use App\Room;
use App\RoomPrice;
use App\Reservation;
use Stripe;
use App\Mail\ReservationConfirm;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HotelController extends Controller
{
    //

    public function index()
    {
        return view('index');
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
        
        Log::info($reservation);

        $is_succeeded = $reservation->save();
        return response()->json(['success' => $is_succeeded]);
    }

    public function finish_reservation(Request $request)
    {
        try {
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
        } catch(\Exception $e) {
            return response()->json([
                "error" => $e.getMessage()
            ]);
        }
    }

    public function view_find_room()
    {
        return view('find_room');
    }

    public function find_room(Request $request)
    {
        $this->validate($request, [
            'room_type' => 'required',
            'from_date' => 'required',
            'to_date' => 'required'
        ]);
        
        // ok so how to query
        // starting with the whole set of hotel's rooms
        // then with the set of current booked rooms
        $roomType = $request->room_type;
        // find which room has not been reserved yet
        $reservedRooms = Reservation::distinct()->get('room_id');
        $roomArr = [];
        foreach ( $reservedRooms as $r ) {
            array_push($roomArr, $r->room_id);
        }

        $availableRooms = DB::table('rooms')->where('rooms.type', $roomType)
                                ->whereNotIn('rooms.id', $roomArr)
                                ->join('room_prices', 'room_prices.type', '=', 'rooms.type')
                                ->get();
   
        // dd([$request->from_date, $request->to_date]);
        // none of available room
        if ( count($availableRooms) == 0 ) {
            // allocate by date
            // NOT TESTED YET
        
            $anotherRooms = DB::table('reservations')
                                ->join('rooms', 'reservations.room_id', '=', 'rooms.id')
                                ->where('reservations.to_date', '<', $request->from_date)
                                ->where('rooms.type', '=', $roomType)
                                ->distinct()
                                ->get('rooms.id');
            $anotherRooms = $anotherRooms->map(function($m) {
                return $m->id;
            });
            
            if ( count($anotherRooms) == 0) {
                // room not found
                return view('find_room');

            } else {
                // error_log($anotherRooms);
                // room found
                $selectedRooms = DB::table('rooms')
                            ->join('room_prices', 'rooms.type', '=', 'room_prices.type')
                            ->whereIn('rooms.id', $anotherRooms)
                            ->get();

                return view('find_room', ['result' => $selectedRooms,
                                            'to_date' => $request->to_date,
                                            'from_date' => $request->from_date]);
            }
        } else {
            // room found
            return view('find_room', ['result' => $availableRooms,
                                        'from_date' => $request->from_date,
                                        'to_date' => $request->to_date]);
        }
    }

    public function view_book_room(Request $request)
    {
        // dd($request->id);
        $result = [
            'id' => $request->id,
            'type' => $request->type,
            'number' => $request->number,
            'price' => $request->price,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date
        ];
        return view("book_room", ['result' => $result]);
    }

    public function reservation_payment(Request $request)
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $intent = null;
        try {
            if ($request->has('payment_method_id')) {
                $amount = $request->amount * 100;
                $intent = Stripe\PaymentIntent::create([
                    'payment_method' => $request->payment_method_id,
                    'amount' => $amount,
                    'currency' => 'aud',
                    'confirmation_method' => 'manual',
                    'confirm' => true, 
                ]);
            }

            if ($request->has('payment_intent_id')) {
                $intent = stripe\paymentintent::retrieve(
                    $request->payment_intent_id
                );
                $intent->confirm();
            }

            $reservationData = (object)$request->reservation_data;

            return $this->generatePaymentResponse($intent, $reservationData);
        } catch (stripe\error\base $e) {
            report($e);

            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function generatePaymentResponse($intent, $reservationData)
    {
        if ($intent->status == 'requires_action' && 
            $intent->next_action->type == 'use_stripe_sdk') {
            return response()->json([
                'requires_action' => true,
                'payment_intent_client_secret' => $intent->client_secret
            ]);

        } else if ($intent->status == 'succeeded') {
            // add reservation infomation to the database
            try {
                $reservation = new Reservation;
                $reservation->room_id = $reservationData->room_id;
                $reservation->name = $reservationData->name;
                $reservation->email = $reservationData->email;
                $reservation->phone = $reservationData->phone;
                $reservation->from_date = $reservationData->from_date;
                $reservation->to_date = $reservationData->to_date;
                $reservation->save();
            
                // send them email
                Mail::to($reservation->email)
                        ->send(new ReservationConfirm($reservationData));

                return response()->json([
                    'success' => true,
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Invalid PaymentIntent status'
            ]);
        }
    }
}
