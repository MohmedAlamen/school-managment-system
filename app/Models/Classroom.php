<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    // إضافة الحقول القابلة للتعبئة
    protected $fillable = ['name', 'section']; // إضافة القسم أيضاً إذا كان موجودًا

    // علاقة الفصل بالطلاب (كل فصل يحتوي على عدة طلاب)
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    // العلاقة مع المواد
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
