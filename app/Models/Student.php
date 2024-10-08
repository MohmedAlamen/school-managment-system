<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'guardian_name',   // اسم ولي الأمر
        'guardian_phone',  // رقم هاتف ولي الأمر
        'email',
        'birth_date',
        'class_id',
    ];

    // علاقة الطالب بالفصل (كل طالب مرتبط بفصل واحد)
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    // تعريف العلاقة مع نموذج الحضور
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
