@extends('layouts.template')

@section('content')
    <section class="content">
        <form action="/setup/generate-number/create" method="POST">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="number">Format Nomor</label>
                        <div class="input-group mb-3">
                            <input type="text" name="number" class="form-control" id="number"
                                placeholder="Masukan Format Nomor" value="{{ old('number') }}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">-0001</span>
                            </div>
                        </div>

                        <small class="form-text text-muted">
                            <strong class="text-danger">*</strong>Gunakan tanda ( - ) sebagai pemisah
                        </small>
                        @error('number')
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="active" type="checkbox" value="{{ old('active') }}"
                            id="active">
                        <label class="form-check-label" for="active">
                            Aktif
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
                </div>
            </div>
        </form>
    </section>
@endsection
