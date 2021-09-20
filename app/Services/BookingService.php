<?php

use Carbon\CarbonPeriod;

class BookingService
{

    public function getAvailableTimes($booked_slots)
    {

        $today = today()->format('Y-m-d') . " 6:00 AM";
        $tomorrow = today()->addDays('1')->format('Y-m-d') . " 3:00 PM";
        $period = new CarbonPeriod(new Carbon($today), '10 minutes', new Carbon($tomorrow));
        $slots = [];

        foreach ($period as $item) {

            array_push($slots, $item->format("h:i A"));
        }
    }




}
