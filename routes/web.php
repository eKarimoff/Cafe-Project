<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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



Route::get('/',[HomeController::class, 'index']);
Route::get('/redirects',[HomeController::class, 'redirects']);
Route::get('/home',[HomeController::class, 'redirects']);
// Actions for Users
Route::get('/users',[AdminController::class, 'user']);
Route::get('/deleteUser/{id}',[AdminController::class, 'deleteUser']);
Route::get('/foodmenu',[AdminController::class, 'foodmenu'])->name('foodmenu');
// Actions for Foods
Route::post('/uploadfood',[AdminController::class, 'upload']);
Route::get('/deleteFood/{id}',[AdminController::class, 'deleteFood']);
Route::get('/editFood/{id}',[AdminController::class, 'editFood']);
Route::post('/updateFood/{id}',[AdminController::class, 'updateFood']);
// Actions for Chefs
Route::get('/viewchef',[AdminController::class, 'viewchef'])->name('viewchef');
Route::post('/uploadchef',[AdminController::class, 'uploadchef']);
Route::get('/deletechef/{id}',[AdminController::class, 'deletechef']);
Route::get('/editchef/{id}',[AdminController::class, 'editchef']);
Route::post('/updatechef/{id}',[AdminController::class, 'updatechef']);
// Actions for Reservations
Route::post('/makeReservation',[AdminController::class, 'makeReservation']);
Route::get('/admin_reservation',[AdminController::class, 'admin_reservation']);

// Actions for Show Cart
Route::post('/addcart/{id}',[HomeController::class, 'addcart']);
Route::get('/showcart/{id}',[HomeController::class, 'showcart']);
Route::get('/remove/{id}',[HomeController::class, 'remove']);

//Actions for ordering
Route::post('orderconfirm',[HomeController::class, 'orderconfirm']);
Route::get('orders',[AdminController::class, 'orders']);
Route::get('search',[AdminController::class, 'search']);

Route::get('salads',[AdminController::class, 'salads']);
Route::post('makesalad',[AdminController::class, 'makesalad']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
