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

Route::post('/login', function () {
    // Check butiran login betul @ tidak

    return redirect('/dashboard');
});

Route::get('/password-reset', fn() => view('authentication.template-password-reset'));

Route::get('/groups/{username?}', function ($username = NULL) {

    //DB::table('users')->where('username', '=', $username)->get();

    if (is_null($username))
    {
        return 'Sila masukkan nama group';
    }

    return 'Ini adalah group ' . $username;
});

// Cara 1
Route::get('/dashboard', fn() => view('template-dashboard'));

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


Route::get('/users', function () {

    $pageTitle = 'Senarai Users';

    // $senarai_users =
    $senaraiUsers = [
        ['id' => 1, 'name' => 'Ali', 'email' => 'ali@gmail.com', 'status' => 'active'],
        ['id' => 2, 'name' => 'Abu', 'email' => 'abu@gmail.com', 'status' => 'inactive'],
        ['id' => 3, 'name' => 'Siti', 'email' => 'siti@gmail.com', 'status' => 'pending'],
        ['id' => 4, 'name' => 'Lee', 'email' => 'lee@gmail.com', 'status' => 'active'],
        ['id' => 5, 'name' => 'Muthu', 'email' => 'muthu@gmail.com', 'status' => 'banned'],
    ];

    $inputField = '<script>alert(\'test\')</script>';

    // Return tanpa sebarang data
    // return view('folder-users.template-senarai-users');

    // Cara 1 return dengan data
    // return view('folder-users.template-senarai-users')
    // ->with('senaraiUsers', $senaraiUsers)
    // ->with('pageTitle', $pageTitle);

    // Cara 2 return data
    // return view('folder-users.template-senarai-users', [
    //     'senaraiUsers' => $senaraiUsers,
    //     'pageTitle' => $pageTitle
    // ]);

    // Cara 3 return data
    return view('folder-users.template-senarai-users', compact('senaraiUsers', 'pageTitle', 'inputField'));

});
