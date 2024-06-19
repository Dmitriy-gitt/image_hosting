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

Route::get('/start', [FileController::class, 'index'])
    ->middleware('auth')
    ->name('start');

Route::get('/viewing', [ViewFileController::class, 'index'])
    ->middleware('auth')
    ->name('viewing.file');

Route::get('original/{filename}', [ViewFileController::class, 'GetOriginalPhoto'])
    ->middleware('auth')
    ->name('view.original');

Route::get('zip/{id}', [ZipFileController::class, 'download'])
    ->name('zip.file');

Route::post('/dowfile/post', [FileController::class, 'download'])
    ->name('download.file');

Route::get('get/{id}', [GetFileController::class, 'getById']);

Route::get('get', [GetFileController::class, 'findAll']);

Route::delete('/delete/{id}', [FileController::class, 'destroy'])->name('file.delete');





