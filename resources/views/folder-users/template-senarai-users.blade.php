@extends('layouts.induk')

@section('isi-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Senarai Users</h1>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>ALAMAT EMAIL</th>
                    <th>STATUS</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($senaraiUsers as $person)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->email }}</td>
                    <td>{{ $person->status }}</td>
                    <td>
                        <a href="{{ route('users.edit', $person->id) }}" class="btn btn-primary">
                            EDIT
                        </a>
                        <a href="{{ route('users.show', $person->id) }}" class="btn btn-success">
                            LIHAT
                        </a>
                        <a href="{{ route('users.destroy', $person->id) }}" class="btn btn-danger">
                            DELETE
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $senaraiUsers->links() }}

    </div>
    <div class="card-footer">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
    </div>
</div>

@endsection
