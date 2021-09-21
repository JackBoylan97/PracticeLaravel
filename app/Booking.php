<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
 protected $fillable = [
     'email',
     'phone',
     'persons',
     'tee_time',
     'course_id',
     'user_id'
 ];

 public function user()
 {
     return $this->belongsTo('App\User');
 }

 public function course()
 {
     return $this->belongsTo('App\Course','course');
 }

 //Convert timeslots to readable format
 public function getTeeTimeAttribute($value)
 {
     $date = date_create($value);

     return date_format($date, 'g:i A');

 }
//Convert booking to datetime format
 public  function  setTeeTimeAttribute($value)
 {
     $this->attributes['tee_time'] = date('Y-m-d H:i:s', strtotime("$value"));
 }

}
