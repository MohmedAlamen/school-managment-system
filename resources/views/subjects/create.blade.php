@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">إضافة مادة دراسية جديدة</h1>
        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">اسم المادة</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="class_id" class="block text-sm font-medium">الفصل</label>
                <select id="class_id" name="class_id" class="mt-1 block w-full p-2 border border-gray-300 rounded">
                    @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">إضافة</button>
        </form>
    </div>
</div>
@endsection
