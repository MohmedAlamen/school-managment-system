<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom; // ا��تيراد موديل الفص
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students', compact('students'));
    }

    public function create()
    {
        $classrooms = Classroom::all(); // الحصول على جميع الفصول
        return view('students.create', compact('classrooms')); // تمرير المتغير إلى العرض
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'guardian_name' => 'required',  // تحقق من إدخال اسم ولي الأمر
            'guardian_phone' => 'required', // تحقق من إدخال رقم هاتف ولي الأمر
            'email' => 'required|email|unique:students',
            'birth_date' => 'required|date',
            'class_id' => 'required|exists:classrooms,id',
        ]);

        Student::create($validatedData);
        return redirect('/students')->with('success', 'تم إضافة الطالب بنجاح');
    }

    public function edit($id)
    {
        // جلب الطالب بناءً على الـ ID
        $student = Student::findOrFail($id);

        // جلب جميع الفصول الدراسية
        $classrooms = Classroom::all();

        // تمرير البيانات إلى الـ view
        return view('students.edit', compact('student', 'classrooms'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'guardian_name' => 'required',  // تحقق من إدخال اسم ولي الأمر
            'guardian_phone' => 'required', // تحقق من إدخال رقم هاتف ولي الأمر
            'email' => 'required|email',
            'birth_date' => 'required|date',
            'class_id' => 'required',
        ]);

        Student::whereId($id)->update($validatedData);
        return redirect('/students')->with('success', 'تم تعديل بيانات الطالب بنجاح');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/students')->with('success', 'تم حذف الطالب بنجاح');
    }
}
