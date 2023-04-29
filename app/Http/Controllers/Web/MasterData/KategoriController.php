<?php

namespace App\Http\Controllers\Web\MasterData;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Kategori",
            "menu" => "Master Data",
            "sub_menu" => "Kategori",
        ];
        return view('pages.master_data.category.show', $data);
    }

    public function create(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:150|unique:kategori,name',
                'description' => 'nullable',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $kategori = new Kategori();
            $kategori->id = CommonUtil::generateId();
            $kategori->name = $request->name;
            $kategori->description = $request->description;
            $kategori->created_at = DateUtil::now();
            $kategori->updated_at = DateUtil::now();
            $kategori->save();

            if ($kategori != null) {
                Alert::success("Success", "Kategori has been created");
                return redirect('/master-data/category')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Create Kategori",
                "menu" => "Master Data",
                "sub_menu" => "Kategori",
            ];
            return view('pages.master_data.category.create', $data);
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

            $kategori = Kategori::where('id', $id)->first();
            $kategori->name = $request->name;
            $kategori->description = $request->description;
            $kategori->updated_at = DateUtil::now();
            $kategori->update();

            if ($kategori != null) {
                Alert::success("Success", "Kategori has been updated");
                return redirect('/master-data/category')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Edit Kategori",
                "menu" => "Master Data",
                "sub_menu" => "Kategori",
                "kategori" => Kategori::where('id', $id)->first(),
            ];
            return view('pages.master_data.category.edit', $data);
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $kategori = Kategori::where('id', $id)->first();
            $isDeleted = $kategori->delete();

            if ($isDeleted) {
                Alert::success("Success!", "Kategori Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus kategori");
            }
            return back();
        }

        return back();
    }
}
