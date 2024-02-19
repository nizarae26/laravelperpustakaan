<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController as ControllersKategoriController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UlasanFavoritController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/loginn', [SesiController::class, 'index'])->name('loginn');
    Route::post('/loginn', [SesiController::class, 'loginn']);

    Route::get('/registerr', [SesiController::class, 'index2'])->name('regsiterr');
    Route::post('/registerr', [SesiController::class, 'registerr']);
    Route::get('/logout', [SesiController::class, 'logout'])->name('loginn');
    Route::get('/', [DashboardController::class, 'peminjam']);
});

// Route::get('/home', function () {
//     return redirect('/dashboard');
// });

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'cek']);

    Route::get('/dashboard/operator', [DashboardController::class, 'operator']);
    Route::get('/dashboard/peminjam', [DashboardController::class, 'peminjam']);
    // Route::get('/dashboard/peminjam', [DashboardController::class, 'peminjam']);

    // Route::get('/detailBuku/{id}', [DashboardController::class, 'detailBuku'])->name('detailBuku');

    //Peminjaman
    Route::get('/pinjamBuku/{id}', [PeminjamanController::class, 'pinjamBuku'])->name('pinjamBuku');
    Route::get('/ulasan/{id}', [PeminjamanController::class, 'ulasan'])->name('ulasan');
    Route::get('/detailPinjam', [PeminjamanController::class, 'detailPinjam'])->name('detailPinjam');
    Route::get('/pilihBuku/{id}', [PeminjamanController::class, 'pilihBuku'])->name('pilihBuku');
    Route::get('/semuaBuku', [PeminjamanController::class, 'semuaBuku'])->name('semuaBuku');
    Route::get('/semuaPenerbit', [PeminjamanController::class, 'semuaPenerbit'])->name('semuaPenerbit');
    Route::get('/semuaPenerbit', [PeminjamanController::class, 'semuaPenerbit'])->name('semuaPenerbit');
    Route::get('/DataPengembalian', [PeminjamanController::class, 'dataPengembalian'])->name('dataPengembalian');
    Route::get('/DataPeminjaman', [PeminjamanController::class, 'dataPeminjaman'])->name('dataPeminjaman');
    Route::get('/ubahStatus/{id}', [PeminjamanController::class, 'ubahStatus'])->name('ubahStatus');
    Route::get('/ubahStatus1/{id}', [PeminjamanController::class, 'ubahStatus1'])->name('ubahStatus1');
    Route::get('/laporan', [PeminjamanController::class, 'laporan'])->name('laporan');

    //Ulasan & favorit
    Route::post('/ulasan/insertUlasan/{id}', [UlasanFavoritController::class, 'insertUlasan'])->name('insertUlasan');
    Route::get('/favorit/{id}', [UlasanFavoritController::class, 'favorit'])->name('favorit');
    Route::get('/favorit', [UlasanFavoritController::class, 'favorits'])->name('favorits');
    Route::get('/DataUlasan', [UlasanFavoritController::class, 'dataUlasan'])->name('dataUlasan');
    Route::get('/deleteFavorit/{id}', [UlasanFavoritController::class, 'deleteFavorit'])->name('deleteFavorit');


    //Category
    Route::get('/DataCategory', [CategoryController::class, 'DataCategory'])->name('DataCategory');
    Route::post('/Category/insertCategory', [CategoryController::class, 'insertCategory'])->name('insertCategory');
    Route::post('/Category/{id}/updateCategory', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::get('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

    //Penerbit
    Route::get('/DataPenerbit', [PenerbitController::class, 'DataPenerbit'])->name('DataPenerbit');
    Route::post('/Penerbit/insertPenerbit', [PenerbitController::class, 'insertPenerbit'])->name('insertPenerbit');
    Route::post('/Penerbit/{id}/updatePenerbit', [PenerbitController::class, 'updatePenerbit'])->name('updatePenerbit');
    Route::get('/deletePenerbit/{id}', [PenerbitController::class, 'deletePenerbit'])->name('deletePenerbit');

    //Rak
    Route::get('/DataRak', [RakController::class, 'DataRak'])->name('DataRak');
    Route::post('/Rak/insertRak', [RakController::class, 'insertRak'])->name('insertRak');
    Route::post('/Rak/{id}/updateRak', [RakController::class, 'updateRak'])->name('updateRak');
    Route::get('/deleteRak/{id}', [RakController::class, 'deleteRak'])->name('deleteRak');

    //Buku
    Route::get('/DataBuku', [BukuController::class, 'DataBuku'])->name('DataBuku');
    Route::post('/Buku/insertBuku', [BukuController::class, 'insertBuku'])->name('insertBuku');
    Route::post('/Buku/{id}/updateBuku', [BukuController::class, 'updateBuku'])->name('updateBuku');
    Route::get('/deleteBuku/{id}', [BukuController::class, 'deleteBuku'])->name('deleteBuku');

    //User
    Route::get('/DataUser', [UserController::class, 'DataUser'])->name('DataUser');
    Route::post('/User/insertUser', [UserController::class, 'insertUser'])->name('insertUser');
    Route::post('/User/{id}/updateUser', [UserController::class, 'updateUser'])->name('updateUser');
    Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

    //export pdf
    Route::get('/exportpdfkategori', [CategoryController::class, 'exportpdf'])->name('exportpdf');
    Route::get('/exportpdfpenerbit', [PenerbitController::class, 'exportpdf'])->name('exportpdf');
    Route::get('/exportpdfrak', [RakController::class, 'exportpdf'])->name('exportpdf');
    Route::get('/exportpdfbuku', [BukuController::class, 'exportpdf'])->name('exportpdf');

    Route::get('/logout', [SesiController::class, 'logout']);
});

Auth::routes();
