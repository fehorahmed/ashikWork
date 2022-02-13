<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductUnitController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    //Admin
    Route::get('dashboard',[AdminController::class,'index'])->name('dashboard');
    //Product Unit
    Route::get('admin/product_unit',[ProductUnitController::class,'index'])->name('product_unit.index');
    Route::get('admin/product_unit/create',[ProductUnitController::class,'create'])->name('product_unit.create');
    Route::post('admin/product_unit/store',[ProductUnitController::class,'store'])->name('product_unit.store');
    Route::get('admin/product_unit/edit/{id}',[ProductUnitController::class,'edit'])->name('product_unit.edit');
    Route::post('admin/product_unit/edit',[ProductUnitController::class,'update'])->name('product_unit.update');

});



require __DIR__.'/auth.php';
