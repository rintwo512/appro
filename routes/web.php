<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AksesController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChartAcController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\SubmenusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeaturesAcController;
use App\Http\Controllers\FeatureLogbookController;

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

Route::get('/', function () {
      return view('welcome');
});

Route::get('/404-page-not-found', function () {
      return view('404');
})->name('page-not-found');

Route::get('/manajemen-akses', function () {
      return view('appro.admin.manajemen-akses.index', ['title' => 'akses']);
});


Route::get('/data-apar', fn () => 'data apar');


// LOGIN
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/logout/{id}', [AuthController::class, 'logout'])->name('logout');


// DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::get('/get-online-users', [DashboardController::class, 'getOnlineUsers'])->name('get.Online.Users');


// AC
Route::get('data-ac', [AcController::class, 'index'])->name('index.ac');
Route::get('create-data-ac', [AcController::class, 'create'])->name('ac.create');
Route::post('create-data-ac', [AcController::class, 'store'])->name('ac.create.post');
Route::get('delete/{id}', [AcController::class, 'destroy'])->name('ac.delete');
Route::get('edit-data-ac/{ac}/edit', [AcController::class, 'edit'])->name('ac.edit');
Route::post('edit-data-ac/{ac}', [AcController::class, 'update'])->name('ac.update');
Route::get('data-ac-export', [AcController::class, 'exportDataAc'])->name('ac.export');
Route::get('data-ac-pdf/{id}', [AcController::class, 'exportDataAcPdf'])->name('ac.export.pdf');
Route::get('data-ac-recycle', [AcController::class, 'recycelBin'])->name('ac.recycle.bin');
Route::get('data-ac-restore/{id}', [AcController::class, 'restore'])->name('ac.restore');
Route::get('data-ac-hapus', [AcController::class, 'hapusPermanent'])->name('ac.hapus.permanent');
Route::post('data-ac-baru', [AcController::class, 'queryDataAcBaru'])->name('ac.baru');
Route::get('grafik-ac', [AcController::class, 'getChart'])->name('chart.getchart');
Route::get('filter-ac', [AcController::class, 'filterData']);

// CHART
Route::get('chart-ac', [ChartAcController::class, 'index'])->name('chart-ac.index');
Route::post('chart-ac/{id}', [ChartAcController::class, 'update'])->name('chart-ac.update');
Route::post('chart-ac', [ChartAcController::class, 'store'])->name('chart-ac.store');
Route::delete('chart-ac/{id}/{tahun}', [ChartAcController::class, 'destroy']);
Route::get('chart-ac/cari', [ChartAcController::class, 'cariTahunChart'])->name('cari.tahun.chart');
Route::get('chart-ac/delete', [ChartAcController::class, 'deleteAllChart'])->name('chart.delete');

// LOGBOOK
Route::get('data-logbook', [LogbookController::class, 'index'])->name('data-logbook.index');
Route::get('data-logbook-create', [LogbookController::class, 'create'])->name('data-logbook.create');
Route::post('data-logbook-store', [LogbookController::class, 'store'])->name('data-logbook.store');
Route::get('logbook/{id}', [LogbookController::class, 'hapus'])->name('data-logbook.hapus');
Route::get('data-logbook/delete-all', [LogbookController::class, 'hapusSemua'])->name('data-logbook.delete.all');
Route::get('data-logbook/{id}/edit', [LogbookController::class, 'edit'])->name('data-logbook.edit');
Route::post('data-logbook/{id}', [LogbookController::class, 'ubah'])->name('data-logbook.ubah');
Route::get('data-logbook-trash', [LogbookController::class, 'trash'])->name('data-logbook.trash');
Route::get('data-logbook-restore/{id}', [LogbookController::class, 'restore'])->name('data-logbook.restore');
Route::get('data-logbook-export-excel', [LogbookController::class, 'exportDataLogbook'])->name('data-logbook.export.excel');
Route::post('logbook/filter', [LogbookController::class, 'filterLogbook']);
Route::get('logbook-filter-kategori', [LogbookController::class, 'filterKategoriLogbook']);
Route::get('logbook-export-pdf/{id}', [LogbookController::class, 'exportDataLogbookPdf'])->name('logbook.export.pdf');


// USER
Route::get('manajemen-users', [UsersController::class, 'index'])->name('users.index');
Route::post('manajemen-users-create', [UsersController::class, 'store'])->name('user.create');
Route::get('manajemen-user-delete/{id}', [UsersController::class, 'destroy'])->name('user.delete');
Route::post('manajemen-user-update', [UsersController::class, 'update'])->name('user.update');


// MENUS
Route::get('manajemen-menus', [MenusController::class, 'index'])->name('menus.index');
Route::post('manajemen-menus-create', [MenusController::class, 'store'])->name('menus.store');
Route::get('manajemen-menus-delete/{id}', [MenusController::class, 'destroy'])->name('menus.delete');
Route::post('manajemen-menus-update', [MenusController::class, 'update'])->name('menus.update');

// SUBMENUS
Route::post('manajemen-submenus-create', [SubmenusController::class, 'store'])->name('submenus.store');
Route::get('manajemen-submenus-delete/{id}', [SubmenusController::class, 'destroy'])->name('submenus.delete');
Route::post('manajemen-submenus-update', [SubmenusController::class, 'update'])->name('submenus.update');

Route::get('manajemen-akses', [AksesController::class, 'index'])->name('akses.index');
Route::get('manajemen-akses-menu/{id}', [AksesController::class, 'menu'])->name('akses.menu.edit');
Route::post('manajemen-akses-menu-update/{id}', [AksesController::class, 'updateMenu'])->name('akses.menu.update');
Route::get('manajemen-akses-submenu/{id}', [AksesController::class, 'submenu'])->name('akses.submenu.edit');
Route::post('manajemen-akses-submenu-update/{id}', [AksesController::class, 'updateSubmenu'])->name('akses.submenu.update');
Route::get('manajemen-akses-fitur/{id}', [AksesController::class, 'fitur'])->name('akses.fitur.edit');
Route::post('manajemen-akses-fitur-update/{id}', [AksesController::class, 'updateFitur'])->name('akses.fitur.update');
Route::post('manajemen-akses-fitur-logbook-update/{id}', [AksesController::class, 'updateFiturLogbook'])->name('akses.fitur.logbook.update');

Route::post('manajemen-fitur-ac-add', [FeaturesAcController::class, 'store'])->name('fitur.ac.store');
Route::get('manajemen-fitur-ac-delete/{id}', [FeaturesAcController::class, 'destroy'])->name('fitur.ac.delete');
Route::post('manajemen-fitur-ac-update', [FeaturesAcController::class, 'update'])->name('fitur.ac.update');


Route::post('manajemen-fitur-logbook-add', [FeatureLogbookController::class, 'store'])->name('fitur.logbook.store');
Route::get('manajemen-fitur-logbook-delete/{id}', [FeatureLogbookController::class, 'destroy'])->name('fiturlog.delete');
Route::post('manajemen-fitur-logbook-update', [FeatureLogbookController::class, 'update'])->name('fitur.logbook.update');
