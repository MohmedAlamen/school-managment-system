@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">إدارة المواد الدراسية</h1>
        <a href="/subjects/create" class="bg-blue-500 text-white px-4 py-2 rounded">إضافة مادة</a>
        <table class="min-w-full mt-4 border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border">اسم المادة</th>
                    <th class="px-4 py-2 border">الفصل</th>
                    <th class="px-4 py-2 border">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <td class="px-4 py-2 border">{{ $subject->name }}</td>
                    <td class="px-4 py-2 border">{{ $subject->classroom ? $subject->classroom->name : 'No Classroom' }}</td>
                    <td class="px-4 py-2 border">
                        <a href="/subjects/{{ $subject->id }}/edit" class="bg-yellow-500 text-white px-4 py-2 rounded">تعديل</a>
                        <form action="/subjects/{{ $subject->id }}" method="POST" style="display:inline;">
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
