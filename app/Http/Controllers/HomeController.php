<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'superuser') { // superuser
            return view('superadmin.dashboard.index');
        } else if (Auth::user()->role == 'sales') { // sales
            return view('sales.dashboard.index');
        } else if (Auth::user()->role == 'purchase') { // purchase
            return view('purchase.dashboard.index');
        } else if (Auth::user()->role == 'manager') { // manager
            return view('manager.dashboard.index');
        } else {
            return view('home');
        }
    }
}
