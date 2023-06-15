<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Print</title>
    <style>
        th {
            text-transform: capitalize;
            padding: 8px 15px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Posyandu</th>
                <th>Alamat Posyandu</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kota</th>
                <th>Puskesmas</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Nama Pasien</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
                <th>Nama Orangtua</th>
                <th>RT</th>
                <th>RW</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
                <th>KB</th>
                <th>Lingkar Kepala</th>
                <th>Lingkar Lengan</th>
                <th>O</th>
                <th>Naik</th>
                <th>Turun</th>
                <th>Tetap</th>
                <th>Hijau</th>
                <th>Kuning</th>
                <th>BGM</th>
                <th>PUS</th>
                <th>WUS</th>
                <th>Ibu Hamil</th>
                <th>Menyusui</th>
                <th>Lansia</th>
                <th>Lainya</th>
                <th>Kader</th>
                <th>Kader Aktif</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($datas) --}}
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->nomor }}</td>
                    <td>{{ $data->nama_posyandu }}</td>
                    <td>{{ $data->alamat_posyandu }}</td>
                    <td>{{ $data->kelurahanDetail != null ? $data->kelurahanDetail->name : '' }}</td>
                    <td>{{ $data->kecamatanDetail != null ? $data->kecamatanDetail->name : '' }}</td>
                    <td>{{ $data->kotaDetail != null ? $data->kotaDetail->name : '' }}</td>
                    <td>{{ $data->puskesmasDetail != null ? $data->puskesmasDetail->name : '' }}</td>
                    <td>{{ $data->bulan }}</td>
                    <td>{{ $data->tahun }}</td>
                    <td>{{ $data->kategoriDetail != null ? $data->kategoriDetail->name : '' }}</td>
                    <td>{{ $data->nama_pasien }}</td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->usiaDetail != null ? $data->usiaDetail->name : '' }}</td>
                    <td>{{ $data->nama_orangtua }}</td>
                    <td>{{ $data->rt }}</td>
                    <td>{{ $data->rw }}</td>
                    <td>{{ $data->berat_badan }}</td>
                    <td>{{ $data->tinggi_badan }}</td>
                    <td>{{ $data->kb }}</td>
                    <td>{{ $data->lingkar_kepala }}</td>
                    <td>{{ $data->lingkar_lengan }}</td>
                    <td>{{ $data->fl_o }}</td>
                    <td>{{ $data->fl_naik }}</td>
                    <td>{{ $data->fl_turun }}</td>
                    <td>{{ $data->fl_tetap }}</td>
                    <td>{{ $data->fl_hijau }}</td>
                    <td>{{ $data->fl_kuning }}</td>
                    <td>{{ $data->fl_bgm }}</td>
                    <td>{{ $data->fl_pus }}</td>
                    <td>{{ $data->fl_wus }}</td>
                    <td>{{ $data->fl_ibu_hamil }}</td>
                    <td>{{ $data->fl_menyusui }}</td>
                    <td>{{ $data->fl_lansia }}</td>
                    <td>{{ $data->lainnya }}</td>
                    <td>{{ $data->kader }}</td>
                    <td>{{ $data->kader_aktif }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
