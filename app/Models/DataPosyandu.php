<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPosyandu extends Model
{
    use HasFactory;

    protected $table = 'data_posyandu';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor',
        'nama_posyandu',
        'alamat_posyandu',
        'kelurahan',
        'kecamatan',
        'kota',
        'puskesmas',
        'bulan',
        'tahun',
        'kategori',
        'nama_pasien',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_orangtua',
        'rt',
        'rw',
        'alamat_pasien',
        'berat_badan',
        'tinggi_badan',
        'kb',
        'lingkar_kepala',
        'lingkar_lengan',
        'fl_o',
        'fl_naik',
        'fl_turun',
        'fl_tetap',
        'fl_hijau',
        'fl_kuning',
        'fl_bgm',
        'fl_pus',
        'fl_wus',
        'fl_ibu_hamil',
        'fl_menyusui',
        'fl_lansia',
        'fl_lainnya',
        'lainnya',
        'kader',
        'kader_aktif',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class)->withDefault();
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class)->withDefault();
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class)->withDefault();
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class)->withDefault();
    }

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class)->withDefault();
    }

    public function usia()
    {
        return $this->belongsTo(Usia::class)->withDefault();
    }
}
