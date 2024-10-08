<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // عرض جميع المواد الدراسية
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects', compact('subjects'));
    }

    // عرض صفحة إضافة مادة جديدة
    public function create()
    {
        $classrooms = Classroom::all();
        return view('subjects.create', compact('classrooms'));
    }

    // تخزين مادة جديدة
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classrooms,id',
        ]);

        Subject::create($validatedData);

        return redirect('/subjects')->with('success', 'تم إضافة المادة بنجاح');    
    }

    // عرض صفحة تعديل مادة
    // عرض صفحة تعديل مادة
    public function edit(Subject $subject)
    {
        $teachers = Teacher::all();
        $classrooms = Classroom::all(); // Fetch all classes
        return view('subjects.edit', compact('subject', 'classrooms', 'teachers'));
    }


    // تحديث بيانات المادة
    public function update(Request $request, Subject $subject)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        $subject->update($validatedData);

        return redirect('/subjects')->with('success', 'تم تحديث بيانات المادة بنجاح');
    }

    // حذف مادة
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect('/subjects')->with('success', 'تم حذف المادة بنجاح');
    }
}