<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\Cloner\Stub;

class StudentExam extends Model
{
    use HasFactory;
    protected $fillable =['student_id','quiz_id','date','passed','approved','totalmark','studentmark'];

    public function student(){

        return $this->belongsTo(Student::class);
    }

    public function quiz(){

        return $this->belongsTo(Quiz::class);
    }


    public function studentresult()
    {
        return $this->hasMany(StudentExamdetail::class);
    }

}
