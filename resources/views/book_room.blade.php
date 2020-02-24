@extends('layouts.my_app')

@section('content')
    @if (isset($result))
    <div class="container">
        <div class="row justify-content-center"><h3>Booking Form</h3></div>
        
        <div class="row d-flex justify-content-center">
            <div class="col-10">
                <form>
                    <input type="text" name="id" value="{{ $result['id'] }}" class="d-none" readonly>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="" class="col-form-label">Room Number: </label>
                            <input class="form-control" type="text" name="number" value="{{ $result['number'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="" class="col-form-label">Type: </label>
                            <input class="form-control" type="text" name="type" value="{{ $result['type'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="" class="col-form-label">Price: </label>
                            <input class="form-control" type="text" name="price" value="{{ $result['price'] }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="" class="col-form-label">From Date</label>
                            <input class="form-control" type="date" name="from_date" value="{{ $result['from_date'] }}" placeholder="From Date" readonly>
                        </div>
                        <div class="col-6">
                            <label for="" class="col-form-label">To Date</label>
                            <input class="form-control" type="date" name="to_date" value="{{ $result['to_date'] }}"  placeholder="To Date" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="" class="col-form-label">First Name: </label>
                            <input class="form-control" type="text" name="first_name" placeholder="First Name">
                        </div>
                        <div class="col-6">
                            <label for="" class="col-form-label">Last Name: </label>
                            <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="" class="col-form-label">Phone Number: </label>
                            <input class="form-control" type="text" name="phone_number" placeholder="Phone Number">
                        </div>
                        <div class="col-6">
                            <label for="" class="col-form-label">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    
                    <div id="payment-info" class="form-row">
                        <div class="col-6">
                            <label for="">Payment Info</label>
                            <input id="cardholder-name" class="form-control form-control-sm" type="text" name="cardholderName" placeholder="Card Holder" required>
                            <div id="card-element"></div>
                            <div id="card-errors" role="alert"></div>
                        </div>
                    </div>

                    <button id="card-button" type="button" class="btn btn-primary float-right ml-4">Finalise Booking</button>
                    <a href="/find_room" class="btn btn-secondary float-right">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection