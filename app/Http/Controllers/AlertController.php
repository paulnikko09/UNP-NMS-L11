<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function index()
    {
        return view('alerts.index', ['alerts' => Alert::latest()->paginate(20)]);
    }
}
