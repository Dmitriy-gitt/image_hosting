<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FileController, ViewFileController, ZipFileController, GetFileController};

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

Route::get('/start', [FileController::class, 'index'])
    ->name('start');

Route::get('/viewing', [ViewFileController::class, 'index'])
    ->name('viewing.file');

Route::get('original/{filename}', [ViewFileController::class, 'GetOriginalPhoto'])
    ->name('view.original');

Route::get('zip/{id}', [ZipFileController::class, 'download'])
    ->name('zip.file');

Route::post('/dowfile/post', [FileController::class, 'download'])
    ->name('download.file');

Route::get('get/{id}', [GetFileController::class, 'getById']);

Route::get('get', [GetFileController::class, 'findAll']);

Route::delete('/delete/{id}', [FileController::class, 'destroy'])->name('file.delete');





