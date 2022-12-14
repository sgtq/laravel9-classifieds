<?php

use App\Http\Controllers\ListingController;
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

Route::get('/', [\App\Http\Controllers\Frontend\ListingController::class, 'welcome'])->name('welcome');

Route::get('/all-listings', [\App\Http\Controllers\Frontend\ListingController::class, 'index'])
    ->name('all-listings');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin Resources
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth:sanctum', 'role:admin'],
    'name' => 'admin.',
], function() {
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('subcategories', \App\Http\Controllers\Admin\SubCategoryController::class);
        Route::resource('childcategories', \App\Http\Controllers\Admin\ChildCategoryController::class);
        Route::resource('conditions', \App\Http\Controllers\Admin\ConditionController::class);
        Route::resource('countries', \App\Http\Controllers\Admin\CountryController::class);
        Route::resource('states', \App\Http\Controllers\Admin\StateController::class);
        Route::put('states/status/{state_id}', [\App\Http\Controllers\Admin\StateController::class, 'status'])->name('states.status');
        Route::resource('cities', \App\Http\Controllers\Admin\CityController::class);
    }
);

Route::resource('listings', ListingController::class)->middleware('auth');
