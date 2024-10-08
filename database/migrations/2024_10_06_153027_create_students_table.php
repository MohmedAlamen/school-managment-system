<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('students')) {
            Schema::create('students', function (Blueprint $table) {
                $table->id(); // عمود معرف الطالب
                $table->string('name'); // اسم الطالب
                $table->string('guardian_name'); // اسم ولي الأمر
                $table->string('guardian_phone')->nullable(); // رقم هاتف ولي الأمر
                $table->string('email')->unique(); // البريد الإلكتروني
                $table->date('birth_date'); // تاريخ الميلاد
                $table->foreignId('class_id')->constrained('classrooms')->onDelete('cascade'); // يجب استخدام foreignId هنا
                $table->timestamps(); // الطوابع الزمنية (تاريخ الإنشاء والتحديث)
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
