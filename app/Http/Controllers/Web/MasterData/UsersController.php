<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    public function create(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:150',
                'email' => 'required|email|unique:users,email',
                'birth_date' => 'required|date',
                'username' => 'required|unique:users,username',
                'password' => 'required|max:150',
                'phone' => 'required|numeric',
                // 'photo_profile' => 'image|max:3000|mimes:png,jpg,jpeg',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $user = new User();
            $user->id = CommonUtil::generateId();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tanggal_lahir = $request->birth_date;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            if ($request->fl_admin) {
                $user->fl_admin = "Y";
            }
            $user->no_telp = $request->phone;
            $user->created_at = DateUtil::now();
            $user->updated_at = DateUtil::now();
            $user->save();

            if ($user != null) {
                Alert::success("Success", "User has been created");
                return redirect('/master-data/users')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Create Users"
            ];
            return view('pages.users.create', $data);
        }
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
