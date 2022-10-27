@extends('layouts.induk')

@section('isi-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Maklumat Pengguna: {{ $user->name }}</h1>

<form>
<div class="card">
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PERKARA</th>
                    <th>BUTIRAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>NAMA</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>PHONE</td>
                    <td>{{ $user->phone ?? "TIADA NOMBOR" }}</td>
                </tr>
                <tr>
                    <td>STATUS</td>
                    <td>{{ $user->status }}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
</form>

@endsection
