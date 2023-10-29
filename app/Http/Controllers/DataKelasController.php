<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Tables\Classrooms;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class DataKelasController extends Controller
{
    public function index()
    {
        return view('dashboard.dataKelas.index',[
            'classrooms' => Classrooms::build()
        ]);
    }

    public function create()
    {
        return view('dashboard.dataKelas.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate(
            ['name' => 'required|max:255|unique:classrooms'],
            ['name.required' => 'Nama kelas tidak boleh kosong']
    );
        $validated['slug'] = Str::of($request->name)->slug('-');
        Classroom::create($validated);
        Toast::title('Data berhasil disimpan!')->autoDismiss(3);
        return redirect('/dashboard/data-kelas');
    }

    public function edit(Classroom $classroom)
    {
        return view('dashboard.dataKelas.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $validated = $request->validate(
            ['name' => 'required|max:255|unique:classrooms,name,'.$classroom->id,],
            ['name.required' => 'Nama kelas harus diisi']
        );
        $validated['slug'] = Str::of($request->name)->slug('-');
        $classroom->update($validated);
        Toast::success('Data berhasil diubah!')->autoDismiss(3);
        return redirect('/dashboard/data-kelas');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        Toast::danger('Data kelas berhasil dihapus!')->autoDismiss(3);
        return redirect('/dashboard/data-kelas');
    }
}
