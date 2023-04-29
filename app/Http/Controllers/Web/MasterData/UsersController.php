<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Users",
            "menu" => "Master Data",
            "sub_menu" => "Users",
        ];
        return view('pages.master_data.users.show', $data);
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
                'photo_profile' => 'nullable|image|max:3000|mimes:png,jpg,jpeg',
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
            if ($request->hasFile('photo_profile')) {
                $file = $request->file('photo_profile');

                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $path = Storage::putFileAs('uploads', $file, $fileName . $extension,);
                $user->photo_profile = $path;
            }
            if ($request->has('fl_admin')) {
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
                "title" => "Create Users",
                "menu" => "Master Data",
                "sub_menu" => "Users",
            ];
            return view('pages.master_data.users.create', $data);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == "POST") {
            // dd($request);
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:150',
                'email' => 'required|email',
                'birth_date' => 'required|date',
                'username' => 'required',
                'password' => 'nullable|max:150',
                'phone' => 'required|numeric',
                'photo_profile' => 'nullable|image|max:3000|mimes:png,jpg,jpeg',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $user = User::where('id', $id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tanggal_lahir = $request->birth_date;
            $user->username = $request->username;
            if ($request->password != null && $request->password != "") {
                $user->password = Hash::make($request->password);
            }
            if ($request->hasFile('photo_profile')) {
                $file = $request->file('photo_profile');

                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $path = Storage::putFileAs('/uploads', $file, $fileName . '.' . $extension,);
                $user->photo_profile = $path;
            }
            if ($request->has('fl_admin')) {
                $user->fl_admin = "Y";
            }
            $user->no_telp = $request->phone;
            $user->updated_at = DateUtil::now();
            $user->update();

            if ($user != null) {
                Alert::success("Success", "User has been updated");
                return redirect('/master-data/users')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Edit Users",
                "menu" => "Master Data",
                "sub_menu" => "Users",
                "user" => User::where('id', $id)->first(),
            ];
            return view('pages.master_data.users.edit', $data);
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
