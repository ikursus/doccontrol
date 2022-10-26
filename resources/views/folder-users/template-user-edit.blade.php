@extends('layouts.induk')

@section('isi-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit User: {{ $id }}</h1>

<form>
<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label>Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="">-- Sila Pilih--</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="pending">Pending</option>
                <option value="banned">Banned</option>
            </select>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
</form>

@endsection
