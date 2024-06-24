<?php

namespace App\Http\Controllers\app\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dashboardController extends Controller
{
    //dashboard
    public function dashboardPage(){

        

        return view('app.pages.dashboard.dashboardPage');
    }
}
