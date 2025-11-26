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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Dokter\DashboardDokterController;
use App\Http\Controllers\Dokter\PasienController as DokterPasienController;
use App\Http\Controllers\Dokter\RekamMedisController as DokterRekamMedisController;
use App\Http\Controllers\Dokter\DetailRekamMedisController as DokterDetailRekamMedisController;
use App\Http\Controllers\Dokter\ProfilController as DokterProfilController;
use Illuminate\Support\Facades\Auth;

Route::get('/cekkoneksi', [SiteController::class, 'cekkoneksi'])->name('cekkoneksi');

Auth::routes();

//akses ke administrator 
Route::middleware(['auth', 'isAdministrator'])->group(function () {
    Route::get('/admin/dashboard', 
        [App\Http\Controllers\Admin\DashboardAdminController::class, 'index']
         )->name('admin.dashboard');
    Route::get('/admin/datamaster', 
        [App\Http\Controllers\Admin\DataMasterController::class, 'index']
        )->name('admin.datamaster');
    
    // Resource route untuk Jenis Hewan dengan AdminLTE
    Route::resource('jenis-hewan', JenisHewanController::class);

});

//akses ke dokter
Route::middleware(['auth', 'isDokter'])->prefix('dokter')->name('dokter.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardDokterController::class, 'index'])->name('dashboard');
    
    // Data Pasien
    Route::get('/pasien', [DokterPasienController::class, 'index'])->name('pasien.index');
    Route::get('/pasien/{id}', [DokterPasienController::class, 'show'])->name('pasien.show');
    
    // Rekam Medis
    Route::get('/rekammedis', [DokterRekamMedisController::class, 'index'])->name('rekammedis.index');
    Route::get('/rekammedis/create/{idreservasi}', [DokterRekamMedisController::class, 'create'])->name('rekammedis.create');
    Route::post('/rekammedis/store', [DokterRekamMedisController::class, 'store'])->name('rekammedis.store');
    Route::get('/rekammedis/{id}', [DokterRekamMedisController::class, 'show'])->name('rekammedis.show');
    Route::get('/rekammedis/{id}/edit', [DokterRekamMedisController::class, 'edit'])->name('rekammedis.edit');
    Route::post('/rekammedis/{id}/update', [DokterRekamMedisController::class, 'update'])->name('rekammedis.update');
    
    // Detail Rekam Medis (Tindakan)
    Route::get('/detailrekammedis/create/{idrekammedis}', [DokterDetailRekamMedisController::class, 'create'])->name('detailrekammedis.create');
    Route::post('/detailrekammedis/store', [DokterDetailRekamMedisController::class, 'store'])->name('detailrekammedis.store');
    Route::get('/detailrekammedis/{id}/edit', [DokterDetailRekamMedisController::class, 'edit'])->name('detailrekammedis.edit');
    Route::post('/detailrekammedis/{id}/update', [DokterDetailRekamMedisController::class, 'update'])->name('detailrekammedis.update');
    Route::get('/detailrekammedis/{id}/delete', [DokterDetailRekamMedisController::class, 'destroy'])->name('detailrekammedis.delete');
    
    // Profil Dokter
    Route::get('/profil', [DokterProfilController::class, 'index'])->name('profil.index');
    Route::post('/profil/update', [DokterProfilController::class, 'update'])->name('profil.update');
});

//akses ke perawat
Route::middleware(['auth', 'isPerawat'])->group(function () {
    Route::get('/perawat/dashboard', [App\Http\Controllers\Perawat\DashboardPerawatController::class, 'index'])
        ->name('perawat.dashboard');
});

//akses ke resepsionis
Route::middleware(['auth', 'isResepsionis'])->prefix('resepsionis')->name('resepsionis.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Resepsionis\DashboardResepsionisController::class, 'index'])
        ->name('dashboard');
    
    // Pemilik CRUD
    Route::get('/pemilik', [App\Http\Controllers\Resepsionis\PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/pemilik/create', [App\Http\Controllers\Resepsionis\PemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/pemilik/store', [App\Http\Controllers\Resepsionis\PemilikController::class, 'store'])->name('pemilik.store');
    Route::get('/pemilik/{id}/edit', [App\Http\Controllers\Resepsionis\PemilikController::class, 'edit'])->name('pemilik.edit');
    Route::put('/pemilik/{id}', [App\Http\Controllers\Resepsionis\PemilikController::class, 'update'])->name('pemilik.update');
    Route::delete('/pemilik/{id}', [App\Http\Controllers\Resepsionis\PemilikController::class, 'destroy'])->name('pemilik.destroy');
    
    // Pet CRUD
    Route::get('/pet', [App\Http\Controllers\Resepsionis\PetController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [App\Http\Controllers\Resepsionis\PetController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [App\Http\Controllers\Resepsionis\PetController::class, 'store'])->name('pet.store');
    Route::get('/pet/{id}/edit', [App\Http\Controllers\Resepsionis\PetController::class, 'edit'])->name('pet.edit');
    Route::put('/pet/{id}', [App\Http\Controllers\Resepsionis\PetController::class, 'update'])->name('pet.update');
    Route::delete('/pet/{id}', [App\Http\Controllers\Resepsionis\PetController::class, 'destroy'])->name('pet.destroy');
    Route::get('/pet/get-ras/{idJenisHewan}', [App\Http\Controllers\Resepsionis\PetController::class, 'getRasByJenis'])->name('pet.getRas');
    
    // Temu Dokter CRUD
    Route::get('/temudokter', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'index'])->name('temudokter.index');
    Route::get('/temudokter/antrian', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'antrian'])->name('temudokter.antrian');
    Route::get('/temudokter/create', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'create'])->name('temudokter.create');
    Route::post('/temudokter/store', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'store'])->name('temudokter.store');
    Route::get('/temudokter/{id}', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'show'])->name('temudokter.show');
    Route::get('/temudokter/{id}/edit', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'edit'])->name('temudokter.edit');
    Route::put('/temudokter/{id}', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'update'])->name('temudokter.update');
    Route::delete('/temudokter/{id}', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'destroy'])->name('temudokter.destroy');
    Route::get('/temudokter/{id}/status/{status}', [App\Http\Controllers\Resepsionis\TemuDokterController::class, 'updateStatus'])->name('temudokter.updateStatus');
});

