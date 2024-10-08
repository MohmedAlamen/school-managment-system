{{-- <!-- resources/views/attendance/pdf.blade.php -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>سجل الحضور لـ {{ $student->name }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            direction: rtl;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h2>سجل الحضور لـ {{ $student->name }}</h2>
    <table>
        <thead>
            <tr>
                <th>التاريخ</th>
                <th>الحضور</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->present ? 'حاضر' : 'غائب' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}
