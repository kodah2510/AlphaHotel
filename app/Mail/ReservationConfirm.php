<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Room;
use App\RoomPrice;

class ReservationConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $phone;
    public $fromDate;
    public $toDate;
    public $roomNumber;
    public $roomType;
    public $roomPrice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email = $data->email;
        $this->name =  $data->name;
        $this->phone = $data->phone;
        $this->roomId = $data->room_id;
        $r = App\Room::findOrFail($data->room_id);
        $this->roomNumber = $r->number;
        $this->roomType = $r->type;
        $this->roomPrice = App\RoomPrice::where('type', $r->type)->get()->first();  
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, $this->name)
                    ->subject('Reservation Confirmation')
                    ->view('email.reservationInfo')->with('data', [
                        'name' => $this->name,
                        'phone' => $this->phone,
                        'email' => $this->email,
                        'room_number' => $this->roomNumber,
                        'room_type' => $this->roomType,
                        'room_price' => $this->roomPrice,
                        'from_date' => $this->fromDate,
                        'to_date' => $this->toDate
                    ]);
    }
}
