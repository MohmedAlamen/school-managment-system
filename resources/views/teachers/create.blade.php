@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">إضافة معلم جديد</h1>
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">اسم المعلم</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium">رقم الهاتف</label>
                <input type="text" id="phone" name="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="subject_id" class="block text-sm font-medium">المادة الدراسية</label>
                <select id="subject_id" name="subject_id" class="mt-1 block w-full p-2 border border-gray-300 rounded">
                    @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">إضافة</button>
        </form>
    </div>
</div>
@endsection
