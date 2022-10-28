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

Route::get('/users', [UserController::class, 'paparSenaraiUsers'])->name('users.index');
Route::get('users/create', [UserController::class, 'paparBorangTambah'])->name('users.create');
Route::post('users/create', [UserController::class, 'terimaDataBorangTambah'])->name('users.store');
Route::get('users/{id}', [UserController::class, 'paparRekodUser'])->where('id', '[0-9]+')->name('users.show');
Route::get('users/{id}/edit', [UserController::class, 'paparBorangEdit'])->name('users.edit');
Route::patch('users/{id}/edit', [UserController::class, 'terimaDataBorangEdit'])->name('users.update');
Route::get('users/{id}/delete', [UserController::class, 'deleteUser'])->name('users.destroy');

Route::get('laporan', fn() => view('folder-reporting.index'))->name('laporan.index');

Route::resource('documents', DocumentController::class);

// Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
// Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
// Route::post('documents/create', [DocumentController::class, 'store'])->name('documents.store');

Route::get('reports/{id}/registration/add', fn() => 'test')->name('reports.registration.create');


Route::get('logout', LogoutController::class);
