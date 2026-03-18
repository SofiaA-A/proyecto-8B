<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
    return view('courses.index'); // sin $courses
    }

    public function cargarDT()
    {
    $courses = Course::select('id','name','description','capacity','status')->get();
    return response()->json($courses);
    }

    public function create()
    {
        return view('courses.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'capacity' => 'required|numeric|min:1',
            'status' => 'required|in:active,inactive'
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Curso registrado correctamente');
    }


    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'capacity' => 'required|numeric|min:1',
            'status' => 'required|in:active,inactive'
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Curso actualizado correctamente');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete(); // SoftDeletes

        return redirect()->route('courses.index')
            ->with('success', 'Curso eliminado correctamente');
    }
}
