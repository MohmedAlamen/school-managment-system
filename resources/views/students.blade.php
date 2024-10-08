@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">إدارة الطلاب</h1>
        <a href="/students/create" class="bg-blue-500 text-white px-4 py-2 rounded">إضافة طالب</a>
        <table class="min-w-full mt-4 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">اسم الطالب</th>
                    <th class="px-4 py-2 border">اسم ولي أمر الطالب</th>
                    <th class="px-4 py-2 border">رقم هاتف ولي أمر الطالب</th>
                    <th class="px-4 py-2 border">البريد الإلكتروني</th>
                    <th class="px-4 py-2 border">تاريخ الميلاد</th>
                    <th class="px-4 py-2 border">الفصل</th>
                    <th class="px-4 py-2 border">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td class="px-4 py-2 border">{{ $student->name }}</td>
                    <td class="px-4 py-2 border">{{ $student->guardian_name }}</td> <!-- اسم ولي الأمر -->
                    <td class="px-4 py-2 border">{{ $student->guardian_phone }}</td> <!-- رقم هاتف ولي الأمر -->
                    <td class="px-4 py-2 border">{{ $student->email }}</td>
                    <td class="px-4 py-2 border">{{ $student->birth_date }}</td> <!-- تاريخ الميلاد -->
                    <td class="px-4 py-2 border">{{ $student->classroom ? $student->classroom->name : 'غير مرتبط بفصل' }}</td>
                    <td class="px-4 py-2 border">
                        <a href="/students/{{ $student->id }}/edit" class="bg-yellow-500 text-white px-4 py-2 rounded">تعديل</a>
                        <form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
