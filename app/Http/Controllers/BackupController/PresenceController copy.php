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
        if(request('kelas')){
            $classroom = Classroom::firstWhere('slug', request('kelas'));
        }

        $index = 1;
        $optionClassroom = Classroom::all();
        $classrooms = Presence::with([
            'mahasiswa' => [
                'user',
                'classroom',
            ],
        ])
            ->filter(request(['kelas'])) 
            ->get()
            ->sortBy('mahasiswa.nim')
            ->groupBy('mahasiswa.classroom.name');

        return view('presence.index', compact('classrooms', 'index', 'optionClassroom'));
    }
}