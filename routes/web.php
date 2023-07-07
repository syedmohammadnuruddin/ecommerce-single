<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'adminDashboard'])->name('adminDashboard');

    Route::get('/admin/dashboard/allcategory',[\App\Http\Controllers\CategoryController::class,'allCategory'])->name('allCategory');
    Route::get('/admin/dashboard/addcategory',[\App\Http\Controllers\CategoryController::class,'addCategory'])->name('addCategory');
    Route::post('/admin/dashboard/store-category',[\App\Http\Controllers\CategoryController::class,'storeCategory'])->name('storeCategory');
    Route::get('/admin/dashboard/edit-category/{id}',[\App\Http\Controllers\CategoryController::class,'editCategory'])->name('editCategory');
    Route::post('/admin/dashboard/update-category',[\App\Http\Controllers\CategoryController::class,'updateCategory'])->name('updateCategory');

    Route::get('/admin/dashboard/allsubcategory',[\App\Http\Controllers\SubCategoryController::class,'allSubCategory'])->name('allSubCategory');
    Route::get('/admin/dashboard/addsubcategory',[\App\Http\Controllers\SubCategoryController::class,'addSubCategory'])->name('addSubCategory');

    Route::get('/admin/dashboard/allproduct',[\App\Http\Controllers\ProductController::class,'allProduct'])->name('allProduct');
    Route::get('/admin/dashboard/addproduct',[\App\Http\Controllers\ProductController::class,'addProduct'])->name('addProduct');

    Route::get('/admin/dashboard/order',[\App\Http\Controllers\OrderController::class,'order'])->name('order');
});


require __DIR__.'/auth.php';
