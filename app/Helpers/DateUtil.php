<?php

namespace App\Helpers;

class DateUtil
{
    public function listMonth()
    {
        $months = array();

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            array_push($months, $month);
        }
    }
}
