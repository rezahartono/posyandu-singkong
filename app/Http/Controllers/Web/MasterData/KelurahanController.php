<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KelurahanController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "title" => "Show Kelurahan",
            "menu" => "Master Data",
            "sub_menu" => "Kelurahan",
        ];
        return view('pages.master_data.kelurahan.show', $data);
    }

    public function create(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:150|unique:kelurahan,name',
                'description' => 'nullable',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $kelurahan = new Kelurahan();
            $kelurahan->id = CommonUtil::generateId();
            $kelurahan->name = $request->name;
            $kelurahan->description = $request->description;
            $kelurahan->created_at = DateUtil::now();
            $kelurahan->updated_at = DateUtil::now();
            $kelurahan->save();

            if ($kelurahan != null) {
                Alert::success("Success", "Kelurahan has been created");
                return redirect('/master-data/kelurahan')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Create Kelurahan",
                "menu" => "Master Data",
                "sub_menu" => "Kelurahan",
            ];
            return view('pages.master_data.kelurahan.create', $data);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == "POST") {
            // dd($request);
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:150',
                'description' => 'nullable',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $kelurahan = Kelurahan::where('id', $id)->first();
            $kelurahan->name = $request->name;
            $kelurahan->description = $request->description;
            $kelurahan->updated_at = DateUtil::now();
            $kelurahan->update();

            if ($kelurahan != null) {
                Alert::success("Success", "Kelurahan has been updated");
                return redirect('/master-data/kelurahan')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Edit Kelurahan",
                "menu" => "Master Data",
                "sub_menu" => "Kelurahan",
                "kelurahan" => Kelurahan::where('id', $id)->first(),
            ];
            return view('pages.master_data.kelurahan.edit', $data);
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $kelurahan = Kelurahan::where('id', $id)->first();
            $isDeleted = $kelurahan->delete();

            if ($isDeleted) {
                Alert::success("Success!", "Kelurahan Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus kelurahan");
            }
            return back();
        }

        return back();
    }
}
