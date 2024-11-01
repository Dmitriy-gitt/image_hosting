<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FileController, ViewFileController, ZipFileController, GetFileController, LoginRegisterControllers};

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

Route::controller(LoginRegisterControllers::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['prefix' => 'host', 'middleware' => ['auth']], function() {

    Route::get('start', [FileController::class, 'index'])->name('start');

    Route::get('viewing', [ViewFileController::class, 'index'])->name('viewing.file');

    Route::get('original/{filename}', [ViewFileController::class, 'GetOriginalPhoto'])->name('view.original');

    Route::get('zip/{id}', [ZipFileController::class, 'download'])->name('zip.file');

    Route::post('/dowfile/post', [FileController::class, 'download'])->name('download.file');

    Route::delete('/delete/{id}', [FileController::class, 'destroy'])->name('file.delete');
});





