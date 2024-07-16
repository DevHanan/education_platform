<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuestion extends Model
{
    use HasFactory;
    protected $fillable =['student_id','quiz_id','answer','question_id','section_id','status'];

    public function question(){
        return $this->belongsTo(BankQuestion::class,'question_id','id');
    }
}
