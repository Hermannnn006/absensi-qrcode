<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Tables\Presences;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class DataAbsensiController extends Controller
{
    public function index()
    {
        return view('dashboard.dataAbsensi.index',[
            'presences' => Presences::build(),  
        ]);
    }

    public function update(Request $request, Presence $presence)
    {
        $presence->presence_status = $request->presence_status;
        $presence->update();
        Toast::success('Data berhasil diubah!')->autoDismiss(3);
    }
}
