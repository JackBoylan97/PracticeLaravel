<?php

namespace App\Http\Controllers;
use App\Booking;
Use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{

    public function list(User $user)
    {
        $bookings = $user->bookings;
        return view('booking.manage')->with('bookings', $bookings);

    }

    public function availability($date)
    {
        $bookings = Booking::whereDate('tee_time', '=', date($date))->get();
        $booked_slots = $bookings->tee_time;

        $available_times = BookingService::getAvailableTimes($booked_slots);



    }
    public function store(Request $request)
    {
        $booking = Booking::create([
            'email'=> Auth::user()->email,
            'phone'=>$request->phone,
            'persons'=>$request->persons,
            'course'=>$request->course,
            'tee_time'=>$request->tee_time,
            'user_id'=> Auth::user()->id
        ]);

        $message = "Booking created";
        return view('booking.create')->with('message',$message);


    }


    public function delete(Booking $booking)
    {
        $booking->delete();

        return redirect()->back();

    }
}
