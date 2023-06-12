<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Kecamatan",
            "menu" => "Master Data",
            "sub_menu" => "Kecamatan",
        ];
        return view('pages.master_data.kecamatan.show', $data);
    }

    public function create(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:150|unique:kecamatan,name',
                'description' => 'nullable',
            ]);

            //if validation fails
            if ($validator->fails()) {
                // Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back()->withErrors($validator->errors());
            }

            $kecamatan = new Kecamatan();
            $kecamatan->id = CommonUtil::generateId();
            $kecamatan->name = $request->name;
            $kecamatan->description = $request->description;
            $kecamatan->created_at = DateUtil::now();
            $kecamatan->updated_at = DateUtil::now();
            $kecamatan->save();

            if ($kecamatan != null) {
                Alert::success("Success", "Kecamatan has been created");
                return redirect('/master-data/kecamatan')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Create Kecamatan",
                "menu" => "Master Data",
                "sub_menu" => "Kecamatan",
            ];
            return view('pages.master_data.kecamatan.create', $data);
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
                // Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back()->withErrors($validator->errors());
            }

            $kecamatan = Kecamatan::where('id', $id)->first();
            $kecamatan->name = $request->name;
            $kecamatan->description = $request->description;
            $kecamatan->updated_at = DateUtil::now();
            $kecamatan->update();

            if ($kecamatan != null) {
                Alert::success("Success", "Kecamatan has been updated");
                return redirect('/master-data/kecamatan')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Edit Kecamatan",
                "menu" => "Master Data",
                "sub_menu" => "Kecamatan",
                "kecamatan" => Kecamatan::where('id', $id)->first(),
            ];
            return view('pages.master_data.kecamatan.edit', $data);
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $kecamatan = Kecamatan::where('id', $id)->first();
            $isDeleted = $kecamatan->delete();

            if ($isDeleted) {
                Alert::success("Success!", "Kecamatan Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus kecamatan");
            }
            return back();
        }

        return back();
    }
}
