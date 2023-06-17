<div>
    <div class="row bg-white p-3 rounded rounded-5 shadow shadow-sm" style="max-height: 100%">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div class="input-group w-50">
                <div class="mr-3">
                    <select class="form-control w-auto input-group-prepend rounded rounded-0" wire:model="filter"
                        id="filter">
                        <option value="nomor" selected>Nomor</option>
                        <option value="nama_posyandu">Nama Posyandu</option>
                        <option value="kategori">Kategori Posyandu</option>
                        <option value="nama_pasien">Nama Pasien</option>
                    </select>
                </div>
                <input type="search" wire:model="search" class="form-control border-right-0 rounded-left rounded-5"
                    placeholder="Cari..." aria-label="Cari..." aria-describedby="search-label">
                <span class="input-group-text border-left-0 bg-white rounded-right rounded-5" id="search-label">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-secondary mr-2" data-toggle="modal" data-target="#download_modal">
                    <i class="fas fa-file-download mr-2"></i> Download Report
                </button>

                <a href="data-posyandu/create" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Buat Data</a>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered rounded rounded-5">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center" scope="col">Nomor</th>
                            <th class="text-center" scope="col">Nama Posyandu</th>
                            <th class="text-center" scope="col">Kategori</th>
                            <th class="text-center" scope="col">Nama Pasien</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_posyandu as $datapos)
                            <tr>
                                <th class="text-center" scope="row">{{ $datapos->nomor }}</th>
                                <td class="text-center">{{ $datapos->nama_posyandu }}</td>
                                <td class="text-center">
                                    {{ $datapos->kategoriDetail != null ? $datapos->kategoriDetail->name : '' }}</td>
                                <td class="text-center">{{ $datapos->nama_pasien }}</td>
                                <td class="text-center">
                                    <a href="data-posyandu/edit/{{ $datapos->id }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="data-posyandu/delete/{{ $datapos->id }}" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 mt-3 d-flex justify-content-end align-items-center">
            {{ $data_posyandu->links() }}
        </div>
    </div>

    <!-- Download Modal -->
    <div class="modal fade" id="download_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="download_modal_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="download_modal_label">Download Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <span>Download Filter:</span>
                        </div>
                        <div class="col-6 mt-3">
                            <select class="form-control mb-3" id="filter_bulan">
                                <option disabled selected>Pilih Bulan</option>
                                @foreach ($download_data['bulan_kegiatan'] as $item => $it)
                                    @if (is_string($it))
                                        <option value="{{ $it }}">
                                            {{ $it }}
                                        </option>
                                    @else
                                        <option value="{{ $it->id }}">
                                            {{ $it->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mt-3">
                            <select class="form-control" id="filter_tahun">
                                <option disabled selected>Pilih Tahun</option>
                                @foreach ($download_data['tahun_kegiatan'] as $item => $it)
                                    @if (is_string($it))
                                        <option value="{{ $it }}">
                                            {{ $it }}
                                        </option>
                                    @else
                                        <option value="{{ $it->id }}">
                                            {{ $it->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="data-posyandu/export/pdf" id="download_pdf" onclick="closeModal('download_modal')"
                        class="btn btn-warning mr-2"><i class="fas fa-print mr-2"></i>Report
                        PDF</a>
                    <a href="data-posyandu/export/excel" id="download_excel" onclick="closeModal('download_modal')"
                        class="btn btn-success mr-2"><i class="fas fa-print mr-2"></i>Report
                        Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('ext-scripts')
    <script>
        var pdfUri = "data-posyandu/export/pdf"
        var excelUri = "data-posyandu/export/excel"

        var year = null
        var month = null

        $('#filter_tahun').on('change', function(event) {
            year = $(event.target).val()
            changeUrl()
        })
        $('#filter_bulan').on('change', function(event) {
            month = $(event.target).val()
            changeUrl()
        })

        function changeUrl() {
            var newPdfUri = pdfUri;
            var newExcelUri = excelUri;

            if (month != null) {
                newPdfUri += getSparator(newPdfUri) + "bulan=" + month
                newExcelUri += getSparator(newExcelUri) + "bulan=" + month
            }

            if (year != null) {
                newPdfUri += getSparator(newPdfUri) + "tahun=" + year
                newExcelUri += getSparator(newExcelUri) + "tahun=" + year
            }

            console.log(newPdfUri)
            console.log(newExcelUri)

            $('#download_pdf').attr('href', newPdfUri)
            $('#download_excel').attr('href', newExcelUri)
        }

        function getSparator(pathUri) {
            if (pathUri.includes('?')) {
                return '&'
            }

            return '?'
        }
    </script>
@endpush
