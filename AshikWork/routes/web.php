<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductUnitController;
use App\Http\Controllers\Admin\SupplierController;
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

    //Supplier Master
    Route::get('admin/supplier',[SupplierController::class,'index'])->name('supplier.index');
    Route::get('admin/supplier/create',[SupplierController::class,'create'])->name('supplier.create');
    Route::post('admin/supplier/store',[SupplierController::class,'store'])->name('supplier.store');
    Route::get('admin/supplier/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit');
    Route::post('admin/supplier/edit',[SupplierController::class,'update'])->name('supplier.update');

    //Product Master
    Route::get('admin/product',[ProductController::class,'index'])->name('product.index');
    Route::get('admin/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('admin/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('admin/product/edit',[ProductController::class,'update'])->name('product.update');

    //Order Master
    Route::get('admin/order',[OrderController::class,'index'])->name('order.index');
    Route::get('admin/order/view/{id}',[OrderController::class,'view'])->name('order.view');
    Route::get('admin/order/create',[OrderController::class,'create'])->name('order.create');
    Route::post('admin/order/store',[OrderController::class,'store'])->name('order.store');
    Route::get('admin/order/edit/{id}',[OrderController::class,'edit'])->name('order.edit');
    Route::post('admin/order/edit',[OrderController::class,'update'])->name('order.update');

});



require __DIR__.'/auth.php';
