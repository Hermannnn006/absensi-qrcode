<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function index()
    {
        //select mahasiswa yang login 
        //cek apakah ada data absensi pada hari ini
        $check = Mahasiswa::where('user_id', auth()->user()->id)
            ->whereHas('presences', function (Builder $query) {
                $query->where('created_at', 'LIKE','%'.date('Y-m-d', time()).'%');
                })->doesntExist();
        //$check akan bernilai true jika data tidak ada

        return view('dashboard.index', compact('check'));
    }
}
