<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classes', compact('classrooms'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'section' => 'required',
        ]);

        Classroom::create($validatedData);
        return redirect('/classes')->with('success', 'تم إضافة الفصل بنجاح');
    }

    public function edit($id)
    {
        $classrooms = Classroom::findOrFail($id);
        return view('classes.edit', compact('classrooms'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'section' => 'required',
        ]);

        Classroom::whereId($id)->update($validatedData);
        return redirect('/classes')->with('success', 'تم تعديل بيانات الفصل بنجاح');
    }

    public function destroy($id)
    {
        $classrooms = Classroom::findOrFail($id);
        $classrooms->delete();
        return redirect('/classes')->with('success', 'تم حذف الفصل بنجاح');
    }
}
