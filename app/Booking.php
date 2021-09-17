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
     'course',
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
}
