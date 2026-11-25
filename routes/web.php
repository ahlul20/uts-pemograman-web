<?php

use App\Http\Controllers\BiodataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Seluruh route untuk manajemen Biodata Mahasiswa dan halaman UTS.
|--------------------------------------------------------------------------
*/

// Halaman utama mengarah langsung ke daftar biodata
Route::get('/', [BiodataController::class, 'index'])->name('biodata.index');

// Resource route untuk operasi Create, Store, Edit, Update, Delete
Route::resource('biodata', BiodataController::class)
    ->parameters(['biodata' => 'biodata'])
    ->except(['index']);

// Route halaman Home
Route::get('/home', function () {
    return view('home');
})->name('home');
