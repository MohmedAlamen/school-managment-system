<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers', compact('teachers'));
    }

    public function create()
    {
        // جلب جميع المواد الدراسية
        $subjects = Subject::all();

        // تمرير البيانات إلى الـ view
        return view('teachers.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers',
            'phone' => 'required',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Teacher::create($validatedData);
        return redirect('/teachers')->with('success', 'تم إضافة المعلم بنجاح');
    }

    public function edit($id)
    {
        // جلب المعلم بناءً على الـ id
        $teacher = Teacher::findOrFail($id);

        // جلب جميع المواد الدراسية
        $subjects = Subject::all();

        // تمرير البيانات إلى الـ view
        return view('teachers.edit', compact('teacher', 'subjects'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Teacher::whereId($id)->update($validatedData);
        return redirect('/teachers')->with('success', 'تم تعديل بيانات المعلم بنجاح');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect('/teachers')->with('success', 'تم حذف المعلم بنجاح');
    }
}
