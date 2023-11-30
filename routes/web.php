<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::pattern('role', $int);

Route::group(['prefix' => '/role', 'as' => 'roles.'], function () { 
    Route::get('/', [App\Http\Controllers\RoleController::class, 'index'])->name('index');
    Route::get('/{role}', [App\Http\Controllers\RoleController::class, 'show'])->name('show');
    Route::get('/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('edit');
    Route::put('/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('update');
    Route::get('/create', [App\Http\Controllers\RoleController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\RoleController::class , 'store'])->name('store');
    Route::delete('/{role}', [App\Http\Controllers\RoleController::class , 'destory'])->name('destroy');
    Route::get('/{role}/permissions', [App\Http\Controllers\RoleController::class , 'permissions'])->name('permissions');
    Route::put('/{role}/permissions', [App\Http\Controllers\RoleController::class , 'syncPermissions'])->name('permissions.sync');
});

Route::pattern('event', $int);

Route::group(['prefix' => '/events', 'as' => 'events.'], function () { 
    Route::get('/', [App\Http\Controllers\ActivityController::class, 'activities'])->name('index');
    // Route::get('/{event}', [App\Http\Controllers\ActivityController::class, 'show'])->name('show');
    // Route::get('/{event}/edit', [App\Http\Controllers\ActivityController::class, 'edit'])->name('edit');
    // Route::put('/{activity}/update', [App\Http\Controllers\ActivityController::class, 'update'])->name('update');
    // Route::get('/create', [App\Http\Controllers\ActivityController::class, 'create'])->name('create');
    // Route::post('/', [App\Http\Controllers\ActivityController::class , 'store'])->name('store');
});


