<div>
    <div class="row bg-white p-3 rounded rounded-5 shadow shadow-sm" style="max-height: 100%">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div class="input-group w-50">
                <div class="w-25">
                    <select class="form-control w-auto input-group-prepend rounded rounded-0" wire:model="filter"
                        id="filter">
                        <option value="name" selected>Nama</option>
                        <option value="description">Deskripsi</option>
                    </select>
                </div>
                <input type="search" wire:model="search" class="form-control border-right-0 rounded-left rounded-5"
                    placeholder="Cari..." aria-label="Cari..." aria-describedby="search-label">
                <span class="input-group-text border-left-0 bg-white rounded-right rounded-5" id="search-label">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <div class="ms-auto">
                <a href="usia/create" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Buat Usia</a>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered rounded rounded-5">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center" scope="col" width="10%">No</th>
                            <th class="text-center" scope="col">Usia</th>
                            <th class="text-center" scope="col">Deskripsi</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $idx = 1;
                        @endphp

                        @foreach ($usia as $u)
                            <tr>
                                <th class="text-center" scope="row">{{ $idx++ }}</th>
                                <td class="text-center">{{ $u->name }}</td>
                                <td class="text-center">{{ $u->description }}</td>
                                <td class="text-center">
                                    <a href="/master-data/usia/edit/{{ $u->id }}" class="btn btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="/master-data/usia/delete/{{ $u->id }}" class="btn btn-danger">
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
            {{ $usia->links() }}
        </div>
    </div>
</div>
