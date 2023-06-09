@extends('layouts.template')

@section('content')
    <section class="content">
        <form action="/data-posyandu/edit/{{ $datapos->id }}" method="POST">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-12 mb-3">
                    <span class="text-secondary h4">1. Detail Posyandu</span>
                </div>
                <div class="col-12">
                    <x-text-input label="Nama Posyandu" type="text" id="nama_posyandu" name="nama_posyandu"
                        placeholder="Nama Posyandu" value="{{ $datapos->nama_posyandu }}" />
                    <x-text-input label="RT / RW" type="text" id="rt_rw" name="rt_rw" placeholder="Lokasi RT / RW"
                        value="{{ $datapos->alamat_posyandu }}" />
                    <x-dropdown-input label="Puskesmas" id="puskesmas" name="puskesmas" placeholder="Pilih Puskesmas..."
                        :items="$form_data['puskesmas']" selected-item="{{ $datapos->puskesmas }}" />
                    <x-dropdown-input label="Kelurahan" id="kelurahan" name="kelurahan" placeholder="Pilih Kelurahan..."
                        :items="$form_data['kelurahan']" selected-item="{{ $datapos->kelurahan }}" />
                    <x-dropdown-input label="Kecamatan" id="kecamatan" name="kecamatan" placeholder="Pilih Kecamatan..."
                        :items="$form_data['kecamatan']" selected-item="{{ $datapos->kecamatan }}" />
                    <x-dropdown-input label="Kabupaten/Kota" id="kota" name="kota"
                        placeholder="Pilih Kabupaten/Kota..." :items="$form_data['kota']" selected-item="{{ $datapos->kota }}" />
                    <x-dropdown-input label="Bulan Kegiatan" id="bulan" name="bulan" placeholder="Pilih Bulan..."
                        :items="$form_data['bulan_kegiatan']" selected-item="{{ $datapos->bulan }}" />
                    <x-dropdown-input label="Tahun" id="tahun" name="tahun" placeholder="Pilih Tahun..."
                        :items="$form_data['tahun_kegiatan']" selected-item="{{ $datapos->tahun }}" />
                    <x-text-input label="Tanggal Dibuat" type="datetime-local" id="tanggal_dibuat" name="tanggal_dibuat"
                        placeholder="Tanggal Dibuat" value="{{ $datapos->created_at }}" :disable="true" />
                    <x-dropdown-input label="Kategori Posyandu" id="kategori" name="kategori"
                        placeholder="Pilih Kategori Posyandu..." :items="$form_data['kategori']"
                        selected-item="{{ $datapos->kategori }}" />
                    <x-text-input label="Nomor" type="text" id="nomor" name="nomor" placeholder="Nomor"
                        :disable="true" value="{{ $datapos->nomor }}" />
                    <x-text-input label="Nama Pasien" type="text" id="nama_pasien" name="nama_pasien"
                        placeholder="Nama Pasien" value="{{ $datapos->nama_pasien }}" />
                    <div class="row mb-3">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="h5">Tempat Tanggal Lahir</span>
                            <span class="h5">:</span>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ $datapos->tempat_lahir }}" placeholder="Tempat Lahir">
                        </div>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ $datapos->tanggal_lahir->format('Y-m-d') }}" onchange="getCountMonth(this)"
                                placeholder="Tanggal Lahir">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" id="count_bulan" name="count_bulan"
                                value="{{ old('count_bulan') }}" placeholder="0 Bulan" readonly>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <x-dropdown-input label="Jenis Kelamin" id="jenis_kelamin" name="jenis_kelamin"
                        placeholder="Pilih Jenis Kelamin..." :items="$form_data['jenis_kelamin']"
                        selected-item="{{ $datapos->jenis_kelamin }}" />
                    <x-dropdown-input label="Usia" id="usia" name="usia" placeholder="Pilih Usia..."
                        :items="$form_data['usia']" />
                    {{-- selected-item="{{ $datapos->usia }}" /> --}}
                    <x-text-input label="Nama Orangtua" type="text" id="nama_orangtua" name="nama_orangtua"
                        placeholder="Nama Orangtua" value="{{ $datapos->nama_orangtua }}" />
                    <div class="row mb-3">
                        <div class="col-3 d-flex justify-content-between align-items-center">
                            <span class="h5">Alamat</span>
                            <span class="h5">:</span>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <span class="col-sm-1 col-form-label h5">RT</span>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" id="rt_pasien" name="rt_pasien"
                                        value="{{ $datapos->rt }}" placeholder="RT">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <span class="col-sm-1 col-form-label h5">RW</span>
                                <div class="col-sm-11">
                                    <input type="text" class="form-control" id="rw_pasien" name="rw_pasien"
                                        value="{{ $datapos->rw }}" placeholder="RW">
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <x-text-input label="Berat Badan" type="text" id="berat_badan" name="berat_badan"
                        placeholder="Berat Badan" value="{{ $datapos->berat_badan }}" append-label="Kg" />
                    <x-text-input label="Tinggi Badan" type="number" id="tinggi_badan" name="tinggi_badan"
                        placeholder="Tinggi Badan" value="{{ $datapos->tinggi_badan }}" append-label="CM" />
                    <x-text-input label="KB" type="text" id="kb" name="kb" placeholder="KB"
                        value="{{ $datapos->kb }}" />
                    <x-text-input label="Lingkar Kepala" type="number" id="lingkar_kepala" name="lingkar_kepala"
                        placeholder="Lingkar Kepala" value="{{ $datapos->lingkar_kepala }}" append-label="CM" />
                    <x-text-input label="Lingkar Lengan" type="number" id="lingkar_lengan" name="lingkar_lengan"
                        placeholder="Lingkar Lengan" value="{{ $datapos->lingkar_lengan }}" append-label="CM" />
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_o" type="checkbox"
                                    value="{{ old('fl_o') }}" id="fl_o"
                                    @if ($datapos->fl_o == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_o">
                                    O
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_naik" type="checkbox"
                                    value="{{ old('fl_naik') }}" id="fl_naik"
                                    @if ($datapos->fl_naik == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_naik">
                                    Naik
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_turun" type="checkbox"
                                    value="{{ old('fl_turun') }}" id="fl_turun"
                                    @if ($datapos->fl_turun == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_turun">
                                    Turun
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_tetap" type="checkbox"
                                    value="{{ old('fl_tetap') }}" id="fl_tetap"
                                    @if ($datapos->fl_tetap == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_tetap">
                                    Tetap
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_hijau" type="checkbox"
                                    value="{{ old('fl_hijau') }}" id="fl_hijau"
                                    @if ($datapos->fl_hijau == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_hijau">
                                    Hijau
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_kuning" type="checkbox"
                                    value="{{ old('fl_kuning') }}" id="fl_kuning"
                                    @if ($datapos->fl_kuning == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_kuning">
                                    Kuning
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_bgm" type="checkbox"
                                    value="{{ old('fl_bgm') }}" id="fl_bgm"
                                    @if ($datapos->fl_bgm == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_bgm">
                                    Bawah Garis Merah (BGM)
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_pus" type="checkbox"
                                    value="{{ old('fl_pus') }}" id="fl_pus"
                                    @if ($datapos->fl_pus == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_pus">
                                    PUS
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_wus" type="checkbox"
                                    value="{{ old('fl_wus') }}" id="fl_wus"
                                    @if ($datapos->fl_wus == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_wus">
                                    WUS
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_ibu_hamil" type="checkbox"
                                    value="{{ old('fl_ibu_hamil') }}" id="fl_ibu_hamil"
                                    @if ($datapos->fl_ibu_hamil == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_ibu_hamil">
                                    Ibu Hamil
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_menyusui" type="checkbox"
                                    value="{{ old('fl_menyusui') }}" id="fl_menyusui"
                                    @if ($datapos->fl_menyusui == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_menyusui">
                                    Menyusui
                                </label>
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_lansia" type="checkbox"
                                    value="{{ old('fl_lansia') }}" id="fl_lansia"
                                    @if ($datapos->fl_lansia == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_lansia">
                                    Lansia
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" name="fl_lainnya" type="checkbox"
                                    value="{{ old('fl_lainnya') }}" id="fl_lainnya" onclick="showLainnya(this)"
                                    @if ($datapos->fl_lainya == 'Y') checked @endif>
                                <label class="form-check-label h5" for="fl_lainnya">
                                    Lainnya
                                </label>
                            </div>
                            <input type="text" class="form-control d-none" id="lainnya" name="lainnya"
                                value="{{ $datapos->lainnya }}" placeholder="Input Lainnya">
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <span class="text-secondary h4">2. Kader</span>
                </div>
                <div class="col-12">
                    <x-text-input label="Jumlah Kader" type="text" id="jumlah_kader" name="jumlah_kader"
                        placeholder="Jumlah Kader" value="{{ $datapos->kader }}" />
                    <x-text-input label="Jumlah Kader Aktif" type="text" id="jumlah_kader_aktif"
                        name="jumlah_kader_aktif" placeholder="Jumlah Kader Aktif"
                        value="{{ $datapos->kader_aktif }}" />
                </div>
                <div class="col-12 d-flex-gap">
                    <button type="button" class="btn btn-warning" onclick="goBack()"><i
                            class="fas fa-arrow-left mr-2"></i>Back</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
                </div>
            </div>
        </form>
    </section>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            var inputTanggalLahir = $("#tanggal_lahir")

            if (inputTanggalLahir.value == undefined) {
                var date = {!! json_encode($datapos->tanggal_lahir->format('Y-m-d')) !!}
                inputTanggalLahir.value = date;
            }

            getCountMonth(inputTanggalLahir)

            var cbLainya = $("#fl_lainnya")
            showLainnya(cbLainya)
        })


        function getCountMonth(date) {
            console.log(date.value);
            var countMonth = $("#count_bulan")
            var inputDate = new Date(date.value)
            var today = new Date()

            var startMonth = inputDate.getMonth();
            var endMonth = today.getMonth();
            var startYear = inputDate.getFullYear();
            var endYear = today.getFullYear();

            var months = [];

            for (var year = startYear; year <= endYear; year++) {
                var start = year == startYear ? startMonth : 0;
                var end = year == endYear ? endMonth : 11;

                for (var month = start; month <= end; month++) {
                    var monthName = new Date(year, month, 1).toLocaleString('default', {
                        month: 'long'
                    });
                    months.push(monthName + " " + year);
                }
            }

            if (startMonth == endMonth) {
                countMonth.val(0 + " Bulan")
            } else {
                countMonth.val((months.length - 1) + " Bulan")
            }
        }

        function showLainnya(cb) {
            var inputLainnya = $("#lainnya")
            if (cb.checked) {
                inputLainnya.removeClass("d-none")
            } else {
                inputLainnya.addClass("d-none")
            }
        }
    </script>
@endsection
