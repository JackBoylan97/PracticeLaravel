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
        return view('booking.manage')->with('bookings',$bookings);

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

    public function delete(User $user, $id)
    {

        $booking = $user->bookings->find($id);

        $booking->delete();
        //put a return statement for informing the user that it has been deleted
    }
}
