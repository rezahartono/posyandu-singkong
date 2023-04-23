<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateUtil
{
    public static function now()
    {
        return Carbon::now();
    }

    public static function listMonth()
    {
        $months = array();

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            array_push($months, $month);
        }
    }
}
