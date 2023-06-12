<?php

namespace App\Helpers;

use App\Models\DataPosyandu;
use App\Models\GenerateNumber;
use Ramsey\Uuid\Uuid;

class CommonUtil
{
    public static function generateId()
    {
        return Uuid::uuid4();
    }

    public static function generateNumber()
    {
        $latest = DataPosyandu::latest()->first();
        $formatNumber = GenerateNumber::where("active", "Y")->first();
        if ($formatNumber == null) {
            return null;
        }
        $number = $formatNumber->number_format;
        if ($latest != null) {
            $arrNumber = explode("-", $latest->nomor);
            $last = end($arrNumber);
            $numString = str_replace('0', '', $last);
            $numInt = (int)$numString;

            if ($numInt < 10) {
                $number .= "-000" . strval($numInt + 1);
            } else
            if ($numInt >= 10) {
                $number .= "-00" . strval($numInt + 1);
            } else if ($numInt >= 100) {
                $number .= "-0" . strval($numInt + 1);
            } else {
                $number .=  "-" . strval($numInt + 1);
            }
        } else {
            $number .= "-0001";
        }

        return $number;
    }
}
