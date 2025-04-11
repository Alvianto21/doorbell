<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index ():View
    {
        return view('login.dashboard',[
            'title' => 'Dashboard',
            'user' => Auth::user()
        ]);
    }

}
