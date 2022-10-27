@extends('layouts.induk')

@section('isi-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah Dokumen</h1>

<form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data">
    @csrf
<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>Penerangan</label>
            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label>Fail</label>
            <input type="file" class="form-control-file" name="fail">
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
</form>

@endsection
