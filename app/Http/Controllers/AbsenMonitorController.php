<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbsenLog;

class AbsenMonitorController extends Controller
{
    public function index() {
        $absenmonitor = AbsenLog::latest()->paginate(10);

        return view('monitor', compact('absenmonitor'));
    }    
}
