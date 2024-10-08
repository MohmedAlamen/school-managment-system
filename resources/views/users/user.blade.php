@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <!-- العنوان الرئيسي -->
    <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">مرحبا بك في مدرسة المسعودية النموذجية</h1>
    
    <!-- قسم البطاقات (Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- بطاقة الطلاب -->
        <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">الطلاب</h2>
            <p class="text-gray-600">إدارة الطلاب ومتابعة الحضور والغياب.</p>
            <a href="{{ route('students.index') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">عرض المزيد</a>
        </div>
        
        <!-- بطاقة المعلمين -->
        <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">المعلمين</h2>
            <p class="text-gray-600">إدارة المعلمين وتنظيم جداولهم.</p>
            <a href="{{ route('teachers.index') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">عرض المزيد</a>
        </div>

        <!-- بطاقة الصفوف الدراسية -->
        <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">الصفوف الدراسية</h2>
            <p class="text-gray-600">عرض وتنظيم الصفوف الدراسية وجداول الحصص.</p>
            <a href="{{ route('classes.index') }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">عرض المزيد</a>
        </div>
    </div>
    
    <!-- قسم إحصائيات أو ملخص -->
    <div class="mt-12">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">إحصائيات المدرسة</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- عدد الطلاب -->
            <div class="bg-green-100 p-6 rounded-lg shadow-md text-center">
                <h3 class="text-3xl font-bold text-green-600">{{ $studentsCount }}</h3>
                <p class="text-gray-700">عدد الطلاب</p>
            </div>

            <!-- عدد المعلمين -->
            <div class="bg-blue-100 p-6 rounded-lg shadow-md text-center">
                <h3 class="text-3xl font-bold text-blue-600">{{ $teachersCount }}</h3>
                <p class="text-gray-700">عدد المعلمين</p>
            </div>

            <!-- عدد الصفوف الدراسية -->
            <div class="bg-yellow-100 p-6 rounded-lg shadow-md text-center">
                <h3 class="text-3xl font-bold text-yellow-600">{{ $classesCount }}</h3>
                <p class="text-gray-700">عدد الصفوف الدراسية</p>
            </div>
        </div>
    </div>
</div>
@endsection
