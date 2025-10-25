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


Route::get('/JenisHewan', [JenisHewanController::class, 'index'])->name('jenishewan.index');
Route::get('/JenisHewan/create', [JenisHewanController::class, 'create'])->name('jenishewan.create');
Route::post('/JenisHewan/store', [JenisHewanController::class, 'store'])->name('jenishewan.store');
Route::get('/JenisHewan/edit/{id}', [JenisHewanController::class, 'edit'])->name('jenishewan.edit');
Route::post('/JenisHewan/update/{id}', [JenisHewanController::class, 'update'])->name('jenishewan.update');
Route::get('/JenisHewan/delete/{id}', [JenisHewanController::class, 'destroy'])->name('jenishewan.delete');


Route::get('/Pemilik', [PemilikController::class, 'index'])->name('pemilik.index');
Route::get('/Pemilik/create', [PemilikController::class, 'create'])->name('pemilik.create');
Route::post('/Pemilik/store', [PemilikController::class, 'store'])->name('pemilik.store');
Route::get('/Pemilik/edit/{id}', [PemilikController::class, 'edit'])->name('pemilik.edit');
Route::post('/Pemilik/update/{id}', [PemilikController::class, 'update'])->name('pemilik.update');
Route::get('/Pemilik/delete/{id}', [PemilikController::class, 'destroy'])->name('pemilik.delete');


Route::get('/RasHewan', [RasHewanController::class, 'index'])->name('rashewan.index');
Route::get('/RasHewan/create', [RasHewanController::class, 'create'])->name('rashewan.create');
Route::post('/RasHewan/store', [RasHewanController::class, 'store'])->name('rashewan.store');
Route::get('/RasHewan/edit/{id}', [RasHewanController::class, 'edit'])->name('rashewan.edit');
Route::post('/RasHewan/update/{id}', [RasHewanController::class, 'update'])->name('rashewan.update');
Route::get('/RasHewan/delete/{id}', [RasHewanController::class, 'destroy'])->name('rashewan.delete');


Route::get('/Kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/Kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/Kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/Kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/Kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/Kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');


Route::get('/KategoriKlinis', [KategoriKlinisController::class, 'index'])->name('kategoriKlinis.index');
Route::get('/KategoriKlinis/create', [KategoriKlinisController::class, 'create'])->name('kategoriKlinis.create');
Route::post('/KategoriKlinis/store', [KategoriKlinisController::class, 'store'])->name('kategoriKlinis.store');
Route::get('/KategoriKlinis/edit/{id}', [KategoriKlinisController::class, 'edit'])->name('kategoriKlinis.edit');
Route::post('/KategoriKlinis/update/{id}', [KategoriKlinisController::class, 'update'])->name('kategoriKlinis.update');
Route::get('/KategoriKlinis/delete/{id}', [KategoriKlinisController::class, 'destroy'])->name('kategoriKlinis.delete');


Route::get('/KodeTindakanTerapi', [KodeTindakanTerapiController::class, 'index'])->name('KodeTindakanTerapi.index');
Route::get('/KodeTindakanTerapi/create', [KodeTindakanTerapiController::class, 'create'])->name('KodeTindakanTerapi.create');
Route::post('/KodeTindakanTerapi/store', [KodeTindakanTerapiController::class, 'store'])->name('KodeTindakanTerapi.store');
Route::get('/KodeTindakanTerapi/edit/{id}', [KodeTindakanTerapiController::class, 'edit'])->name('KodeTindakanTerapi.edit');
Route::post('/KodeTindakanTerapi/update/{id}', [KodeTindakanTerapiController::class, 'update'])->name('KodeTindakanTerapi.update');
Route::get('/KodeTindakanTerapi/delete/{id}', [KodeTindakanTerapiController::class, 'destroy'])->name('KodeTindakanTerapi.delete');


Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
Route::get('/pet/create', [PetController::class, 'create'])->name('pet.create');
Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');
Route::get('/pet/edit/{id}', [PetController::class, 'edit'])->name('pet.edit');
Route::post('/pet/update/{id}', [PetController::class, 'update'])->name('pet.update');
Route::get('/pet/delete/{id}', [PetController::class, 'destroy'])->name('pet.delete');


Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
Route::get('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');


Route::get('/roleuser', [RoleUserController::class, 'index'])->name('roleuser.index');
Route::post('/roleuser/store', [RoleUserController::class, 'store'])->name('roleuser.store');
Route::get('/roleuser/delete/{id}', [RoleUserController::class, 'destroy'])->name('roleuser.delete');
Route::get('/roleuser/status/{id}', [RoleUserController::class, 'updateStatus'])->name('roleuser.status');

Route::get('/cekkoneksi', [SiteController::class, 'cekkoneksi'])->name('cekkoneksi');

