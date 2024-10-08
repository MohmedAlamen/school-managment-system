<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // تحديد الحقول المسموح بتخصيصها جماعياً
    protected $fillable = [
        'student_id',  // أضف الحقل هنا
        'date',        // إذا كان لديك حقول أخرى يمكنك إضافتها هنا أيضاً
        'present',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
