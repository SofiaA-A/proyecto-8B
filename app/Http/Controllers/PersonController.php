<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\person;
use App\Models\User;

class PersonController extends Controller
{
    public function create()
    {
        //SOLO usuarios que NO tienen persona
        $users = User::doesntHave('person')->get();

        return view('people.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'rfc' => 'required|unique:people,rfc',
            'tell' => 'required',
            'user_id' => 'required|unique:people,user_id'
        ]);

        Person::create($request->all());

        return redirect()->route('people.create')
            ->with('success', 'Persona registrada correctamente');
    }
}
