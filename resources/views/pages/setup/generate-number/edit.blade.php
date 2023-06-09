@extends('layouts.template')

@section('content')
    <section class="content">
        <form action="/setup/generate-number/edit/{{ $number->id }}" method="POST">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="number">Format Nomor</label>
                        <div class="input-group mb-3">
                            <input type="text" name="number" class="form-control" id="number"
                                placeholder="Masukan Format Nomor" value="{{ $number->number_format }}">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">-0001</span>
                            </div>
                        </div>

                        <small class="form-text text-muted">
                            <strong class="text-danger">*</strong>Gunakan tanda ( - ) sebagai pemisah contoh:
                            <strong>NUM-ABCD</strong>
                        </small>
                        @error('number')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" name="active" type="checkbox" value="{{ old('active') }}"
                            id="active" @if ($number->active == 'Y') checked @endif>
                        <label class="form-check-label" for="active">
                            Aktif
                        </label>
                    </div>
                </div>
                <div class="col-12 d-flex-gap">
                    <button type="button" class="btn btn-warning" onclick="goBack()"><i class="fas fa-arrow-left mr-2"></i>Back</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
                </div>
            </div>
        </form>
    </section>
@endsection
