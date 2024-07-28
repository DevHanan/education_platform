<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExamdetail extends Model
{
    use HasFactory;
    protected $fillable =['student_id','quiz_id','student_exam_id','question_id','answer','status','approved','mark'];

}
