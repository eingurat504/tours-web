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

$int = '^\d+$';

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

Route::pattern('permission', $int);

Route::group(['prefix' => '/permission', 'as' => 'permissions.'], function () { 
    Route::get('/', [App\Http\Controllers\PermissionController::class, 'index'])->name('index');
    Route::get('/{permission}', [App\Http\Controllers\PermissionController::class, 'show'])->name('show');
    Route::get('/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\PermissionController::class , 'store'])->name('store');
    Route::get('/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('edit');
    Route::put('/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('update');
});

Route::pattern('payment', $int);

Route::group(['prefix' => '/payment', 'as' => 'payments.'], function () { 
    Route::get('/', [App\Http\Controllers\PaymentController::class, 'index'])->name('index');
    Route::get('/{payment}', [App\Http\Controllers\PaymentController::class, 'show'])->name('show');
    Route::get('/{payment}/approve', [App\Http\Controllers\PaymentController::class, 'showApprove'])->name('approve.show');
    Route::put('/{payment}/approve', [App\Http\Controllers\PaymentController::class, 'approve'])->name('approve');
    Route::get('/create', [App\Http\Controllers\PaymentController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\PaymentController::class , 'store'])->name('store');
});

Route::pattern('payment_type', $int);

Route::group(['prefix' => '/payment_type', 'as' => 'payment_types.'], function () { 
    Route::get('/', [App\Http\Controllers\PaymentTypeController::class, 'index'])->name('index');
    Route::get('/{payment_type}', [App\Http\Controllers\PaymentTypeController::class, 'show'])->name('show');
    Route::get('/{payment_type}/edit', [App\Http\Controllers\PaymentTypeController::class, 'edit'])->name('edit');
    Route::put('/{payment_type}/update', [App\Http\Controllers\PaymentTypeController::class, 'update'])->name('update');
    Route::get('/create', [App\Http\Controllers\PaymentTypeController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\PaymentTypeController::class , 'store'])->name('store');
});

Route::pattern('booking', $int);

Route::group(['prefix' => '/booking', 'as' => 'bookings.'], function () { 
    Route::get('/', [App\Http\Controllers\BookingController::class, 'index'])->name('index');
    Route::get('/{booking}', [App\Http\Controllers\BookingController::class, 'show'])->name('show');
    Route::get('/{booking}/edit', [App\Http\Controllers\BookingController::class, 'edit'])->name('edit');
    Route::put('/{booking}/update', [App\Http\Controllers\BookingController::class, 'update'])->name('update');
    Route::get('/create', [App\Http\Controllers\BookingController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\BookingController::class , 'store'])->name('store');
    Route::get('/{booking}/approve', [App\Http\Controllers\BookingController::class, 'showApprove'])->name('approve.index');
    Route::put('/{booking}/approve', [App\Http\Controllers\BookingController::class, 'approve'])->name('approve');
    Route::get('/{booking}/reserve', [App\Http\Controllers\BookingController::class, 'showReserve'])->name('reserve.index');
    Route::put('/{booking}/reserve', [App\Http\Controllers\BookingController::class, 'reserve'])->name('reserve');
    Route::get('/{booking}/cancel', [App\Http\Controllers\BookingController::class, 'showCancel'])->name('cancel.index');
    Route::put('/{booking}/cancel', [App\Http\Controllers\BookingController::class, 'cancel'])->name('cancel');
});


Route::pattern('activity', $int);

Route::group(['prefix' => '/activities', 'as' => 'activities.'], function () { 
    Route::get('/', [App\Http\Controllers\ActivityController::class, 'index'])->name('index');
    Route::get('/{activity}', [App\Http\Controllers\ActivityController::class, 'show'])->name('show');
    Route::get('/{activity}/edit', [App\Http\Controllers\ActivityController::class, 'edit'])->name('edit');
    Route::put('/{activity}/update', [App\Http\Controllers\ActivityController::class, 'update'])->name('update');
    Route::get('/create', [App\Http\Controllers\ActivityController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\ActivityController::class , 'store'])->name('store');
});

Route::pattern('user', $int);

Route::group(['prefix' => '/user', 'as' => 'users.'], function () { 
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
    Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('show');
    Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::put('/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\UserController::class , 'store'])->name('store');
});


