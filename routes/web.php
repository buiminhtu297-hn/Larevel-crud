<?php

use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\TodosExportController;
use App\Http\Controllers\TodosImportController;

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

Route::get('/', [TodosController::class, 'index']);
Route::get('/list', [TodosController::class, 'index']);
Route::get('/todos/{todo}', [TodosController::class, 'show']);
Route::get('/new-todos', [TodosController::class, 'create']);
Route::post('/store-todos', [TodosController::class, 'store']);
Route::get('/todos/{todo}/edit', [TodosController::class, 'edit']);
Route::post('/todos/{todo}/update-todos', [TodosController::class, 'update']);
Route::get('/todos/{todo}/delete', [TodosController::class, 'destroy']);
Route::get('/export', [TodosExportController::class, 'export']);
Route::get('/import', [TodosImportController::class, 'show']);
Route::post('/import', [TodosImportController::class, 'store']);







