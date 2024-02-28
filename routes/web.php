<?php

use App\Http\Livewire\LayananCrud;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\VariabelController;
use App\Http\Controllers\InvoiceGenerateController;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::name('payroll.')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login1')->middleware('guest');
    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'authenticating'])->name('loginAdd')->middleware('guest');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard')->middleware('auth');

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile')->middleware('auth');

    // Route::get('/invoice', function () {
    //     return view('admin.invoice');
    // })->name('invoice')->middleware(['auth','role-agent']);

    Route::get('/gaji',[GajiController::class, 'index'])->name('gaji')->middleware(['auth','role-agent']);
    Route::post('/exportgaji',[GajiController::class, 'gajiExport'])->name('exportgaji')->middleware(['auth','role-agent']);
    Route::post('/importgaji',[GajiController::class, 'gajiImport'])->name('importgaji')->middleware(['auth','role-agent']);

    Route::get('/report-gaji',[GajiController::class, 'reportGaji'])->name('reportGaji')->middleware(['auth','role-agent']);

    // Route::get('/layanan',LayananCrud::class)->name('layanan')->middleware(['auth','role-agent']);
    Route::get('/layanan',[LayananController::class, 'index'])->name('layanan')->middleware(['auth','role-agent']);
    Route::get('/jabatan',[JabatanController::class, 'index'])->name('jabatan')->middleware(['auth','role-agent']);

    Route::get('/pegawai',[LoginController::class, 'index'])->name('pegawai')->middleware(['auth']);
    Route::post('/pegawai',[LoginController::class, 'pegawaiImport'])->name('importpegawai')->middleware(['auth','role-agent']);
    Route::put('/pegawai/update/{id}',[LoginController::class, 'update'])->name('pegawaiUpdate')->middleware(['auth','role-agent']);
    Route::delete('/pegawai/delete/{id}',[LoginController::class, 'delete'])->name('pegawaiDelete')->middleware(['auth','role-agent']);

    Route::get('/variabel',[VariabelController::class, 'index'])->name('variabel')->middleware(['auth','role-agent']);
    Route::post('/variabel',[VariabelController::class, 'variabelImport'])->name('importvariabel')->middleware(['auth','role-agent']);
    // Route::put('/variabel/update/{id}',[VariabelController::class, 'update'])->name('variabelUpdate')->middleware(['auth','role-agent']);
    // Route::delete('/variabel/delete/{id}',[VariabelController::class, 'delete'])->name('variabelDelete')->middleware(['auth','role-agent']);

    Route::get('/generate-invoice',[InvoiceGenerateController::class, 'index'])->name('generate-invoice')->middleware(['auth','role-agent']);
    Route::post('/create-generate-invoice',[InvoiceGenerateController::class, 'generateInvoice'])->name('create-generate-invoice')->middleware(['auth','role-agent']);
    Route::post('/delete-generate-invoice',[InvoiceGenerateController::class, 'deleteGenerateInvoice'])->name('delete-generate-invoice')->middleware(['auth','role-agent']);

    Route::get('/invoice',[InvoiceController::class, 'index'])->name('invoice')->middleware(['auth','role-agent']);
    // Route::put('/invoice/update/{id}',[InvoiceController::class, 'update'])->name('invoiceUpdate')->middleware(['auth','role-agent']);
    // Route::delete('/invoice/delete/{id}',[InvoiceController::class, 'delete'])->name('invoiceDelete')->middleware(['auth','role-agent']);
    Route::post('/exportInvoice',[InvoiceController::class, 'invoiceExport'])->name('exportinvoice')->middleware(['auth','role-agent']);
});