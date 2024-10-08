<?php

namespace App\Http\Controllers;

use App\Models\Student; // أو النموذج المناسب للطلاب
use App\Models\Teacher; // أو النموذج المناسب للمعلمين
use App\Models\Classroom; // أو النموذج المناسب للفصول

class HomeController extends Controller
{
    public function index()
    {
        // جلب عدد الطلاب، المعلمين، والفصول من قاعدة البيانات
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        $classesCount = Classroom::count();

        // تمرير البيانات إلى العرض
        return view('home', compact('studentsCount', 'teachersCount', 'classesCount'));
    }
}
