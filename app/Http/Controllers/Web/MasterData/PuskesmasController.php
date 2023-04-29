<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PuskesmasController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Puskesmas",
            "menu" => "Master Data",
            "sub_menu" => "Puskesmas",
        ];
        return view('pages.master_data.puskesmas.show', $data);
    }

    public function create(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:150|unique:puskesmas,name',
                'description' => 'nullable',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $puskesmas = new Puskesmas();
            $puskesmas->id = CommonUtil::generateId();
            $puskesmas->name = $request->name;
            $puskesmas->description = $request->description;
            $puskesmas->created_at = DateUtil::now();
            $puskesmas->updated_at = DateUtil::now();
            $puskesmas->save();

            if ($puskesmas != null) {
                Alert::success("Success", "Puskesmas has been created");
                return redirect('/master-data/puskesmas')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Create Puskesmas",
                "menu" => "Master Data",
                "sub_menu" => "Puskesmas",
            ];
            return view('pages.master_data.puskesmas.create', $data);
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

            $puskesmas = Puskesmas::where('id', $id)->first();
            $puskesmas->name = $request->name;
            $puskesmas->description = $request->description;
            $puskesmas->updated_at = DateUtil::now();
            $puskesmas->update();

            if ($puskesmas != null) {
                Alert::success("Success", "Puskesmas has been updated");
                return redirect('/master-data/puskesmas')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Edit Puskesmas",
                "menu" => "Master Data",
                "sub_menu" => "Puskesmas",
                "puskesmas" => Puskesmas::where('id', $id)->first(),
            ];
            return view('pages.master_data.puskesmas.edit', $data);
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $puskesmas = Puskesmas::where('id', $id)->first();
            $isDeleted = $puskesmas->delete();

            if ($isDeleted) {
                Alert::success("Success!", "Puskesmas Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus puskesmas");
            }
            return back();
        }

        return back();
    }
}
