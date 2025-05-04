<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class PollingController extends Controller
{
    public function index()
    {
        // Show polling results
    }

    public function pollNow(Device $device)
    {
        // Trigger immediate polling job
    }
}
