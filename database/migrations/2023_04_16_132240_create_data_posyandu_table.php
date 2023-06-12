<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_posyandu', function (Blueprint $table) {
            $table->string('id', 60);
            $table->string('nomor', 45)->unique();
            $table->string('nama_posyandu', 150);
            $table->text('alamat_posyandu')->nullable();
            $table->string('kelurahan', 60)->nullable();
            $table->string('kecamatan', 60)->nullable();
            $table->string('kota', 60)->nullable();
            $table->string('puskesmas', 60)->nullable();
            $table->string('bulan', 15)->nullable();
            $table->string('tahun', 15)->nullable();
            $table->string('kategori', 60)->nullable();
            $table->string('nama_pasien', 150)->nullable();
            $table->string('tempat_lahir', 150)->nullable();
            $table->timestamp('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('usia', 60)->nullable();
            $table->string('nama_orangtua', 150)->nullable();
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            // $table->text('alamat_pasien')->nullable();
            $table->string('berat_badan', 10)->nullable();
            $table->string('tinggi_badan', 10)->nullable();
            $table->string('kb', 150)->nullable();
            $table->string('lingkar_kepala', 10)->nullable();
            $table->string('lingkar_lengan', 10)->nullable();
            $table->string('fl_o', 1)->default("N");
            $table->string('fl_naik', 1)->default("N");
            $table->string('fl_turun', 1)->default("N");
            $table->string('fl_tetap', 1)->default("N");
            $table->string('fl_hijau', 1)->default("N");
            $table->string('fl_kuning', 1)->default("N");
            $table->string('fl_bgm', 1)->default("N");
            $table->string('fl_pus', 1)->default("N");
            $table->string('fl_wus', 1)->default("N");
            $table->string('fl_ibu_hamil', 1)->default("N");
            $table->string('fl_menyusui', 1)->default("N");
            $table->string('fl_lansia', 1)->default("N");
            $table->string('fl_lainnya', 1)->default("N");
            $table->string('lainnya', 150)->nullable();
            $table->string('kader', 10)->nullable();
            $table->string('kader_aktif', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_posyandu');
    }
};
