@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">إدارة المعلمين</h1>
        <a href="/teachers/create" class="bg-blue-500 text-white px-4 py-2 rounded">إضافة معلم</a>
        <table class="min-w-full mt-4 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">الاسم</th>
                    <th class="px-4 py-2 border">رقم الهاتف</th>
                    <th class="px-4 py-2 border">البريد الإلكتروني</th>
                    <th class="px-4 py-2 border">المادة</th>
                    <th class="px-4 py-2 border">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr>
                    <td class="px-4 py-2 border">{{ $teacher->name }}</td>
                    <td class="px-4 py-2 border">{{ $teacher->phone }}</td>
                    <td class="px-4 py-2 border">{{ $teacher->email }}</td>
                    <td class="px-4 py-2 border">{{ $teacher->subject->name }}</td>
                    <td class="px-4 py-2 border">
                        <a href="/teachers/{{ $teacher->id }}/edit" class="bg-yellow-500 text-white px-4 py-2 rounded">تعديل</a>
                        <form action="/teachers/{{ $teacher->id }}" method="POST" style="display:inline;">
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
