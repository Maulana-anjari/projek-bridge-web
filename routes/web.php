<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\PairController;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('login');
});
// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/table-score', function () {
    return view('table-score');
});
Route::resource('atlet', AthleteController::class);
Route::post('absensi/atlet', [AbsenceController::class, 'absen_atlet']);
Route::delete('absensi/atlet/{id}', [AbsenceController::class, 'delete_absen_atlet']);
Route::get('absensi/ekspor', [AbsenceController::class, 'ekspor']);
Route::get('absensi/ekspor-data', [AbsenceController::class, 'ekspor_data']);
Route::get('absensi/ekspor-lain/{id}', [AbsenceController::class, 'ekspor_lain']);
Route::resource('absensi', AbsenceController::class);
Route::resource('pair-match', PairController::class);
Route::get('pair-match/{fileTitle}', [PairController::class, 'lihat_file']);
Route::get('pair-match/{fileTitle}/download', [PairController::class, 'download']);
Route::get('pair-match/{id}/hapus_file', [PairController::class, 'hapus_file']);
Route::resource('team-match', TeamController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
