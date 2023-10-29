<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classroom;
use App\Models\Mahasiswa;
use App\Tables\Mahasiswas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Validation\Rules\Password;

class DataMahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswas::build();
        return view('dashboard.dataMahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('dashboard.dataMahasiswa.create', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Password::defaults()],
            'classroom_id' => 'required',
            'nim' => 'required|numeric|max_digits:10|unique:'.Mahasiswa::class,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'classroom_id' => $request->classroom_id,
            'nim' => $request->nim
        ]);
        Toast::success('Data mahasiswa berhasil disimpan!')->autoDismiss(3);
        return back();
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $classrooms = Classroom::all();
        return view('dashboard.dataMahasiswa.edit', compact('mahasiswa', 'classrooms'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $user = User::findOrFail($mahasiswa->user_id);
        $mahasiswaValidated = $request->validate([
                'nim' => 'required|numeric|max_digits:10|unique:mahasiswas,nim,'.$mahasiswa->id,
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
            'user.email' => 'required|email:rfc,dns'
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
        Toast::success('Data mahasiswa berhasil diubah!')->autoDismiss(3);
        return back();
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $user = User::findOrFail($mahasiswa->user_id);
        $mahasiswa->delete();
        $user->delete();
        Toast::danger('Data mahasiswa berhasil dihapus!')->autoDismiss(3);
        return back();
    }
}