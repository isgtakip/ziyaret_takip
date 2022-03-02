<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IsgTakipController;


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

Route::post('login',[AuthController::class, 'login']);
Route::post('logout',[AuthController::class, 'logout']);


Route::get('file-import-export', [IsgTakipController::class, 'fileImportExport']);
Route::post('file-import', [IsgTakipController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [IsgTakipController::class, 'fileExport'])->name('file-export');