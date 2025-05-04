<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        return view('devices.index', ['devices' => Device::all()]);
    }

    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }
}
