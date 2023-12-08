<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
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
use App\Http\Controllers\DeadlineController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KodeBudgetController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\ProsesNariyukiController;
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
// FORGOT PASSWORD
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

// RESET PASSWORD
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


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
    // Route::get('/export_excel', [HomeController::class, 'export_excel']);
    Route::get('/downloadFilteredData', [HomeController::class, 'downloadFilteredData'])->name('downloadFilteredData');
    Route::post('/downloadFilteredData', [HomeController::class, 'downloadFilteredData'])->name('downloadFilteredData');

    Route::post('/add-home', [HomeController::class, 'addHome']);
    Route::get('/filter/{tahun}', [HomeController::class, 'filterByYear'])->name('filterByYear');
    Route::get('/getMasterBarangName', [HomeController::class, 'getMasterBarangName']);
    Route::post('/filterBySection', [HomeController::class, 'filterBySection'])->name('filterBySection');
    Route::post('/filterByTahun', [HomeController::class, 'filterBySection'])->name('filterByTahun');
    Route::get('/loadOriginalData', [HomeController::class, 'loadOriginalData'])->name('loadOriginalData');

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

    // PROSES NARIYUKI
    Route::resource('/proses_nariyuki', ProsesNariyukiController::class)->middleware('auth');
    Route::post('/import-excel-pn', [ProsesNariyukiController::class, 'import_excel_pn'])->name('import-excel-pn');
    Route::post('reset_pn', [ProsesNariyukiController::class, 'reset_pn'])->name('reset_pn');
    Route::get('edit_pn/{id}', [ProsesNariyukiController::class, 'edit']);
    Route::post('/update-pn/{id}', [ProsesNariyukiController::class, 'update'])->name('update.proses_nariyuki');
    Route::delete('/delete-pn',  [ProsesNariyukiController::class, 'deleteItems'])->name('proses_nariyuki.delete');
    Route::get('/search-pn', [ProsesNariyukiController::class, 'searchProses'])->name('search.proses_nariyuki');
    Route::get('/create', [ProsesNariyukiController::class, 'create'])->name('proses_nariyuki.create');
    // Route::post('store', [ProsesNariyukiController::class, 'store'])->name('proses_nariyuki.store');
    Route::post('/add-pn', [ProsesNariyukiController::class, 'addPN']);
    Route::get('/export_pn', [ProsesNariyukiController::class, 'export_pn']);
    Route::get('/downloadFiltered', [ProsesNariyukiController::class, 'downloadFiltered'])->name('downloadFiltered');
    Route::post('/downloadFiltered', [ProsesNariyukiController::class, 'downloadFiltered'])->name('downloadFiltered');
    Route::post('/filterSection', [ProsesNariyukiController::class, 'filterSection'])->name('filterSection');
    Route::get('/loadOriginal', [ProsesNariyukiController::class, 'loadOriginal'])->name('loadOriginal');

    // PROFILE
    Route::resource('/profile', UserController::class)->middleware('auth');
    Route::post('reset_profile', [UserController::class, 'reset_profile'])->name('reset_profile');
    Route::get('edit_profile/{id}', [UserController::class, 'edit']);
    Route::post('/update-profile/{id}', [UserController::class, 'update'])->name('update.profile');
    Route::delete('/delete-profile',  [UserController::class, 'deleteItems'])->name('profile.delete');
    Route::get('/search-profile', [UserController::class, 'searchProfile'])->name('search.profile');
    Route::get('/cari', [UserController::class, 'cari'])->name('profile.cari');

    Route::get('/unduh/{nama_file}', [HomeController::class, 'unduh'])->name('unduh');
    Route::post('/atur-deadline',  [DeadlineController::class, 'update'])->name('atur.deadline.update');
});