//akses ke pemiilik
Route::middleware(['auth', 'isPemilik'])->group(function () {
    Route::get('/pemilik/dashboard', [App\Http\Controllers\Pemilik\DashboardPemilikController::class, 'index'])
        ->name('pemilik.dashboard');
});

Route::get('/', [SiteController::class, 'home'])->name('landingpage');
Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');
Route::get('/struktur', [SiteController::class, 'struktur'])->name('struktur');
Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak');
Route::get('/login', [SiteController::class, 'login'])->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/JenisHewan', [JenisHewanController::class, 'index'])->name('jenishewan.index');
    Route::get('/JenisHewan/create', [JenisHewanController::class, 'create'])->name('jenishewan.create');
    Route::post('/JenisHewan/store', [JenisHewanController::class, 'store'])->name('jenishewan.store');
    Route::get('/JenisHewan/edit/{id}', [JenisHewanController::class, 'edit'])->name('jenishewan.edit');
    Route::post('/JenisHewan/update/{id}', [JenisHewanController::class, 'update'])->name('jenishewan.update');
    Route::get('/JenisHewan/delete/{id}', [JenisHewanController::class, 'destroy'])->name('jenishewan.delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/Pemilik', [PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('/Pemilik/create', [PemilikController::class, 'create'])->name('pemilik.create');
    Route::post('/Pemilik/store', [PemilikController::class, 'store'])->name('pemilik.store');
    Route::get('/Pemilik/edit/{id}', [PemilikController::class, 'edit'])->name('pemilik.edit');
    Route::post('/Pemilik/update/{id}', [PemilikController::class, 'update'])->name('pemilik.update');
    Route::get('/Pemilik/delete/{id}', [PemilikController::class, 'destroy'])->name('pemilik.delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/RasHewan', [RasHewanController::class, 'index'])->name('rashewan.index');
    Route::get('/RasHewan/create', [RasHewanController::class, 'create'])->name('rashewan.create');
    Route::post('/RasHewan/store', [RasHewanController::class, 'store'])->name('rashewan.store');
    Route::get('/RasHewan/edit/{id}', [RasHewanController::class, 'edit'])->name('rashewan.edit');
    Route::post('/RasHewan/update/{id}', [RasHewanController::class, 'update'])->name('rashewan.update');
    Route::get('/RasHewan/delete/{id}', [RasHewanController::class, 'destroy'])->name('rashewan.delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/Kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/Kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/Kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/Kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/Kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/Kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/KategoriKlinis', [KategoriKlinisController::class, 'index'])->name('kategoriKlinis.index');
    Route::get('/KategoriKlinis/create', [KategoriKlinisController::class, 'create'])->name('kategoriKlinis.create');
    Route::post('/KategoriKlinis/store', [KategoriKlinisController::class, 'store'])->name('kategoriKlinis.store');
    Route::get('/KategoriKlinis/edit/{id}', [KategoriKlinisController::class, 'edit'])->name('kategoriKlinis.edit');
    Route::post('/KategoriKlinis/update/{id}', [KategoriKlinisController::class, 'update'])->name('kategoriKlinis.update');
    Route::get('/KategoriKlinis/delete/{id}', [KategoriKlinisController::class, 'destroy'])->name('kategoriKlinis.delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/KodeTindakanTerapi', [KodeTindakanTerapiController::class, 'index'])->name('KodeTindakanTerapi.index');
    Route::get('/KodeTindakanTerapi/create', [KodeTindakanTerapiController::class, 'create'])->name('KodeTindakanTerapi.create');
    Route::post('/KodeTindakanTerapi/store', [KodeTindakanTerapiController::class, 'store'])->name('KodeTindakanTerapi.store');
    Route::get('/KodeTindakanTerapi/edit/{id}', [KodeTindakanTerapiController::class, 'edit'])->name('KodeTindakanTerapi.edit');
    Route::post('/KodeTindakanTerapi/update/{id}', [KodeTindakanTerapiController::class, 'update'])->name('KodeTindakanTerapi.update');
    Route::get('/KodeTindakanTerapi/delete/{id}', [KodeTindakanTerapiController::class, 'destroy'])->name('KodeTindakanTerapi.delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
    Route::get('/pet/create', [PetController::class, 'create'])->name('pet.create');
    Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');
    Route::get('/pet/edit/{id}', [PetController::class, 'edit'])->name('pet.edit');
    Route::post('/pet/update/{id}', [PetController::class, 'update'])->name('pet.update');
    Route::get('/pet/delete/{id}', [PetController::class, 'destroy'])->name('pet.delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/roleuser', [RoleUserController::class, 'index'])->name('roleuser.index');
    Route::post('/roleuser/store', [RoleUserController::class, 'store'])->name('roleuser.store');
    Route::get('/roleuser/delete/{id}', [RoleUserController::class, 'destroy'])->name('roleuser.delete');
    Route::get('/roleuser/status/{id}', [RoleUserController::class, 'updateStatus'])->name('roleuser.status');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

