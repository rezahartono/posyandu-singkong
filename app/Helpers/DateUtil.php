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

        $bulan = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );

        for ($i = 1; $i <= 12; $i++) {
            $month = $bulan[date('n', mktime(0, 0, 0, $i, 1))];
            array_push($months, $month);
        }

        return $months;
    }

    public static function listYear($start = null, $end = null)
    {
        $years = array();
        if ($start != null && $end != null) {
            for ($year = $start; $year <= $end; $year++) {
                $years[] = strval($year);
            }
        } else {
            for ($year = 1980; $year <= 2050; $year++) {
                $years[] = strval($year);
            }
        }
        return $years;
    }
}
