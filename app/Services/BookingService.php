<?php
namespace App\Services;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BookingService
{

    public function getAvailableTimes($interval, $booked_slots)
    {

        $morning = today()->format('Y-m-d') . " 6:00 AM";
        $afternoon = today()->format('Y-m-d') . " 3:00 PM";
        $period = new CarbonPeriod(new Carbon($morning), $interval. 'minutes', new Carbon($afternoon));
        $slots = [];
        $items = [];


        foreach($period as $item){
            array_push($items, $item->format("g:i A"));
        }

        foreach ($items as $item){
            if(!array_search($item, $booked_slots)){
                array_push($slots, $item);
            }
        }
        return $slots;
    }
}
