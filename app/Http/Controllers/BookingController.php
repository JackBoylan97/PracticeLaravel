<?php

namespace App\Http\Controllers;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    public function getBookings()
    {
        $email = Auth::user()->email;
        $bookings = Booking::where('email','=',$email)->get();

        return view('booking.bookings')->with('bookings',$bookings);
    }

    public function postBooking(Request $request)
    {
        $booking = Booking::create([
            'email'=> Auth::user()->email,
            'phone'=>$request->phone,
            'persons'=>$request->persons,
            'tee_time'=>$request->tee_time,
        ]);
    }

    public function deleteBooking($id)
    {
        $booking = Booking::where('id','=',$id);
        $booking->delete();

        //put a return statement for informing the user that it has been deleted
    }
}
