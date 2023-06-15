@extends('layouts.template')

@section('content')
    <section class="content">
        <form action="/master-data/category/edit/{{ $kategori->id }}" method="POST">
            @method('POST')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama"
                            value="{{ $kategori->name }}">
                        @error('name')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $kategori->description }}</textarea>
                        @error('description')
                            <div class="alert-danger rounded rounded-3 mt-2">
                                <ul>
                                    <li class="text-red-600">{{ $message }}</li>
                                </ul>
                            </div>
                        @enderror
                    </div>
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
