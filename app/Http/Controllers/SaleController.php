<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use App\Models\Machinery;

class SaleController extends Controller
{
    public function create()
    {
        $users = User::all();
        $machinery = Machinery::all();

        return view('sales.create', compact('users', 'machinery'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'machinery_id' => 'required|exists:machinery,id',
            'date' => 'required|date',
            'type' => 'required'
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.create')
            ->with('success', 'Venta registrada correctamente');
    }
}
