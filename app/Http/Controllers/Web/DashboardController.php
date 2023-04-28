<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "menu" => "Dashboard",
            "sub_menu" => null,
        ];
        return view('pages.dashboard', $data);
    }
}
