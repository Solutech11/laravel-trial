<?php

use App\Http\Controllers\Sample\sampleController;
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

Route::get('/', [sampleController::class, 'index'])->name('index.page');

//grouped controllers
Route::controller(sampleController::class)->group(function(){
    Route::get('/about', 'about')->name('about.page');
    Route::get('/info', 'info')->name('info.page');

});




//pefix allows grouping of routes like /api/about, /api/info.... these are enables all the routes under it to have api in front
Route::prefix("user")->group(function(){//group is meant for grouping

    Route::get('/about', function () {
        $names=["hika","lio"];
        return view('about',compact("names"));
    });

    Route::get('/info', function () {
        return view('info');
    });

    //{name} ---- is a dynamic route, to pars data from routes
    Route::get('/welcome/{name}', function ($name) {
        return view('welcome2',compact("name"));
    });
});



//any custom route files must be at the buttom
require __DIR__."/appRoutes.php";