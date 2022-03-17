<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DateTime;
use DateTimeZone;


class todolist extends Model
{
    //

    public function getDeadlineAttribute($value)
    {
        $date = new DateTime($value, new DateTimeZone(ini_get('date.timezone')));
        $date->setTimezone(new DateTimeZone(Session::get('sessionTz')));
        
        return $date->format('Y-m-d H:i:s');
    }
}
