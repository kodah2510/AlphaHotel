@extends('layouts.my_app')

@section('content')
<div class="container">
    <h1>Find Room</h1>
    <hr style="border-top: 1px solid white">
    <div class="row">
        <div class="col-12">
            <form id="find-room-form" method="GET" action="/find_room">
                <div class="form-group row">
                    <div class="col-12">
                        <label for="#roomType">Room Type</label>
                        <select class="custom-select" name="room_type" id="roomType">
                            <option value="single">Single</option>
                            <option value="family">Family</option>
                            <option value="business">Business</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div id="datetimepicker" class="input-group input-daterange">
                        <div class="col">
                            <label for="">From Date</label>
                            <input id="from-date" class="form-control" type="date" placeholder="From Date" name="from_date">
                        </div>
                        <div class="col">
                            <label for="">To Date</label>
                            <input id="to-date" class="form-control" type="date" placeholder="To Date" name="to_date">
                        </div>
                    </div>
                </div>

                <button type="submit" class="float-right btn btn-primary" style="width: 100px">Find</button>
            </form>
        </div>
    
        
    </div>
    @if (isset($result) && isset($from_date) && isset($to_date))
    @foreach ($result as $room)

        <div class="row room-search-instance">
            <div class="col-3">
                @switch ($room->type)
                    @case("single")
                        <img src="img/room_1.jpg" alt="" class="room-img">
                        @break
                    @case("family")
                        <img src="img/room_2.jpg" alt="" class="room-img">
                        @break
                    @case("business")
                        <img src="img/room_3.jpg" alt="" class="room-img">
                        @break
                    @default
                        @break
                @endswitch
            </div>

            <div class="col-9">
                <form action="/view_book_room" method="GET">
                    <input type="text" value="{{ $room->id }}" name="id" class="d-none">
                    <div class="form-group">
                        <label for="">Type:</label>
                        <input type="text" value="{{ $room->type }}" name="type" class="d-none">
                        <p class="mb-0 d-inline">{{ $room->type }}</p>
                    </div>
                    <div class="form-group">
                        <label for="" >Room Number:</label>
                        <input type="text" value="{{ $room->number }}" name="number" class="d-none">
                        <p class="mb-0 d-inline">{{ $room->number }}</p>
                    </div>
                    <div class="form-group mb-0">
                        <label for="">Price:</label>
                        <input type="text" value="{{ $room->price }}" name="price" class="d-none">
                        <p class="mb-0 d-inline">{{ $room->price }}</p>
                    </div>
                    <input type="date" name="from_date" value="{{ $from_date }}" class="d-none">
                    <input type="date" name="to_date" value="{{ $to_date }}" class="d-none">
                    <button type="submit" class="btn btn-primary mt-2 room-book-btn">Book This Room</button>
                </form>
            </div>
        </div>

    @endforeach
    @endif


</div>
@endsection
