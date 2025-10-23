<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\JenisHewanController;
use App\Http\Controllers\Admin\PemilikController;
use App\Http\Controllers\Admin\RasHewanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KategoriKlinisController;
use App\Http\Controllers\Admin\KodeTindakanTerapiController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoleUserController;


Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/login', [SiteController::class, 'login'])->name('login');
Route::get('/JenisHewan', [JenisHewanController::class, 'index'])->name('jenishewan');
Route::get('/Pemilik', [PemilikController::class, 'pemilik'])->name('pemilik');
Route::get('/RasHewan', [RasHewanController::class, 'index'])->name('RasHewan');
Route::get('/Kategori', [KategoriController::class, 'index'])->name('Kategori');
Route::get('/KategoriKlinis', [KategoriKlinisController::class, 'index'])->name('KategoriKlinis');
Route::get('/KodeTindakanTerapi', [KodeTindakanTerapiController::class, 'index'])->name('KodeTindakanTerapi');
Route::get('/pet', [PetController::class, 'index'])->name('pet');
Route::get('/Role', [RoleController::class, 'index'])->name('Role');
Route::get('/RoleUser', [RoleUserController::class, 'index'])->name('RoleUser');
Route::get('/cekkoneksi', [SiteController::class, 'cekkoneksi'])->name('cekkoneksi');

