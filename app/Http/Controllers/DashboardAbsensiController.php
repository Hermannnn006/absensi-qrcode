<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAbsensiController extends Controller
{
    public function index()
    {
        return view('dashboard.absensi.index');
    }
}
