@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">إدارة الحضور</h1>
        <form action="/attendance" method="POST">
            @csrf
            <div class="mb-4">
                <label for="student_id" class="block text-sm font-medium">اختر الطالب</label>
                <select id="student_id" name="student_id" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                    <option value="" disabled selected>اختر الطالب</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium">التاريخ</label>
                <input type="date" id="date" name="date" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">الحضور</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="present" value="1" class="form-radio" required>
                        <span class="ml-2">حاضر</span>
                    </label>
                    <label class="inline-flex items-center ml-4">
                        <input type="radio" name="present" value="0" class="form-radio">
                        <span class="ml-2">غائب</span>
                    </label>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">تسجيل الحضور</button>
        </form>

        <!-- إضافة جدول لعرض الحضور لكل طالب -->
        <h2 class="text-lg font-bold mt-6">سجل الحضور</h2>
        <table class="min-w-full bg-white shadow-md rounded my-6">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">الاسم</th>
                    <th class="py-3 px-6 text-left">تاريخ الحضور</th>
                    <th class="py-3 px-6 text-left">حالة الحضور</th>
                    <th class="py-3 px-6 text-center">العمليات</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($students as $student)
                    @foreach ($student->attendances as $attendance)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $student->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $attendance->date }}</td>
                        <td class="py-3 px-6 text-left">
                            @if($attendance->present)
                                <span class="text-green-500">✅ حاضر</span>
                            @else
                                <span class="text-red-500">❌ غائب</span>
                            @endif
                        </td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('attendance.show', $student->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">عرض</a>
                        </td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
