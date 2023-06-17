<?php

namespace App\Http\Controllers\Web\Module;

use App\Exports\DataPosyanduExport;
use App\Helpers\CommonUtil;
use App\Helpers\DateUtil;
use App\Http\Controllers\Controller;
use App\Models\DataPosyandu;
use App\Models\JenisKelamin;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use App\Models\Puskesmas;
use App\Models\Usia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
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
            // dd($request);
            $validator = Validator::make($request->all(), [
                'nama_posyandu' => 'required|max:150',
                // 'rt_rw' => 'nullable',
                // 'puskesmas' => 'required',
                // 'kelurahan' => 'required',
                // 'kecamatan' => 'required',
                // 'kota' => 'required',
                // 'bulan' => 'required',
                // 'tahun' => 'required',
                // 'tanggal_dibuat' => 'required|date',
                // 'kategori' => 'required',
                // 'nomor' => 'required',
                // 'nama_pasien' => 'required',
                // 'tempat_lahir' => 'required',
                // 'tanggal_lahir' => 'required|date',
                // 'jenis_kelamin' => 'required|max:1',
                // 'usia' => 'required',
                // 'nama_orangtua' => 'required',
                // 'rt_pasien' => 'required',
                // 'rw_pasien' => 'required',
                // 'berat_badan' => 'required',
                // 'tinggi_badan' => 'required',
                // 'kb' => 'required',
                // 'lingkar_kepala' => 'required',
                // 'lingkar_lengan' => 'required',
                // 'jumlah_kader' => 'required',
                // 'jumlah_kader_aktif' => 'required',
            ]);

            //if validation fails
            if ($validator->fails()) {
                // Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back()->withErrors($validator->errors());
            }

            $datapos = new DataPosyandu();
            $datapos->id = CommonUtil::generateId();
            // $datapos->nomor = $request->nomor;
            $datapos->nomor = CommonUtil::generateNumber();
            $datapos->nama_posyandu = $request->nama_posyandu;
            $datapos->alamat_posyandu = $request->rt_rw;
            $datapos->kelurahan = $request->kelurahan;
            $datapos->kecamatan = $request->kecamatan;
            $datapos->kota = $request->kota;
            $datapos->puskesmas = $request->puskesmas;
            $datapos->bulan = $request->bulan;
            $datapos->tahun = $request->tahun;
            $datapos->kategori = $request->kategori;
            $datapos->nama_pasien = $request->nama_pasien;
            $datapos->tempat_lahir = $request->tempat_lahir;
            $datapos->tanggal_lahir = $request->tanggal_lahir;
            $datapos->jenis_kelamin = $request->jenis_kelamin;
            $datapos->usia = $request->usia;
            $datapos->nama_orangtua = $request->nama_orangtua;
            $datapos->rt = $request->rt_pasien;
            $datapos->rw = $request->rw_pasien;
            $datapos->berat_badan = $request->berat_badan;
            $datapos->tinggi_badan = $request->tinggi_badan;
            $datapos->kb = $request->kb;
            $datapos->lingkar_kepala = $request->lingkar_kepala;
            $datapos->lingkar_lengan = $request->lingkar_lengan;
            // $datapos->alamat_pasien = "";
            $datapos->kader = $request->jumlah_kader;
            if ($request->has('fl_o')) {
                $datapos->fl_o = "Y";
            }
            if ($request->has('fl_naik')) {
                $datapos->fl_naik = "Y";
            }
            if ($request->has('fl_turun')) {
                $datapos->fl_turun = "Y";
            }
            if ($request->has('fl_tetap')) {
                $datapos->fl_tetap = "Y";
            }
            if ($request->has('fl_hijau')) {
                $datapos->fl_hijau = "Y";
            }
            if ($request->has('fl_kuning')) {
                $datapos->fl_kuning = "Y";
            }
            if ($request->has('fl_bgm')) {
                $datapos->fl_bgm = "Y";
            }
            if ($request->has('fl_pus')) {
                $datapos->fl_pus = "Y";
            }
            if ($request->has('fl_wus')) {
                $datapos->fl_wus = "Y";
            }
            if ($request->has('fl_ibu_hamil')) {
                $datapos->fl_ibu_hamil = "Y";
            }
            if ($request->has('fl_menyusui')) {
                $datapos->fl_menyusui = "Y";
            }
            if ($request->has('fl_lansia')) {
                $datapos->fl_lansia = "Y";
            }
            if ($request->has('fl_lainnya')) {
                $datapos->fl_lainnya = "Y";
                $datapos->lainnya = $request->lainnya;
            }
            $datapos->kader_aktif = $request->jumlah_kader_aktif;
            $datapos->created_at = $request->tanggal_dibuat;
            $datapos->updated_at = DateUtil::now();
            $datapos->save();

            if ($datapos != null) {
                Alert::success("Success", "Data Posyandu has been created");
                return redirect('data-posyandu')->withHeaders(['referer' => '']);
            }
        } else {
            $nomor = CommonUtil::generateNumber();
            if ($nomor == null) {
                Alert::error("Something went wrong!", "Please create generate number before create data posyandu!");
                return back();
            }
            $form_data = [
                "nomor" => $nomor,
                "jenis_kelamin" => [
                    new JenisKelamin("L", "Laki-Laki"),
                    new JenisKelamin("P", "Perempuan"),
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
                'nama_posyandu' => 'required|max:150',
                'rt_rw' => 'nullable',
                'puskesmas' => 'required',
                'kelurahan' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'bulan' => 'required',
                'tahun' => 'required',
                'kategori' => 'required',
                'nomor' => 'required',
                'nama_pasien' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|max:1',
                'usia' => 'required',
                'nama_orangtua' => 'required',
                'rt_pasien' => 'required',
                'rw_pasien' => 'required',
                'berat_badan' => 'required',
                'tinggi_badan' => 'required',
                'kb' => 'required',
                'lingkar_kepala' => 'required',
                'lingkar_lengan' => 'required',
                'jumlah_kader' => 'required',
                'jumlah_kader_aktif' => 'required',
            ]);
            //if validation fails
            if ($validator->fails()) {
                // Alert::error('Error Occured!', 'Silahkan Cek kembali permintaan anda');
                return back()->withErrors($validator->errors());
            }

            $datapos = DataPosyandu::where('id', $id)->first();
            $datapos->nomor = $request->nomor;
            $datapos->nama_posyandu = $request->nama_posyandu;
            $datapos->alamat_posyandu = $request->rt_rw;
            $datapos->kelurahan = $request->kelurahan;
            $datapos->kecamatan = $request->kecamatan;
            $datapos->kota = $request->kota;
            $datapos->puskesmas = $request->puskesmas;
            $datapos->bulan = $request->bulan;
            $datapos->tahun = $request->tahun;
            $datapos->kategori = $request->kategori;
            $datapos->nama_pasien = $request->nama_pasien;
            $datapos->tempat_lahir = $request->tempat_lahir;
            $datapos->tanggal_lahir = $request->tanggal_lahir;
            $datapos->jenis_kelamin = $request->jenis_kelamin;
            $datapos->usia = $request->usia;
            $datapos->nama_orangtua = $request->nama_orangtua;
            $datapos->rt = $request->rt_pasien;
            $datapos->rw = $request->rw_pasien;
            $datapos->berat_badan = $request->berat_badan;
            $datapos->tinggi_badan = $request->tinggi_badan;
            $datapos->kb = $request->kb;
            $datapos->lingkar_kepala = $request->lingkar_kepala;
            $datapos->lingkar_lengan = $request->lingkar_lengan;
            $datapos->kader = $request->jumlah_kader;
            if ($request->has('fl_o')) {
                $datapos->fl_o = "Y";
            }
            if ($request->has('fl_naik')) {
                $datapos->fl_naik = "Y";
            }
            if ($request->has('fl_turun')) {
                $datapos->fl_turun = "Y";
            }
            if ($request->has('fl_tetap')) {
                $datapos->fl_tetap = "Y";
            }
            if ($request->has('fl_hijau')) {
                $datapos->fl_hijau = "Y";
            }
            if ($request->has('fl_kuning')) {
                $datapos->fl_kuning = "Y";
            }
            if ($request->has('fl_bgm')) {
                $datapos->fl_bgm = "Y";
            }
            if ($request->has('fl_pus')) {
                $datapos->fl_pus = "Y";
            }
            if ($request->has('fl_wus')) {
                $datapos->fl_wus = "Y";
            }
            if ($request->has('fl_ibu_hamil')) {
                $datapos->fl_ibu_hamil = "Y";
            }
            if ($request->has('fl_menyusui')) {
                $datapos->fl_menyusui = "Y";
            }
            if ($request->has('fl_lansia')) {
                $datapos->fl_lansia = "Y";
            }
            if ($request->has('fl_lainnya')) {
                $datapos->fl_lainnya = "Y";
                $datapos->lainnya = $request->lainnya;
            }
            $datapos->alamat_pasien = "";
            $datapos->kader_aktif = $request->jumlah_kader_aktif;
            $datapos->updated_at = DateUtil::now();
            $datapos->update();

            if ($datapos != null) {
                Alert::success("Success", "Usia has been updated");
                return redirect('/master-data/usia')->withHeaders(['referer' => '']);
            }
        } else {
            $form_data = [
                "nomor" => CommonUtil::generateNumber(),
                "jenis_kelamin" => [
                    new JenisKelamin("L", "Laki-Laki"),
                    new JenisKelamin("P", "Perempuan"),
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
            $data = [
                "title" => "Edit Data",
                "menu" => "Data Posyandu",
                "sub_menu" => null,
                "datapos" => DataPosyandu::where('id', $id)->first(),
                "form_data" => $form_data,
            ];
            return view('pages.modules.data_posyandu.edit', $data);
        }
    }

    public function export($type, Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $date = DateUtil::now()->format("Ymd h-i-s");

        if ($type == "pdf") {
            return Excel::download(new DataPosyanduExport($type, $bulan, $tahun), 'data-posyandu-' . $date . '.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
        } else {
            return Excel::download(new DataPosyanduExport($type, $bulan, $tahun), 'data-posyandu-' . $date . '.xlsx');
        }

        return back();
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
