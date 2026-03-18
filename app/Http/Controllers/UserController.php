<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'rol' => 'required'
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password), // 🔐 IMPORTANTE
            'rol' => $request->rol
        ]);

        return redirect()->route('users.create')
            ->with('success', 'Usuario registrado correctamente');
    }
}
