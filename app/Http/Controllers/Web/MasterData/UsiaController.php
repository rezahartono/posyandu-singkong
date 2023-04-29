<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\Usia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UsiaController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Usia",
            "menu" => "Master Data",
            "sub_menu" => "Usia",
        ];
        return view('pages.master_data.usia.show', $data);
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

            $usia = new Usia();
            $usia->id = CommonUtil::generateId();
            $usia->name = $request->name;
            $usia->description = $request->description;
            $usia->created_at = DateUtil::now();
            $usia->updated_at = DateUtil::now();
            $usia->save();

            if ($usia != null) {
                Alert::success("Success", "Usia has been created");
                return redirect('/master-data/usia')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Create Usia",
                "menu" => "Master Data",
                "sub_menu" => "Usia",
            ];
            return view('pages.master_data.usia.create', $data);
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

            $usia = Usia::where('id', $id)->first();
            $usia->name = $request->name;
            $usia->description = $request->description;
            $usia->updated_at = DateUtil::now();
            $usia->update();

            if ($usia != null) {
                Alert::success("Success", "Usia has been updated");
                return redirect('/master-data/usia')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Edit Usia",
                "menu" => "Master Data",
                "sub_menu" => "Usia",
                "usia" => Usia::where('id', $id)->first(),
            ];
            return view('pages.master_data.usia.edit', $data);
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $usia = Usia::where('id', $id)->first();
            $isDeleted = $usia->delete();

            if ($isDeleted) {
                Alert::success("Success!", "Usia Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus usia");
            }
            return back();
        }

        return back();
    }
}
