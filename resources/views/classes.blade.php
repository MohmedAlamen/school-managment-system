@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">إدارة الفصول</h1>
        <a href="{{ route('classes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">إضافة فصل جديد</a>
        <table class="mt-4 w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">الاسم</th>
                    <th class="px-4 py-2">القسم</th>
                    <th class="px-4 py-2">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classrooms as $classroom)
                <tr>
                    <td class="border px-4 py-2">{{ $classroom->name }}</td>
                    <td class="border px-4 py-2">{{ $classroom->section }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('classes.edit', $classroom->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">تعديل</a>
                        <form action="{{ route('classes.destroy', $classroom->id) }}" method="POST" class="inline-block">
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
