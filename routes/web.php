<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\WaitListController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/profil-perpustakaan', function () {
    return view('library_profile.profile');
})->name('library_profile');

Route::get('/struktur-kepengurusan', function () {
    return view('library_profile.struktur');
})->name('library_structure');

Route::get('/visi-misi', function () {
    return view('library_profile.visi_misi');
})->name('library_visi_misi');

Route::get('/tata-tertib', function () {
    return view('library_profile.tata_tertib');
})->name('library_tata_tertib');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/waitlists', [WaitListController::class, 'store'])->name('waitlists.store');
});


Route::resource('books', BookController::class);
