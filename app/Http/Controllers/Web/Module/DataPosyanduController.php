<?php

namespace App\Http\Controllers\Web\Module;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\DataPosyandu;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Puskesmas;
use App\Models\Usia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DataPosyanduController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Data Posyandu",
            "menu" => "Data Posyandu",
            "sub_menu" => null,
        ];
        return view('pages.modules.data_posyandu.show', $data);
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

            $datapos = new DataPosyandu();
            $datapos->id = CommonUtil::generateId();
            $datapos->created_at = DateUtil::now();
            $datapos->updated_at = DateUtil::now();
            $datapos->save();

            if ($datapos != null) {
                Alert::success("Success", "Data Posyandu has been created");
                return redirect('/data-posyandu')->withHeaders(['referer' => '']);
            }
        } else {
            $form_data = [
                "nomor" => CommonUtil::generateNumber(),
                "jenis_kelamin" => [
                    "Laki-Laki",
                    "Perempuan",
                ],
                "puskesmas" => Puskesmas::all(),
                "kelurahan" => Kelurahan::all(),
                "kecamatan" => Kecamatan::all(),
                "kota" => Kota::all(),
                "kategori" => Kategori::all(),
                "usia" => Usia::all(),
                "bulan_kegiatan" => DateUtil::listMonth(),
                "tahun_kegiatan" => DateUtil::listYear(date('Y', strtotime('-5 year')), date('Y', strtotime('+5 year'))),
            ];
            // dd($form_data["kelurahan"]);
            $data = [
                "title" => "Create Data",
                "menu" => "Data Posyandu",
                "sub_menu" => null,
                "form_data" => $form_data,
            ];
            return view('pages.modules.data_posyandu.create', $data);
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

            $usia = DataPosyandu::where('id', $id)->first();
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
                "datapos" => DataPosyandu::where('id', $id)->first(),
            ];
            return view('pages.master_data.category.edit', $data);
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $datapos = DataPosyandu::where('id', $id)->first();
            $isDeleted = $datapos->delete();

            if ($isDeleted) {
                Alert::success("Success!", "Data Posyandu Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus data posyandu");
            }
            return back();
        }

        return back();
    }
}
