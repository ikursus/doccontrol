<?php

use Illuminate\Support\Facades\Route;

// Route::get($uri, $action);

Route::get('/', function () {
    return view('welcome');
    // fn() => 'Ini halaman utama'
});

Route::get('login', function () {
    return view('authentication.template-login');
});

Route::post('login', function () {
    // Check butiran login betul @ tidak

    return redirect('/dashboard');
});

Route::get('password-reset', fn() => 'Ini halaman password reset');

Route::get('/groups/{username?}', function ($username = NULL) {

    //DB::table('users')->where('username', '=', $username)->get();

    if (is_null($username))
    {
        return 'Sila masukkan nama group';
    }

    return 'Ini adalah group ' . $username;
});

// Cara 1
Route::get('dashboard', fn() => view('template-dashboard'));

// Cara 2
Route::view('dashboard', 'template-dashboard');

// Cara 3
Route::get('dashboard', function () {
    return view('template-dashboard');
});


Route::get('documents', fn() => 'Ini halaman senarai documents');
Route::get('documents/create', fn() => 'Ini halaman borang tambah documents');
Route::post('documents/create', fn() => 'Borang berjaya dihantar');
Route::get('documents/{id}', fn() => 'Ini halaman maklumat documents');
Route::get('documents/{id}/edit', fn() => 'Ini halaman borang kemaskini documents');
Route::patch('documents/{id}/edit', fn() => 'Borang berjaya dikemaskini');
Route::delete('documents/{id}', fn() => 'Rekod berjaya dihapuskan');
