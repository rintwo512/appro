<?php

use App\Http\Controllers\AcController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

Route::get('/data-apar', fn () => 'data apar');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/logout/{id}', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index']);


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
Route::get('chart-ac', [AcController::class, 'getChart'])->name('chart.getchart');
Route::get('filter-ac', [AcController::class, 'filterData']);

// Route::resource('ac', AcController::class);
