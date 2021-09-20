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

@endsection
