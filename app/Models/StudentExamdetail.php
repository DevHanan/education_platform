<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExamdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'quiz_id', 'student_exam_id',
        'question_id', 'answer', 'status', 'approved', 'mark'
    ];

    public function student(){

        return $this->belongsTo(Student::class);
    }

    public function question(){

        return $this->belongsTo(BankQuestion::class,'id','question_id');
    }

    public function quiz(){

        return $this->belongsTo(Quiz::class);
    }
}
