<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class ReservationConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $phone;
    public $customerNumber;
    public $roomType;
    public $roomNumbers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $reservationRequest = $data->reservation_request;

        $this->email = $reservationRequest->email;
        $this->name =  $reservationRequest->name;
        $this->phone = $reservationRequest->phone;
        $this->customerNumber = $reservationRequest->customerNumber;
        $this->roomType = $reservationRequest->roomType;
        $this->roomNumbers = $reservationRequest->roomNumbers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email, $this->name)
                    ->subject('reservation request')
                    ->view('email.reservationInfo');
    }
}
