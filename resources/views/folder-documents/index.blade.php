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
                    <th>FAIL</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($senaraiDokumen as $dokumen)
                <tr>
                    <td>{{ $dokumen->id }}</td>
                    <td>{{ $dokumen->user->name ?? 'TIADA NAMA' }}</td>
                    <td>{{ $dokumen->name }}</td>
                    <td>{{ $dokumen->description }}</td>
                    <td>
                        @if (!is_null($dokumen->fail))
                        <a href="{{ asset('uploaded') }}/{{ $dokumen->fail }}" target="_blank" class="btn btn-info">LIHAT FAIL</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('documents.edit', $dokumen->id) }}" class="btn btn-primary">
                            EDIT
                        </a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $dokumen->id }}">
                            DELETE
                        </button>

                        <form action="{{ route('documents.destroy', $dokumen->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <!-- Modal -->
                            <div class="modal fade" id="modal-delete-{{ $dokumen->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pengesahan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Adakah anda ingin menghapuskan rekod ini?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">TIADA REKOD</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $senaraiDokumen->links() }}

    </div>
    <div class="card-footer">
        <a href="{{ route('documents.create') }}" class="btn btn-primary">Tambah Dokumen</a>
    </div>
</div>

@endsection
