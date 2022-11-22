<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);
Route::resource('childcategories', ChildCategoryController::class);
Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
Route::resource('states', \App\Http\Controllers\Admin\StateController::class);
Route::resource('cities', \App\Http\Controllers\Admin\CityController::class);
