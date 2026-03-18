<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;

class ServiceController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('services.create', compact('users'));
    }

    public function store(Request $request)
    {
        Service::create($request->all());

        return redirect()->route('services.create')
            ->with('success', 'Registro exitoso');
    }
}
