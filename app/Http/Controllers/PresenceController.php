<?php

namespace App\Http\Controllers;

use App\Tables\Presences;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        return view('presence.index', [
            'presences' => Presences::class,  
        ]);
    }
}