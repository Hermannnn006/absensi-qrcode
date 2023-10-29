<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Validation\Rules\Password;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfilController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['user', 'classroom'])->where('user_id', auth()->user()->id)->get();
        return view('profil.index', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load(['user', 'classroom']);
        $classrooms = Classroom::all();
        return view('profil.edit', compact('mahasiswa', 'classrooms'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $user = User::findOrFail(auth()->user()->id);
        $mahasiswaValidated = $request->validate([
                'nim' => 'required|numeric|max_digits:10|unique:mahasiswas,nim,'.auth()->user()->id,
                'classroom_id' => 'required'
            ], [
                'nim.required' => 'Nim tidak boleh kosong',
                'nim.unique' => 'Nim telah terdaftar',
                'nim.numeric' => 'Nim hanya boleh angka',
                'nim.max_digits' => 'Nim hanya boleh maximal sepuluh angka',
            ]
        );

        $request->validate([
                'user.name' => 'required|max:255|string',
                'user.email' => 'required|email:rfc'
            ], [
                'user.name.required' => 'Nama tidak boleh kosong',
                'user.email.required' => 'Email tidak boleh kosong',
                'user.email.email' => 'Format email tidak valid'
            ]
        );
        $mahasiswa->update($mahasiswaValidated);
        $user->update([
            'name' => $request->input('user.name'),
            'email' => $request->input('user.email')
        ]);
        Toast::success('Profil berhasil diubah!')->autoDismiss(3);
        return back();
    }

    public function generateIdCard()
    {
        $mahasiswa = Mahasiswa::with(['user', 'classroom'])->where('user_id', auth()->user()->id)->get();
        $qrCode = QrCode::size(150)
            ->margin(1)
            ->generate($mahasiswa[0]->nim, public_path('img/' . $mahasiswa[0]->nim . '.svg'));

        $pdf = Pdf::loadView('profil.id-card', compact('mahasiswa', 'qrCode'));
        return $pdf->download($mahasiswa[0]->user->name . '.pdf');
    }
}