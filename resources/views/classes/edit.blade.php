@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">تعديل بيانات الفصل</h1>
        <form action="{{ route('classes.update', $classrooms->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">اسم الفصل</label>
                <input type="text" id="name" name="name" value="{{ $classrooms->name }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="section" class="block text-sm font-medium">القسم</label>
                <input type="text" id="section" name="section" value="{{ $classrooms->section }}" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">تحديث</button>
        </form>
    </div>
</div>
@endsection
