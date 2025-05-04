<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class MapController extends Controller
{
    public function index()
    {
        // Return view for the map
        return view('maps.index');
    }

    public function data()
    {
        return Device::select('id', 'ip_address', 'location', 'status')->get();
    }
}
