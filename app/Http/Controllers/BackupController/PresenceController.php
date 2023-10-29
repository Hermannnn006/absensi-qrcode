<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class PresenceController extends Controller
{
    public function index()
    {
        $judul = 'Semua Kelas';
        $index = 1;
        $optClassrooms = Classroom::all();

        if(request('kelas')){
            $classroom = Classroom::firstWhere('slug', request('kelas'));
            $judul = $classroom->name;
        }
        
        $classrooms = Presence::with([
            'mahasiswa' => [
                'user',
                'classroom',
            ],
        ])
            ->filter(request(['kelas', 'cari', 'tanggal']))
            ->get()
            ->sortBy('mahasiswa.nim')
            ->groupBy('mahasiswa.classroom.name');

        return view('presence.index', compact('classrooms', 'optClassrooms', 'judul', 'index'));
    }
}