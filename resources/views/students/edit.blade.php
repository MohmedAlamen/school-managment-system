@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">تعديل بيانات الطالب</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">اسم الطالب</label>
                <input type="text" id="name" name="name" value="{{ $student->name }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="guardian_name" class="block text-sm font-medium">اسم ولي الأمر</label>
                <input type="text" id="guardian_name" name="guardian_name" value="{{ $student->guardian_name }}" class="mt-1 block w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="guardian_phone" class="block text-sm font-medium">رقم هاتف ولي الأمر</label>
                <input type="text" id="guardian_phone" name="guardian_phone" value="{{ $student->guardian_phone }}" class="mt-1 block w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" value="{{ $student->email }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="birth_date" class="block text-sm font-medium">تاريخ الميلاد</label>
                <input type="date" id="birth_date" name="birth_date" value="{{ $student->birth_date }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="class_id" class="block text-sm font-medium">الفصل الدراسي</label>
                <select id="class_id" name="class_id" class="mt-1 block w-full p-2 border border-gray-300 rounded">
                    @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}" {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">تحديث</button>
        </form>
    </div>
</div>
@endsection
