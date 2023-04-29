<?php

namespace App\Http\Controllers\Web\Setup;

use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\GenerateNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GenerateNumberController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Show Generate Number",
            "menu" => "Setup",
            "sub_menu" => "Generate Number",
        ];
        return view('pages.setup.generate-number.show', $data);
    }

    public function create(Request $request)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), [
                'number' => 'required|max:150|unique:generate_number,number_format',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $number = new GenerateNumber();
            $number->id = CommonUtil::generateId();
            $number->number_format = $request->number + "-";
            if ($request->has('active')) {
                $updatedNumber = GenerateNumber::where('active', 'Y')->first();

                if ($updatedNumber != null) {
                    $updatedNumber->active = "N";
                    $updatedNumber->update();
                }
                $number->active = "Y";
            }
            $number->created_at = DateUtil::now();
            $number->updated_at = DateUtil::now();
            $number->save();

            if ($number != null) {
                Alert::success("Success", "Nomor has been created");
                return redirect('/setup/generate-number')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Generate Number",
                "menu" => "Setup",
                "sub_menu" => "Generate Number",
            ];
            return view('pages.setup.generate-number.create', $data);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->method() == "POST") {
            $validator = Validator::make($request->all(), [
                'number' => 'required|max:150',
            ]);

            //if validation fails
            if ($validator->fails()) {
                Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back();
            }

            $number = GenerateNumber::where('id', $id)->first();
            $number->number_format = $request->number + "-";
            if ($request->has('active')) {
                $updatedNumber = GenerateNumber::where('active', 'Y')->first();

                if ($updatedNumber != null) {
                    $updatedNumber->active = "N";
                    $updatedNumber->update();
                }
                $number->active = "Y";
            }
            $number->updated_at = DateUtil::now();
            $number->update();

            if ($number != null) {
                Alert::success("Success", "Nomor has been updated");
                return redirect('/setup/generate-number')->withHeaders(['referer' => '']);
            }
        } else {
            $data = [
                "title" => "Edit Number",
                "menu" => "Setup",
                "sub_menu" => "Edit Number",
                "number" => GenerateNumber::where('id', $id)->first(),
            ];
            return view('pages.setup.generate-number.edit', $data);
        }
    }

    public function delete($id)
    {
        if ($id != null) {
            $number = GenerateNumber::where('id', $id)->first();
            $isDeleted = $number->delete();

            if ($isDeleted) {
                Alert::success("Success!", "Nomor Telah berhasil dihapus");
            } else {
                Alert::error("Terjadi Kesalahan!", "Gagal menghapus nomor");
            }
            return back();
        }

        return back();
    }
}
