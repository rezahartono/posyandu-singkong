<?php

namespace App\Helpers;

use Ramsey\Uuid\Uuid;

class CommonUtil
{
    public static function generateId()
    {
        return Uuid::uuid4();
    }
}
