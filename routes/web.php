<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\UlanganController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
    Route::post('simpanUlangan', [UlanganController::class, 'simpanUlangan']);
    Route::get('detailSiswa{id}', [SiswaController::class, 'detailSiswa']);
    Route::get('detailPenilaian{id}', [NilaiController::class, 'detailPenilaian']);

    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
        Route::get('dataSiswa', [SiswaController::class, 'index']);
        Route::get('dataGuru', [GuruController::class, 'guru']);
        Route::get('dataKelas', [KelasController::class, 'index']);
        Route::get('dataJurusan', [JurusanController::class, 'index']);
        Route::get('dataMataPelajaran', [MapelController::class, 'index']);
        Route::get('dataWali', [WaliController::class, 'wali']);
        Route::get('dataHari', [HariController::class, 'index']);
        Route::get('dataPredikat', [NilaiController::class, 'index']);
        Route::get('user', [UserController::class, 'index']);

        Route::post('simpanSiswa', [SiswaController::class, 'simpanSiswa']);
        Route::get('hapusSiswa', [SiswaController::class, 'hapusSiswa']);
        Route::post('simpanGuru', [GuruController::class, 'simpanGuru']);
        Route::get('hapusGuru', [GuruController::class, 'hapusGuru']);
        Route::post('simpanJurusan', [JurusanController::class, 'simpanJurusan']);
        Route::get('hapusJurusan', [JurusanController::class, 'hapusJurusan']);
        Route::post('simpanKelas', [KelasController::class, 'simpanKelas']);
        Route::get('hapusKelas', [KelasController::class, 'hapusKelas']);
        Route::post('simpanMapel', [MapelController::class, 'simpanMapel']);
        Route::get('hapusMapel', [MapelController::class, 'hapusMapel']);
        Route::post('simpanWali', [WaliController::class, 'simpanWali']);
        Route::get('hapusWali', [WaliController::class, 'hapusWali']);
        Route::post('simpanHari', [HariController::class, 'simpanHari']);
        Route::get('hapusHari', [HariController::class, 'hapusHari']);
        Route::post('simpanPredikat', [NilaiController::class, 'simpanPredikat']);
        Route::get('hapusPredikat', [NilaiController::class, 'hapusPredikat']);
        Route::get('hapusWali', [WaliController::class, 'hapusWali']);
        Route::post('simpanUser', [UserController::class, 'simpanUser']);
        Route::get('hapusUser', [UserController::class, 'hapusUser']);
    });

    Route::middleware(['wali'])->group(function () {
        Route::get('wali', [WaliController::class, 'index']);
        Route::get('detailNilai{id}', [NilaiController::class, 'detailNilai']);
        Route::get('kelas', [KelasController::class, 'kelas']);
        Route::get('detailKelas{id}', [KelasController::class, 'detailKelas']);
        Route::get('nilai', [NilaiController::class, 'nilai']);
    });

    Route::middleware(['guru'])->group(function () {
        Route::get('guru', [GuruController::class, 'index']);
        Route::get('siswa', [SiswaController::class, 'siswa']);
    });
});
