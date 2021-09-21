<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Services\BookingService;
Use App\User;
Use App\Course;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{

    public function list(User $user)
    {
        $bookings = $user->bookings;
        return view('booking.manage')->with('bookings', $bookings);

    }

    public function availability(Course $course, $date)
    {
        $booked_slots = $course->bookings()->whereDate('tee_time',date($date))->get()->pluck('tee_time');

        $booked_slots = $booked_slots->toArray();

        $interval = $course->tee_time_interval;
        $available_times = (new \App\Services\BookingService)->getAvailableTimes($interval, $booked_slots);

        return $available_times;


    }
    public function store(Request $request)
    {
        $booking = Booking::create([
            'email'=> $request->email,
            'phone'=>$request->phone,
            'persons'=>$request->persons,
            'course_id'=>$request->course,
            'tee_time'=>$request->tee_date . $request->tee_time ,
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
