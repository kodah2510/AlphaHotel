$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#find-room-modal').on('show.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var roomType = button.data('room-type');
        var roomPrice = button.data('room-price');
        var imgSrc = button.data('img-src');
        var modal = $(this);
        modal.find('#modal-room-img').attr('src',imgSrc);
        modal.find('#room-type-input').val(roomType);
        modal.find('#room-type-input').prop('disabled', true);
        modal.find('#room-price-input').val(roomPrice);
        modal.find('#room-price-input').prop('disabled', true);
    });


    $('#from-date').on('change', function(e) {
        console.log($(this).val());
        $('#to-date').attr('min', $(this).val());
    });  

    $('#find-room-button').on('click', function(e) {
        e.preventDefault();
        // find a room match the date
        //
        var roomType = $('input[name=room_type]').val();
        var fromDate = $('#from-date').val();
        var toDate = $('#to-date').val();

        if (fromDate == "" || toDate == "") {
            alert('Please select check-in date and check-out date');
            return;
        }

        console.log(roomType + ' ' + fromDate + ' ' + toDate); 

        $.ajax({
            type: 'POST',
            url: '/find_room',
            data: {
                'room_type' : roomType,
                'from_date' : fromDate,
                'to_date' : toDate
            },
            dataType: 'JSON',
            success: function(data) {
                displayPaymentForm(data);
            },

            error: function(e) {
                alert(e.message);
            }
        });
    });

    var stripe = Stripe($('meta[name="stripe-pk"]').attr('content'));
    var elements = stripe.elements();
    
    var style = {
        base: {
            fontSize: '15px',
            fontFamily: 'Helvetica, Arial, sans-serif',
            fontSmoothing: 'antialiased',
            color: '#495057',
            'invalid' : {
                iconColor: '#FFC7EE',
                color: '#FFC7EE',
            },
            marginTop: '1em !important',
            borderRadius: '0.2rem !important',
            padding: 'padding: 0.375rem 0.75rem !important'
        }
    };
    
    var cardElement = elements.create('card', {style: style});
    cardElement.mount('#card-element');
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });


    //submit the payment to stripe from the client
    var cardHolderName = $('#cardholder-name');
    var cardButton = $('#card-button');

    cardButton.on('click', function(e) {
        e.preventDefault();
        var roomId = $('input[name="id"]').val();
        var roomPrice = $('input[name="price"]').val();
        var firstName = $('input[name="first_name"]').val();
        var lastName = $('input[name="last_name"]').val();
        var email = $('input[name="email"]').val();
        var phoneNumber = $('input[name="phone_number"]').val();
        var fromDate = $('input[name="from_date"]').val();
        var toDate = $('input[name="to_date"]').val();

        var reservationData = {
            "name" : firstName + ' ' + lastName,
            "email" : email,
            "phone" : phoneNumber,
            "room_id" : parseInt(roomId),
            "from_date" : fromDate,
            "to_date" : toDate
        };

        console.log(reservationData);


        stripe.createPaymentMethod('card', cardElement, {
            billing_details: {name: cardHolderName.val()}
        }).then(function(result) {
            if (result.error) {
                alert(result.error.message);   
            } else {
                $.ajax({
                    type: 'POST',
                    url: '/reservation_payment',
                    data: {
                        'payment_method_id' : result.paymentMethod.id,
                        'amount' : roomPrice,
                        'reservation_data' : reservationData 
                    },
                    dataType: 'JSON',
                    success: function(result) {
                        handleServerResponse(result, reservationData);
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            }
        })
    });

    var handleServerResponse = function(res, reservationData) {
        if (res.error) {
            alert(res.error); 
        } else if (res.requires_action) {
            stripe.handleCardAction(res.payment_intent_client_secret)
                .then(function(result) {
                    if (result.error) {
                        alert(result.error.message); 
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: 'reservation_payment',
                            data: {
                                'payment_intent_id': result.paymentIntent.id,
                                'reservation_data' : reservationData
                            },
                            dataType: 'JSON',
                            success: function(result) {
                                handleServerResponse(result, reservationData);
                            }
                        });
                    }
                });
        } else {
            // success
            alert("Successfully booked a room");
            window.location.replace('/');
        }
    }
    var displayPaymentForm = function(data) {
        $('#room-found-msg').removeClass('d-none');
        $('#customer-name-input').removeClass('d-none');
        $('#email-and-phone-input').removeClass('d-none');
        $('#payment-info').removeClass('d-none');
        $('#card-button').removeClass('d-none');
        
        $('#find-room-button').addClass('d-none');

        $('input[name="room_id"]').val(data.room_id);
        $('input[name="room_value"]').val(data.room_number);
    }
})
