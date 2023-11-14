<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarlineController;
use App\Http\Controllers\CostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MbarangController;
use App\Http\Controllers\TpembelianController;
use App\Http\Controllers\TpembelianbarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KodeBudgetController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\UMHController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

    // REGISTER
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => ['web']], function () {
    // Halaman Utama
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth,51B1');
    // Halaman Utama

    Route::resource('/user', UserController::class)->middleware('checkRole:Admin');
    Route::resource('/dashboard', DashboardController::class)->only(['index'])->middleware('checkRole:Admin');
    Route::resource('/profile', ProfileController::class)->only(['index', 'update', 'show'])->middleware('auth');
    Route::resource('/detail', DetailController::class)->middleware('auth');

    // HOME
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

    // Route::resource('/home', HomeController::class)->middleware('auth');
    Route::post('/import-excel-home', [HomeController::class, 'import_excel_home'])->name('import-excel-home');
    Route::post('reset_home', [HomeController::class, 'reset_home'])->name('reset_home');
    Route::get('edit_home/{id}', [HomeController::class, 'edit']);
    Route::post('/update-home/{id}', [HomeController::class, 'update'])->name('update.home');
    Route::delete('/delete-home',  [HomeController::class, 'deleteItems'])->name('home.delete');
    Route::get('/search-home', [HomeController::class, 'searchHome'])->name('search.home');
    Route::get('/export_excel', [HomeController::class, 'export_excel']);
    Route::post('/add-home', [HomeController::class, 'addHome']);
    Route::get('/filter/{tahun}', [HomeController::class, 'filterByYear'])->name('filterByYear');
    Route::get('/getMasterBarangName', [HomeController::class, 'getMasterBarangName']);

    // MASTER BARANG
    Route::resource('/master_barang', MasterBarangController::class)->middleware('auth');
    Route::post('/import-excel-mb', [MasterBarangController::class, 'import_excel_mb'])->name('import-excel-mb');
    Route::post('reset_mb', [MasterBarangController::class, 'reset_mb'])->name('reset_mb');
    Route::post('/update-mb/{id}', [MasterBarangController::class, 'update'])->name('update.master_barang');
    Route::delete('/delete-mb',  [MasterBarangController::class, 'deleteItems'])->name('master_barang.delete');
    Route::get('/search-mb', [MasterBarangController::class, 'searchMB'])->name('search.master_barang');
    Route::post('/add-mb', [MasterBarangController::class, 'addMB']);

    // CARLINE
    Route::resource('/carline', CarlineController::class)->middleware('auth');
    Route::post('/import-excel-carline', [CarlineController::class, 'import_excel_carline'])->name('import-excel-carline');
    Route::post('reset_carline', [CarlineController::class, 'reset_carline'])->name('reset_carline');
    Route::get('edit_carline/{id}', [CostController::class, 'edit']);
    Route::post('/update-carline/{id}', [CarlineController::class, 'update'])->name('update.carline');
    Route::delete('/delete-carline',  [CarlineController::class, 'deleteItems'])->name('carline.delete');
    Route::get('/search-carline', [CarlineController::class, 'searchCarline'])->name('search.carline');
    Route::post('/add-carline', [CarlineController::class, 'addCarline']);

    // COST
    Route::resource('/cost', CostController::class)->middleware('auth');
    Route::post('/import-excel-cost', [CostController::class, 'import_excel_cost'])->name('import-excel-cost');
    Route::post('reset_cost', [CostController::class, 'reset_cost'])->name('reset_cost');
    Route::get('edit_cost/{id}', [CostController::class, 'edit']);
    Route::post('/update-cost/{id}', [CostController::class, 'update'])->name('update.cost');
    Route::delete('/delete-cost',  [CostController::class, 'deleteItems'])->name('cost.delete');
    Route::get('/search-cost', [CostController::class, 'searchCost'])->name('search.cost');
    Route::post('/add-cost', [CostController::class, 'addCost']);

    // KODE BUDGET
    Route::resource('/kode_budget', KodeBudgetController::class)->middleware('auth');
    Route::post('/import-excel-kb', [KodeBudgetController::class, 'import_excel_kb'])->name('import-excel-kb');
    Route::post('reset_kb', [KodeBudgetController::class, 'reset_kb'])->name('reset_kb');
    Route::get('edit_kb/{id}', [KodeBudgetController::class, 'edit']);
    Route::post('/update-kb/{id}', [KodeBudgetController::class, 'update'])->name('update.kode_budget');
    Route::delete('/delete-kb',  [KodeBudgetController::class, 'deleteItems'])->name('kode_budget.delete');
    Route::get('/search-kb', [KodeBudgetController::class, 'searchKb'])->name('search.kode_budget');
    Route::get('/cari', [KodeBudgetController::class, 'cari'])->name('kode_budget.cari');
    Route::post('/add-kb', [KodeBudgetController::class, 'addKb']);

    // UMH
    Route::resource('/umh', UMHController::class)->middleware('auth');
    Route::post('/import-excel-umh', [UMHController::class, 'import_excel_umh'])->name('import-excel-umh');
    Route::post('reset_umh', [UMHController::class, 'reset_umh'])->name('reset_umh');
    Route::get('edit_umh/{id}', [UMHController::class, 'edit']);
    Route::post('/update-umh/{id}', [UMHController::class, 'update'])->name('update.umh');
    Route::delete('/delete-umh',  [UMHController::class, 'deleteItems'])->name('umh.delete');
    Route::get('/search-umh', [UMHController::class, 'searchUMH'])->name('search.umh');
    Route::get('/create', [UMHController::class, 'create'])->name('umh.create');
    // Route::post('store', [UMHController::class, 'store'])->name('umh.store');
    Route::post('/add-umh', [UMHController::class, 'addUMH']);

    // DATA PDF
    Route::get('/pdf-transaksi-pembelian', [TpembelianController::class, 'pdf'])->name('pdf-transaksi-pembelian')->middleware('auth');
    Route::get('/pdf-transaksi-pembelian-barang', [TpembelianbarangController::class, 'pdf'])->name('pdf-transaksi-pembelian-barang')->middleware('auth');
    Route::get('/pdf-master-barang', [MbarangController::class, 'pdf'])->name('pdf-master-barang')->middleware('checkRole:Admin');
    Route::get('/pdf-user', [UserController::class, 'pdf'])->name('pdf-user')->middleware('checkRole:Admin');
    // DATA PDF

    // DATA EXCEL
    Route::get('/excel-transaksi-pembelian', [TpembelianController::class, 'excel'])->name('excel-transaksi-pembelian')->middleware('auth');
    Route::get('/excel-transaksi-pembelian-barang', [TpembelianbarangController::class, 'excel'])->name('excel-transaksi-pembelian-barang')->middleware('auth');
    Route::get('/excel-master-barang', [MbarangController::class, 'excel'])->name('excel-master-barang')->middleware('checkRole:Admin');
    Route::get('/excel-user', [UserController::class, 'excel'])->name('excel-user')->middleware('checkRole:Admin');
    // DATA EXCEL

    // DATA Print
    Route::get('/print-transaksi-pembelian', [TpembelianController::class, 'print'])->name('print-transaksi-pembelian')->middleware('auth');
    Route::get('/print-transaksi-pembelian-barang', [TpembelianbarangController::class, 'print'])->name('print-transaksi-pembelian-barang')->middleware('auth');
    Route::get('/print-master-barang', [MbarangController::class, 'print'])->name('print-master-barang')->middleware('auth');
    Route::get('/print-user', [UserController::class, 'print'])->name('print-user')->middleware('auth');
    // DATA Print

    // DATA PDF Detail
    Route::get('/pdf-transaksi-pembelian-detail/{id}', [TpembelianController::class, 'pdf_detail'])->name('pdf-transaksi-pembelian-detail')->middleware('auth');
    Route::get('/pdf-transaksi-pembelian-barang-detail/{id}', [TpembelianbarangController::class, 'pdf_detail'])->name('pdf-transaksi-pembelian-barang-detail')->middleware('auth');
    Route::get('/pdf-master-barang-detail/{id}', [MbarangController::class, 'pdf_detail'])->name('pdf-master-barang-detail')->middleware('checkRole:Admin');
    Route::get('/pdf-user-detail/{id}', [UserController::class, 'pdf_detail'])->name('pdf-master-barang-detail')->middleware('checkRole:Admin');
    // DATA PDF Detail

    // DATA Print Detail
    Route::get('/print-transaksi-pembelian-detail/{id}', [TpembelianController::class, 'print_detail'])->name('print-transaksi-pembelian-detail')->middleware('auth');
    Route::get('/print-transaksi-pembelian-barang-detail/{id}', [TpembelianbarangController::class, 'print_detail'])->name('print-transaksi-pembelian-barang-detail')->middleware('auth');
    Route::get('/print-master-barang-detail/{id}', [MbarangController::class, 'print_detail'])->name('print-master-barang-detail')->middleware('checkRole:Admin');
    Route::get('/print-user-detail/{id}', [UserController::class, 'print_detail'])->name('print-master-barang-detail')->middleware('checkRole:Admin');
    // DATA Print Detail

    // DATA Print Excel
    Route::get('/pdf-transaksi-pembelian-detail/{id}', [TpembelianController::class, 'pdf_detail'])->name('pdf-transaksi-pembelian-detail')->middleware('auth');
    Route::get('/pdf-transaksi-pembelian-barang-detail/{id}', [TpembelianbarangController::class, 'pdf_detail'])->name('pdf-transaksi-pembelian-barang-detail')->middleware('auth');
    Route::get('/pdf-master-barang-detail/{id}', [MbarangController::class, 'pdf_detail'])->name('pdf-master-barang-detail')->middleware('checkRole:Admin');
    Route::get('/pdf-user-detail/{id}', [UserController::class, 'pdf_detail'])->name('pdf-master-barang-detail')->middleware('checkRole:Admin');
});
