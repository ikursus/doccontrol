@extends('layouts.induk')

@section('isi-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Senarai Dokumen</h1>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>PENERANGAN</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <a href="{{ route('documents.create') }}" class="btn btn-primary">Tambah Dokumen</a>
    </div>
</div>

@endsection
