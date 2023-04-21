<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Users"
        ];
        return view('pages.users.show', $data);
    }

    public function delete($id)
    {
        if ($id != null) {
            $user = User::where('id', $id)->first();
            $isDeleted = $user->delete();

            if ($isDeleted) {
                Alert::success("Success!", "User Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus user");
            }
            return back();
        }

        return back();
    }
}
