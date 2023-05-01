<?php

namespace App\Models;

class JenisKelamin
{
    public $id, $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
