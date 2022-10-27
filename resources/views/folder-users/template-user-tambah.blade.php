@extends('layouts.induk')

@section('isi-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Tambah User</h1>

<form method="POST" action="{{ route('users.store') }}">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    @csrf
<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
            @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
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
                <option value="active" {{ old('status') == 'active' ? 'selected=selected' : NULL }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected=selected' : NULL }}>Inactive</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected=selected' : NULL }}>Pending</option>
                <option value="banned" {{ old('status') == 'banned' ? 'selected=selected' : NULL }}>Banned</option>
            </select>
        </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>
</form>

@endsection
