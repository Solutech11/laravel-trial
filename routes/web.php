<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\app\auth\authController;
use App\Http\Controllers\app\dashboard\dashboardController;
use App\Http\Controllers\app\pages;
use App\Http\Controllers\app\pagesController;
use App\Http\Middleware\authM;
use App\Http\Middleware\validationAuth;

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

Route::get("/about",[pagesController::class, 'aboutPage'])->name("About.Page");

Route::controller(authController::class)->group(function () {

    Route::get("/","loginPage")->name("Login.Page");

    Route::get("/register","registerPage")->name("register.Page");

    
    Route::middleware(authM::class)->group(function(){
        Route::get("/logout", "logoutFunc")->name("logout.Function");
    });

    //post
    Route::middleware(validationAuth::class)->group(function(){
        Route::post("/login", "loginFunc")->name("login.Function");

        Route::post('/register','registerFunc')->name('register.Function');

    });
    
    //passing dynamic data
    Route::get('/hello/{name}', 'hello')->name('hello.page');

    Route::get('/api/query','QueryTry')->name('QueryTry.api');

});

//protected
Route::middleware(authM::class)->group(function(){
    Route::get("/dashboard",[dashboardController::class, 'dashboardPage'])->name("Dashboard.Page");

});


require __DIR__."/appRoutes.php";