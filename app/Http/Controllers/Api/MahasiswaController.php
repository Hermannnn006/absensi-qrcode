<?php

namespace App\Http\Controllers\Api;

use App\Models\Presence;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PresenceResource;
use App\Http\Resources\MahasiswaResource;
use Illuminate\Database\Eloquent\Builder;

class MahasiswaController extends Controller
{
    public function index()
    { 
        $mahasiswa = Mahasiswa::all();
        return MahasiswaResource::collection($mahasiswa->load(['user:id,name', 'classroom:id,name']));
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return new MahasiswaResource($mahasiswa->load(['user:id,name', 'classroom:id,name']));
    }

    public function store(Request $request){
        $validator = $request->validate([
           'mahasiswa_id' => 'required|numeric',
           'presence_status' => 'required'
        ]);
        $presence = Presence::create($validator);
        return response()->json('absensi berhasil');
    }

    public function getPresences()
    {
        $presence = Presence::with([
            'mahasiswa' => [
                'user',
                'classroom',
            ],
        ])->latest()->limit(5)->get();
        return PresenceResource::collection($presence);
    }

    public function checkMahasiswa($nim)
    {
        $check = Mahasiswa::where('nim', $nim)->exists();
        return response()->json($check);
    }

    public function checkPresence($nim)
    {
        $time = date('Y-m-d', time());
        $check = Presence::where('created_at', 'LIKE','%'.$time.'%')->whereHas('mahasiswa', function (Builder $query) use ($nim) {
            $query->where('nim', $nim);
        })->doesntExist();
        return response()->json($check);
    }
}