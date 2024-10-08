@extends('layouts.app')

@section('content')
<div class="flex">
    <x-sidebar />
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">لوحة التحكم</h1>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-blue-500 p-4 text-white rounded-lg">
                <h2 class="font-bold">عدد الطلاب</h2>
                <p>{{ $studentsCount }}</p>
            </div>
            <div class="bg-green-500 p-4 text-white rounded-lg">
                <h2 class="font-bold">عدد المعلمين</h2>
                <p>{{ $teachersCount }}</p>
            </div>
            <div class="bg-yellow-500 p-4 text-white rounded-lg">
                <h2 class="font-bold">عدد الفصول</h2>
                <p>{{ $classesCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
