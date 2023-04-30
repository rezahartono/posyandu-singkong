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
                                <td class="text-center">{{ $datapos->kategori }}</td>
                                <td class="text-center">{{ $datapos->nama_pasien }}</td>
                                <td class="text-center">
                                    <a href="data-posyandu/edit/{{ $u->id }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="data-posyandu/delete/{{ $u->id }}" class="btn btn-danger">
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
</div>
