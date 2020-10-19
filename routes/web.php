<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use App\Http\Controllers\itemdynamicController;
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

// Route::get('/', function () {
//     return view('index');
// })->name('index');

Route::get('/',[itemController::class, 'index'])->name('index');

Route::post('/search',[itemController::class, 'search'])->name('search');

Route::get('/item-{itemlookupcode}',[itemController::class, 'itemdetail'])->name('itemdetail');

Route::get('/about',[itemController::class, 'about'])->name('about');
