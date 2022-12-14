<?php

use Illuminate\Support\Facades\Route;

            // motomoto001
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

            // motomoto001
Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
            // motomoto001
// Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');
Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::POST('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::POST('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

Route::get('/order', [AdminController::class, 'order']);
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);
Route::get('/print_pdf/{id}', [AdminController::class, 'print_pdf']);
Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
Route::post('/send_email_user/{id}', [AdminController::class, 'send_email_user']);
Route::get('/search', [AdminController::class, 'search']);




Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::POST('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
// Route::get('/cash_order/{id}', [HomeController::class, 'cash_order']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('/stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/product', [HomeController::class, 'product']);
Route::get('/show_order', [HomeController::class, 'show_order']);
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);
Route::POST('/add_comment', [HomeController::class, 'add_comment']);
Route::POST('/add_reply/', [HomeController::class, 'add_reply']);


Route::get('/welcome', function () {
    return view('welcome');
});