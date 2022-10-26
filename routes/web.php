<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Auth\LogoutController;

// Route::get($uri, $action);

Route::get('/', function () {
    return view('welcome');
    // fn() => 'Ini halaman utama'
});

Route::get('login', function () {
    return view('authentication.template-login');
})->name('login');

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

// // Cara 2
// Route::view('dashboard', 'template-dashboard');

// // Cara 3
// Route::get('dashboard', function () {
//     return view('template-dashboard');
// });


// Route::get('documents', fn() => view('folder-documents.index'));
// Route::get('documents/tambah', fn() => view('folder-documents.create'));
// Route::post('documents/tambah', fn() => 'Borang berjaya dihantar');
// Route::get('documents/{id}', fn() => 'Ini halaman maklumat documents');
// Route::get('documents/{id}/kemaskini', fn() => view('folder-documents.edit'));
// Route::patch('documents/{id}/kemaskini', fn() => 'Borang berjaya dikemaskini');
// Route::delete('documents/{id}', fn() => 'Rekod berjaya dihapuskan');

// Guna resource hanya apabila controller menggunakan resource method (--resource / -r)
Route::group(['middleware' => 'auth'], function () {

});

Route::get('/users', [UserController::class, 'paparSenaraiUsers']);
    Route::get('users/create', [UserController::class, 'paparBorangTambah']);
    Route::post('users/create', [UserController::class, 'terimaDataBorangTambah']);
    Route::get('users/{id}', [UserController::class, 'paparRekodUser'])->where('id', '[0-9]+');
    Route::get('users/{id}/edit', [UserController::class, 'paparBorangEdit']);
    Route::patch('users/{id}/edit', [UserController::class, 'terimaDataBorangEdit']);
    Route::delete('users/{id}', [UserController::class, 'deleteUser']);

    Route::get('laporan', fn() => view('folder-reporting.index'));

Route::resource('documents', DocumentController::class);


Route::get('logout', LogoutController::class);
