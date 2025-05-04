<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Return dashboard view with aggregated data
        return view('dashboard');
    }
}
