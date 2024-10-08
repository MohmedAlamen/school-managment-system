<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class_id']; // تأكد من تضمين جميع الحقول اللازمة

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}
