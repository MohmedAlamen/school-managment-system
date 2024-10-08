<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

use PDF; // تأكد من استيراد Facade


class AttendanceController extends Controller
{
    public function index()
    {

        // جلب جميع الطلاب
        $students = Student::all();

        $attendances = Attendance::with('student')->get();
        return view('attendance', compact('students'));
    }

    //     public function store(Request $request)
    //     {
    //         $validatedData = $request->validate([
    //             'student_id' => 'required|exists:students,id',
    //             'date' => 'required|date',
    //             'present' => 'required|boolean',
    //         ]);

    //         Attendance::create($validatedData);
    //         return redirect('/attendance')->with('success', 'تم تسجيل الحضور بنجاح');
    //     }
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'present' => 'required|boolean', // 1 للحضور و 0 للغياب
        ]);

        // إنشاء سجل الحضور
        Attendance::create([
            'student_id' => $validated['student_id'],
            'date' => $validated['date'],
            'present' => $validated['present'],
        ]);

        // إعادة توجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'تم تسجيل الحضور بنجاح');
    }

    // public function show(Student $student)
    // {
    //     // جلب حضور الطالب
    //     $attendances = $student->attendances;
    //     return view('attendance.show',
    //         compact('student', 'attendances')
    //     );
    // }
    // public function show($student_id)
    // {
    //     $student = Student::findOrFail($student_id);
    //     $attendances = Attendance::where('student_id', $student_id)->get();

    //     return view('attendance.show', compact('student', 'attendances'));
    // }

    public function show(Request $request, $student_id)
    {
        $student = Student::findOrFail($student_id);

        // استعلام لحصر الحضور بناءً على التاريخ
        $query = Attendance::where('student_id', $student_id);

        if ($request->has('start_date') && $request->start_date) {
            $query->where('date', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $query->where('date', '<=', $request->end_date);
        }

        $attendances = $query->get();

        return view('attendance.show', compact('student', 'attendances'));
    }


    public function update(Request $request, $id)
    {
        // التحقق من صحة البيانات المدخلة
        $validated = $request->validate([
            'present' => 'required|boolean',
        ]);

        // جلب سجل الحضور وتحديثه
        $attendance = Attendance::findOrFail($id);
        $attendance->update([
            'present' => $validated['present'],
        ]);

        // إعادة توجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'تم تحديث الحضور بنجاح');
    }

    
}
