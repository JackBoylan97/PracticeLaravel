@extends('layouts.welcome')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Course</th>
            <th scope="col">Persons</th>
            <th scope="col">Tee Time</th>
            <th scope="col">Cancellation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{$booking->course}}</td>
            <td>{{$booking->persons}}</td>
            <td>{{$booking->tee_time}}</td>
            <td><a href="{{route('booking.delete')}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
