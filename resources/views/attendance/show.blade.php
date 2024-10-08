@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">سجل الحضور لـ {{ $student->name }}</h1>

    <!-- فورم التصفية -->
    <form method="GET" action="{{ route('attendance.show', $student->id) }}" class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="start_date" class="block text-sm font-medium">من تاريخ</label>
                <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium">إلى تاريخ</label>
                <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">تصفية</button>
            </div>
        </div>
    </form>

    <!-- ملخص الحضور -->
    <div class="bg-blue-100 p-4 rounded mb-6">
        <h2 class="text-xl font-semibold">ملخص الحضور</h2>
        <p class="mt-2">عدد الأيام التي حضرها: <span class="font-bold text-green-600">{{ $attendances->where('present', 1)->count() }}</span></p>
        <p>عدد الأيام التي غاب عنها: <span class="font-bold text-red-600">{{ $attendances->where('present', 0)->count() }}</span></p>
    </div>

    <!-- جدول الحضور -->
    <table class="min-w-full bg-white border border-gray-200 shadow-md rounded">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 px-6 border-b text-right">التاريخ</th>
                <th class="py-3 px-6 border-b text-right">الحضور</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr class="{{ $attendance->present ? 'bg-green-50' : 'bg-red-50' }}">
                    <td class="py-3 px-6 border-b">{{ $attendance->date }}</td>
                    <td class="py-3 px-6 border-b">
                        @if($attendance->present)
                            <span class="text-green-600 font-bold">✅ حاضر</span>
                        @else
                            <span class="text-red-600 font-bold">❌ غائب</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <a href="{{ route('attendance.downloadPdf', $student->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">تحميل PDF</a> --}}
</div>
@endsection
