@extends('layouts.template')

@section('content')
    <section class="content">
        <form action="/master-data/users/create" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="photo-input mb-3">
                        <div class="photo-container">
                            <img src="{{ asset('/images/avatar-default.png') }}" alt="photo" class="photo-preview"
                                id="image_preview">
                            <input type="file" name="photo_profile" name="photo_profile" id="photo_profile"
                                class="d-none" onchange="readURL(this)" value="{{ old('photo_profile') }}">
                            <button type="button"
                                class="bg-transparent text-primary border border-0 shadow shadow-none absolute bottom-0"
                                onclick="chooseFile()"><i class="fas fa-upload"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Masukan nama lengkap" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Tanggal Lahir</label>
                        <input type="date" name="birth_date" class="form-control" id="birth_date"
                            placeholder="Masukan Tanggal Lahir" value="{{ old('birth_date') }}">
                        @error('birth_date')
                            <div class="alert alert-danger mt-2">
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
                            placeholder="Masukan Username" value="{{ old('username') }}">
                        @error('username')
                            <div class="alert alert-danger mt-2">
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
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telp</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                            placeholder="Masukan No. Telp" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="fl_admin" type="checkbox" value="{{ old('fl_admin') }}"
                            id="fl_admin">
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
