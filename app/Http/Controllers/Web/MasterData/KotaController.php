<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KotaController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Kabupaten/Kota",
            "menu" => "Master Data",
            "sub_menu" => "Kota",
        ];
        return view('pages.master_data.kota.show', $data);
    }

    public function create(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:150|unique:kota,name',
                'description' => 'nullable',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $kota = new Kota();
            $kota->id = CommonUtil::generateId();
            $kota->name = $request->name;
            $kota->description = $request->description;
            $kota->created_at = DateUtil::now();
            $kota->updated_at = DateUtil::now();
            $kota->save();

            if ($kota != null) {
                Alert::success("Success", "Kota has been created");
                return redirect('/master-data/kota')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Create Kabupaten/Kota",
                "menu" => "Master Data",
                "sub_menu" => "Kota",
            ];
            return view('pages.master_data.kota.create', $data);
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

            $kota = Kota::where('id', $id)->first();
            $kota->name = $request->name;
            $kota->description = $request->description;
            $kota->updated_at = DateUtil::now();
            $kota->update();

            if ($kota != null) {
                Alert::success("Success", "Kota has been updated");
                return redirect('/master-data/kota')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Edit Kabupaten/Kota",
                "menu" => "Master Data",
                "sub_menu" => "Kota",
                "kota" => Kota::where('id', $id)->first(),
            ];
            return view('pages.master_data.kota.edit', $data);
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $kota = Kota::where('id', $id)->first();
            $isDeleted = $kota->delete();

            if ($isDeleted) {
                Alert::success("Success!", "Kabupaten/Kota Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus Kabupaten/Kota");
            }
            return back();
        }

        return back();
    }
}
