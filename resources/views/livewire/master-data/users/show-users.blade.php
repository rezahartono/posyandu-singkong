<div>
    <div class="row bg-white p-3 rounded rounded-5 shadow shadow-sm" style="max-height: 100%">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div class="input-group w-50">
                <div class="w-25">
                    <select class="form-control w-auto input-group-prepend rounded rounded-0" wire:model="filter"
                        id="filter">
                        <option value="name" selected>Nama Lengkap</option>
                        <option value="email">Email</option>
                    </select>
                </div>
                <input type="search" wire:model="search" class="form-control border-right-0 rounded-left rounded-5"
                    placeholder="Cari..." aria-label="Cari..." aria-describedby="search-label">
                <span class="input-group-text border-left-0 bg-white rounded-right rounded-5" id="search-label">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <div class="ms-auto">
                <a href="users/create" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Buat User</a>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="table-responsive">
                <table class="table table-bordered rounded rounded-5">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center" scope="col" width="10%">No</th>
                            <th class="text-center" scope="col">Nama Lengkap</th>
                            <th class="text-center" scope="col">Tanggal Lahir</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $idx = 1;
                        @endphp

                        @foreach ($users as $user)
                            <tr>
                                <th class="text-center" scope="row">{{ $idx++ }}</th>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->tanggal_lahir }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#ReadMessage{{ $message->id }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button> --}}

                                    <a href="/master-data/users/delete/{{ $user->id }}" class="btn btn-danger">
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
            {{ $users->links() }}
        </div>
    </div>
</div>
