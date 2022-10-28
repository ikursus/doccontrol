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
                    <th>USER</th>
                    <th>NAMA</th>
                    <th>PENERANGAN</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($senaraiDokumen as $dokumen)
                <tr>
                    <td>{{ $dokumen->id }}</td>
                    <td>{{ $dokumen->user_id }}</td>
                    <td>{{ $dokumen->name }}</td>
                    <td>{{ $dokumen->description }}</td>
                    <td>
                        <a href="{{ route('documents.edit', $dokumen->id) }}" class="btn btn-primary">
                            EDIT
                        </a>
                        <a href="{{ route('documents.show', $dokumen->id) }}" class="btn btn-success">
                            LIHAT
                        </a>
                        <a href="{{ route('documents.destroy', $dokumen->id) }}" class="btn btn-danger">
                            DELETE
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">TIADA REKOD</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <a href="{{ route('documents.create') }}" class="btn btn-primary">Tambah Dokumen</a>
    </div>
</div>

@endsection
