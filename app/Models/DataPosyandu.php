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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_lahir' => 'datetime',
    ];

    public function kategoriDetail()
    {
        return $this->belongsTo(Kategori::class, "kategori", "id");
    }

    public function kecamatanDetail()
    {
        return $this->belongsTo(Kecamatan::class, "kecamatan", "id");
    }

    public function kelurahanDetail()
    {
        return $this->belongsTo(Kelurahan::class, "kelurahan", "id");
    }

    public function kotaDetail()
    {
        return $this->belongsTo(Kota::class, "kota", "id");
    }

    public function puskesmasDetail()
    {
        return $this->belongsTo(Puskesmas::class, "puskesmas", "id");
    }

    public function usiaDetail()
    {
        return $this->belongsTo(Usia::class, "usia", "id");
    }
}
