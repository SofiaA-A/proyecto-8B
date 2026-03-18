<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machinery;
use Illuminate\Support\Facades\Storage;


class MachineryController extends Controller
{
    public function index()
    {
        return view('machinery.index');
    }

    public function cargarDT()
    {
        $machinery = Machinery::select('id','name','model','status','serial_number','image')->get();
        return response()->json($machinery);
    }

    public function create()
    {
        return view('machinery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'status' => 'required',
            'serial_number' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();


        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('storage/images'), $imageName);

            $data['image'] = $imageName;
        }

        Machinery::create($data);

        return redirect()->route('machinery.index')
            ->with('success', 'Maquinaria registrada correctamente');
    }

    public function edit($id)
    {
        $machinery = Machinery::findOrFail($id);
        return view('machinery.edit', compact('machinery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'status' => 'required',
            'serial_number' => 'required|unique:machinery,serial_number,' . $id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $machinery = Machinery::findOrFail($id);
        $data = $request->all();


         if ($request->hasFile('image')) {


        if ($machinery->image && file_exists(public_path('storage/images/' . $machinery->image))) {
            unlink(public_path('storage/images/' . $machinery->image));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();

        $image->move(public_path('storage/images'), $imageName);

        $data['image'] = $imageName;
    }

        $machinery->update($data);

        return redirect()->route('machinery.index', $id)
            ->with('success', 'Registro actualizado correctamente');
    }

    public function destroy($id)
    {
        $machinery = Machinery::findOrFail($id);

        if ($machinery->image && Storage::exists('public/images/' . $machinery->image)) {
            Storage::delete('public/images/' . $machinery->image);
        }

        $machinery->delete();

        return redirect()->route('machinery.index')
            ->with('success', 'Registro eliminado correctamente');
    }
}
