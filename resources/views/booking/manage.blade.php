@extends('layouts.welcome')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
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
            <td><form action="{{ route('booking.delete', ['booking' => $booking->id]) }}" method="post">
                    <input class="btn btn-default" type="submit" value="Delete" />
                    @method('delete')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
        </div>
    </div>
@endsection
