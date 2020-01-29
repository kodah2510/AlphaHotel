@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-8 reservation-content">
            <div class="row">
                <h4>Request Number: {{ $current_request->id }}</h4>
            </div>
            <div class="row">
                <p>Status: 
                    @if (!$current_request->is_processed)
                        Pending
                    @else
                        Done
                    @endif
                </p>
            </div>
            <div class="row">
                <h5>Client: {{ $current_request->name }}</h5>
            </div>
            <div class="row">
                <div class="col-md-6">Email: {{ $current_request->email }}</div>
                <div class="col-md-6">Phone: {{ $current_request->phone }} </div>
            </div>
            <div class="row">
                <h5>Room Information</h5>
            </div>
            <div class="row">
                <div class="col-md-6">Number of guests: {{ $current_request->guest_count }}</div>
                <div class="col-md-6">Room type: {{ $current_request->room_type }}</div>
            </div>
            <div class="row">
                <h5>Date</h5>
            </div>
            <div class="row">
                <div class="col-md-6">Arrive on: {{ $current_request->from_date }}</div>
                <div class="col-md-6">Leave on: {{ $current_request->to_date }} </div>
            </div>
       </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 50px">
        <form action="" style="width: 80%;">
            @csrf
            <div class="form-row form-group">
                <div class="col">
                    <input class="form-control" type="text" name="name" value="{{ $current_request->name }}" disabled>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="email" value="{{ $current_request->email }}" disabled>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <input class="form-control" type="text" name="phone" value="{{ $current_request->phone }}" disabled>
                </div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <input class="form-control" type="number" min="0" name="guest_count" value="{{ $current_request->guest_count }}" disabled>
                </div>
                <div class="col">
                    <input class="form-control" type="text" name="room_type" value="{{ $current_request->room_type }}" disabled></div>
            </div>
            <div class="form-row form-group">
                <div class="col">
                    <button id="allocate-room" type="button" class="btn btn-primary btn-sm w-100">Allocate</button>
                </div>
               
            </div>
            <table class="table room-list">
                <thead>
                    <tr>
                        <th>Room Id</th>
                        <th>Room Number</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->number }}</td>
                        <td>{{ $r->type }}</td>
                        <td><input type="checkbox" name="room_id" value="{{ $r->id }}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        <script type="text/javascript">
            $(function() {
                $('#allocate-room').on('click', function() {
                    var roomIndex = [];
                    $('input[type=checkbox]:checked').each(function(i, e) {
                        roomIndex.push(parseInt(e.value));
                    });

                    if (roomIndex.length == 0) {
                        alert("Please select a room before continue");
                    }
                    var reservationRequestId = {{ $current_request->id }}; 
                    $.ajax({
                        type: 'POST',
                        url: '/finish_reservation',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id' : reservationRequestId,
                            'room_index' : roomIndex
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            alert("reservation saved!"); 
                        },

                        error: function(e) {
                            alert(e.error);
                        } 
                    });
                });
            });
       </script>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <h3>Available Room Lists</h3>
    </div>
    <table class="table table-hover room-list">
        <thead>
            <tr>
                <th>Room Id</th>
                <th>Room Number</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>R001</td>
                <td>single</td>
            </tr>
            <tr>
                <td>2</td>
                <td>R002</td>
                <td>single</td>
            </tr>
            <tr>
                <td>3</td>
                <td>R003</td>
                <td>single</td>
            </tr>
            <tr>
                <td>4</td>
                <td>R004</td>
                <td>single</td>
            </tr>
            <tr>
                <td>5</td>
                <td>R005</td>
                <td>single</td>
            </tr>
            <tr>
                <td>6</td>
                <td>R006</td>
                <td>single</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
