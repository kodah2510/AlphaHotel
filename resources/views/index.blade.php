<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Alpha Hotel Template</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ mix('js/modal.js') }}" type="text/javascript"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display|Pacifico|Satisfy|Dancing+Script&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet"> -->
</head>
<body>
    <div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
        <div class="row landing">
            <div class="landing-img"></div>
            <nav class="navbar navbar-expand-lg navbar-dark d-flex justify-content-space-around">
                <a href="#" class="navbar-brand">
                    Alpha Hotel
                </a>
                <button class="navbar-toggler ml-auto hidden-sm-up float-xs-right " type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <!-- <div class="btn-group auth-btn-group" role="group">
                        <button class="btn btn-auth">Login</button>
                        <button class="btn btn-auth">Register</button>
                    </div> -->
                </div>
            </nav>

            <div class="col landing-description">
                <h1 class="landing-title title-intro-anim">Welcome to Alpha Hotel!</h1>
                <p class="landing-paragraph paragraph-intro-anim">Ready to immerse yourself into aethestic, magnificient world of art and music</p>
                <p class="landing-paragraph paragraph-intro-anim">
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book 
                </p>
                <hr class="landing-underline underline-intro-anim"/>
                <div class="landing-btn-group landing-btn-intro-anim">
                    <a href="#" class="btn landing-btn ">Reservation</a>
                    <a href="#" class="btn landing-btn-outline">Find out!</a>
                </div>
           </div>
        </div>
        <div class="row services-intro">
            <div class="col-lg-6 services-intro-description">
                <!-- introductory --> 
                <h1>Food and Drink</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
                <!-- table -->
                <div class="row justify-content-center">
                    <table class="table table-sm">
                        <tr class="border-top-hidden">
                            <th class="menu-header">Foods</th>
                            <th></th>
                        </tr>
                        <tr class="border-bottom-hidden">
                            <td class="dish-name">Egg</td>
                            <td class="dish-price">4.00$</td>
                        </tr>
                        <tr class="border-bottom-hidden">
                            <td class="dish-name">Bacon</td>
                            <td class="dish-price">5.00$</td>
                        </tr>
                        <tr class="border-top-hidden">
                            <th class="menu-header">Drink</th>
                            <th></th>
                        </tr>
                        <tr class="border-bottom-hidden">
                            <td class="dish-name">Soft Drink</td>
                            <td class="dish-price">6.00$</td>
                        </tr>
                        <tr class="border-bottom-hidden">
                            <td class="dish-name">Pho Cooktail</td>
                            <td class="dish-price">6.00$</td>
                        </tr>
                    </table>    
                </div>
                
            </div>
            <div class="col-lg-6 services-intro-img">
                <!-- Carousel -->
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/fnd_5.jpg" alt="food_and_drink" class="fnd-img">
                        </div>
                        <div class="carousel-item">
                            <img src="img/fnd_2.jpg" alt="food_and_drink" class="fnd-img">
                        </div>
                        <div class="carousel-item">
                            <img src="img/fnd_3.jpg" alt="food_and_drink" class="fnd-img">
                        </div>
                        <div class="carousel-item">
                            <img src="img/fnd_6.jpg" alt="food_and_drink" class="fnd-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- room -->

    <div class="container-fluid room-container">
        <div class="row justify-content-center " style="padding-top: 30px;  margin-bottom: 30px">
            <h2 class="section-title">Our Rooms</h2>
        </div>
        <div class="row d-flex justify-content-between room-row">
           <div class="col-md-4">
            <div class="card room-card">
                <img src="img/room_1.jpg" class="card-img-top img-fluid" alt="">
                <div class="card-body room-card-body">
                     <div class="card-title">
                         <h5>Single room</h5>
                     </div>
                     <div class="card-text">
                        <ul>
                            <li>TV, AirCon</li>
                            <li>Buffet Breakfast</li>
                            <li>200$ / night</li>
                        </ul>
                        <button class="btn btn-primary find-room-btn w-100" type="button" 
                            data-toggle="modal" 
                            data-target="#find-room-modal"
                            data-room-type="single"
                            data-room-price="200"
                            data-img-src="img/room_1.jpg"
                            >Find Now</button>
                     </div>
                </div>
            </div>
           </div>
           <div class="col-md-4">
             <div class="card room-card">
                <img src="img/room_2.jpg" class="card-img-top" alt="">
                <div class="card-body room-card-body">
                     <div class="card-title">
                         <h5>Family Room</h5>
                     </div>
                     <div class="card-text">
                        <ul>
                            <li>TV, AirCon</li>
                            <li>Buffet Breakfast</li>
                            <li>250$ / night</li>
                        </ul>
                        <button class="btn btn-primary find-room-btn w-100" type="button" 
                            data-toggle="modal" 
                            data-target="#find-room-modal"
                            data-room-type="family"
                            data-room-price="250"
                            data-img-src="img/room_2.jpg"
                            >Find Now</button>
                     </div>
                </div>
            </div>
           </div>
           <div class="col-md-4">
                <div class="card room-card">
                    <img src="img/room_3.jpg" class="card-img-top" alt="">
                    <div class="card-body room-card-body">
                         <div class="card-title">
                             <h5>Business Room</h5>
                         </div>
                         <div class="card-text">
                            <ul>
                                <li>TV, AirCon</li>
                                <li>Buffet Breakfast</li>
                                <li>300$ / night</li>
                            </ul>
                            <button class="btn btn-primary find-room-btn w-100" type="button" 
                                data-toggle="modal" 
                                data-target="#find-room-modal"
                                data-room-type="business"
                                data-room-price="300"
                                data-img-src="img/room_3.jpg"
                                >Find Now</button>
                         </div>
                    </div>
                </div> 
            </div>
       </div> 
       <div id="find-room-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Book Room Form</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="True">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- image -->
                                <img id="modal-room-img" src="" alt="room image" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <form action="">
                                    <div class="form-row">
                                        <div class="col">
                                            <label>Customer Name</label>
                                            <input class="form-control form-control-sm" type="text" name="name" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="col">
                                            <label>Email</label>
                                            <input class="form-control form-control-sm" type="text" name="email" required>
                                        </div>
                                        <div class="col">
                                            <label>Phone</label>
                                            <input class="form-control form-control-sm" type="text" name="phone" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="">Payment Info</label>
                                            <input id="cardholder-name" class="form-control form-control-sm" type="text" name="cardholderName" placeholder="Card Holder" required>
                                            <div id="card-element"></div>
                                            <div id="card-errors" role="alert"></div>
                                        </div>
                                        <script type="text/javascript">
                                            $(function() {
                                                var stripe = Stripe('{{ config('services.stripe.key') }}');
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
                                                })


                                                //submit the payment to stripe from the client
                                                var cardHolderName = $('#cardholder-name');
                                                var cardButton = $('#card-button');
                                                var clientSecret = cardButton[0].dataset.secret;

                                                cardButton.on('click', function(e) {
                                                    e.preventDefault();
                                                    stripe.handleCardPayment(
                                                        clientSecret, cardElement, {
                                                            payment_method_data: {
                                                                billing_details: {
                                                                    name: cardHolderName.value
                                                                }
                                                            }
                                                        }
                                                    ).then(function(result) {
                                                        if (result.error) {
                                                            alert(result.error);
                                                        } else {
                                                            alert('payment success'); 
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <label for="#room-type-input">Room Type</label>
                                            <input id="room-type-input" class="form-control form-control-sm" type="text">
                                        </div>
                                        <div class="col">
                                            <label for="#room-type-input">Price</label>
                                            <input id="room-price-input" class="form-control form-control-sm" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group form-row" style="margin-top: 5px" >
                                        <div class="col" style="padding-left: 5px; padding-right: 5px;">
                                            <input id="from-date" class="form-control form-control-sm" type="date" placeholder="From Date" name="from_date" required>
                                        </div>
                                        <div class="col" style="padding-left: 5px; padding-right: 5px;">
                                            <input id="to-date" class="form-control form-control-sm" type="date" placeholder="To Date" name="to_date" required>
                                        </div>
                                    </div>
                                    <!--<script type="text/javascript">
                                        //$(function() {
                                            //$('#datetimepicker').datepicker();
                                            //$('.input-daterange input').each(function() {
                                            //    $(this).datepicker('clearDates');
                                            //});
                                        //});
                                    </script>-->                
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary fr-btn-close" data-dismiss="modal">Close</button>
                    <button id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-primary fr-btn-find">Book this room</button>
                </div>
            </div>
        </div>
       </div>
    </div>
    <!-- how to book a room -->
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 50px; margin-bottom: 20px">
            <h2 class="section-title">Make a reservation</h2>   
        </div>
        <div class="jumbotron reservation-form">
            <p>Make reservation throught phone or email</p>
            <p>Call us on: <b>0419483493</b> or send us an reservation request through this form below</p>
            <form action="{{ route('sendReservationRequest')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col">
                       <input class="form-control" type="email" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input class="form-control" type="text" placeholder="Name" name="name">
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" placeholder="Phone Number" name="phone">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input class="form-control" type="number" min="0" placeholder="Number of customers" name="guest_count">
                    </div>
                    <div class="col">
                        <select class="form-control" name="room_type">
                            <option value="single">Single Room</option>
                            <option value="family">Family Room</option>
                            <option value="business">Business Room</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-row">
                    <div id="datetimepicker" class="input-group input-daterange">
                        <div class="col">
                            <input class="form-control" type="text" placeholder="From Date" name="from_date">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" placeholder="To Date" name="to_date">
                        </div>
                    </div>
                    
                </div>
                <script type="text/javascript">
                    $(function() {
                        $('#datetimepicker').datepicker();
                        $('.input-daterange input').each(function() {
                            $(this).datepicker('clearDates');
                        });
                    });
                </script>
                <div class="form-group text-right">
                    <button id="submit-reservation" class="btn btn-auth mr-auto" type="submit">Submit</button>
                    <script type="text/javascript">
                        $(function() {
                            $('#submit-reservation').on('click', function(e) {
                                e.preventDefault();

                                var name = $('input[name=name]').val();
                                var email = $('input[name=email]').val();
                                var phone = $('input[name=phone]').val();
                                var guest_count = $('input[name=guest_count]').val();
                                var room_type = $('select[name=room_type] option:selected').val();
                                var from_date = $('input[name=from_date]').val();
                                var to_date = $('input[name=to_date]').val();

                                $.ajax({
                                    type: 'POST',
                                    url: '/reservation',
                                    data: {
                                        '_token': "{{ csrf_token() }}",
                                        'name': name,
                                        'email': email,
                                        'phone': phone,
                                        'guest_count': guest_count,
                                        'room_type': room_type,
                                        'from_date': from_date,
                                        'to_date': to_date
                                    },
                                    dataType: 'JSON',
                                    success: function(data) {
                                        $('#request-success-modal').modal('toggle'); 
                                    },

                                    error: function(e) {
                                        console.log(e); 
                                    }
                                }); 
                            });
                        });
                    </script>
                </div>
           </form>
           <div id="request-success-modal" class="modal fade" tabindex="-1" role="dialog">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title">Success</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                       <div class="modal-body">
                           <p>Reservation request has been sent!</p>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>

    <div class="container-fluid footer" >
            <div class="row">
                <div class="col-md-7">
                    <div class="row" style="padding-left: 0px; padding-right: 0px; margin-left:0px; margin-right: 0px;">
                        <div class="col-md-4">
                            <h4>View Rooms</h4>
                            <ul>
                                <li><a href="">Single Room</a></li>
                                <li><a href="">Family Room</a></li>
                                <li><a href="">Business Room</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Food and Drinks</h4>
                            <ul>
                                <li><a href="">Restaurants</a></li>
                                <li><a href="">Bar</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4>Events</h4>
                            <p><a href="">Latest events</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h4>Contact Information</h4>
                    <div class="row">
                        <div class="col-md-1">
                        <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="col-md-11">
                         20 Fins Alley, TimberWalton Valley, NoWhere Str 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                       <span class="fa fa-phone" aria-hidden="true"></span> 
                        </div>
                        <div class="col-md-11">
                            04-1385-4825
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <span class="fa fa-envelope"></span>
                        </div>
                        <div class="col-md-11">
                            john.doe2910@gmail.com
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <small>&copy; 2019 All Rights Reserved. </small>
            </div>
        </div>
    </div>
</body>
</html>
