<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController; // setiap penggunaan controller perlu didefinisikan
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\PairController;
use App\Http\Controllers\TeamController;
/*
// CRUD
// Route::get('/artikel', [ArticleController::class,'index']); // mengoper view ke controller
// Route::get('/artikel/create', [ArticleController::class,'create']);
// Route::get('/artikel/{slug}', [ArticleController::class,'show']);
// Route::post('/artikel', [ArticleController::class,'store']);
// Route::get('/artikel/{id}/edit', [ArticleController::class,'edit']);
// Route::put('/artikel/{id}', [ArticleController::class,'update']);
// Route::delete('/artikel/{id}', [ArticleController::class,'destroy']);
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/table-score', function () {
    return view('table-score');
});

Route::resource('artikel', ArticleController::class);
Route::resource('atlet', AthleteController::class);
Route::post('absensi/atlet', [AbsenceController::class, 'absen_atlet']);
Route::delete('absensi/atlet/{id}', [AbsenceController::class, 'delete_absen_atlet']);
Route::get('absensi/ekspor', [AbsenceController::class, 'ekspor']);
Route::get('absensi/ekspor-data', [AbsenceController::class, 'ekspor_data']);
Route::get('absensi/ekspor-lain/{id}', [AbsenceController::class, 'ekspor_lain']);
Route::resource('absensi', AbsenceController::class);
Route::resource('pair-match', PairController::class);
Route::resource('team-match', TeamController::class);
