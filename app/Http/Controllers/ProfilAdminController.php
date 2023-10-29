<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class ProfilAdminController extends Controller
{
    public function index()
    {
        $admin = User::findOrFail(auth()->user()->id);
        return view('profilAdmin.index', compact('admin'));
    }

    public function edit(User $user)
    { 
        return view('profilAdmin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $userValidated = $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email:rfc'
        ]);
        $user->update($userValidated);
        Toast::success('Profil berhasil diubah!')->autoDismiss(3);
        return back();
    }
}
