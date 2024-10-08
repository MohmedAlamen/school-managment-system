<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'subject_id']; // تأكد من تضمين جميع الحقول اللازمة

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
