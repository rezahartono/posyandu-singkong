@extends('layouts.template')

@section('content')
    <section class="content">
        <form action="/master-data/users/edit/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="photo-input mb-3">
                        <div class="photo-container">
                            @if ($user->photo_profile != null)
                                <img src="{{ $user->photo_profile }}" alt="photo" class="photo-preview" id="image_preview">
                            @else
                                <img src="{{ asset('/images/avatar-default.png') }}" alt="photo" class="photo-preview"
                                    id="image_preview">
                            @endif
                            <input type="file" name="photo_profile" name="photo_profile" id="photo_profile"
                                class="d-none" onchange="readURL(this)" value="{{ $user->photo_profile }}">
                            <button type="button"
                                class="bg-transparent text-primary border border-0 shadow shadow-none absolute bottom-0"
                                onclick="chooseFile()"><i class="fas fa-upload"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Masukan nama lengkap" value="{{ $user->name }}">
                        @error('name')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email"
                            value="{{ $user->email }}">
                        @error('email')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" name="birth_date" class="form-control" id="birth_date"
                            placeholder="Masukan Tanggal Lahir" value="{{ $user->tanggal_lahir->format('Y-m-d') }}">
                        @error('birth_date')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Masukan Username" value="{{ $user->username }}">
                        @error('username')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Masukan Kata Sandi" value="{{ old('password') }}">
                        @error('password')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telp</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                            placeholder="Masukan No. Telp" value="{{ $user->no_telp }}">
                        @error('phone')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="fl_admin" type="checkbox" value="{{ old('fl_admin') }}"
                            id="fl_admin" @if ($user->fl_admin == 'Y') checked @endif>
                        <label class="form-check-label" for="fl_admin">
                            Administrator
                        </label>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
                </div>
            </div>
        </form>
    </section>
@endsection

@section('scripts')
    <script>
        function chooseFile() {
            var fileInput = document.getElementById("photo_profile");
            fileInput.value = "";
            fileInput.click();

            if (fileInput.value != null || fileInput.value != "") {
                readURL()
            }
        }
    </script>
@endsection
