<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VariabelController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [VariabelController::class, 'main']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::match(['post', 'delete'], '/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/import-excel', [VariabelController::class, 'importExcel'])->name('import.excel');
    Route::get('/variabels', [VariabelController::class, 'index'])->name('variabels');
    Route::post('/search-variabels', [VariabelController::class, 'searchVariabels'])->name('search.variabels');
    Route::put('/variabel/{id}', [VariabelController::class, 'updateVariabel'])->name('update.variabel');
    Route::get('/get-variabel-values', [VariabelController::class, 'getVariabelValues'])->name('get.variabel.values');
    Route::get('/tahap-dua', [VariabelController::class, 'tahapDua'])->name('tahap.dua');
    Route::post('/tahap-dua', [VariabelController::class, 'updateFunction'])->name('tahap.dua.updateFunction');

    // web.php
    Route::post('/calculate-budget', [VariabelController::class, 'calculateBudget'])->name('tahap.dua.calculateBudget');
});


Route::get('/anggaran', function () {
    return view('adminpage/anggaran');
});
Route::get('/tahap2', function () {
    return view('adminpage/tahap2');
});
Route::get('/', [VariabelController::class, 'Userindex'])->name('user.index');
Route::post('/', [VariabelController::class, 'UserSearch'])->name('user.variabels');

// Route::get('/',[AuthController::class,'Beranda'])->name('welcome');


