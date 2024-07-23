<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['section_id', 'quiz_id','question_id'];

    public function section()
    {
        return $this->belongsTo(QuizSection::class, 'section_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }


    public function question()
    {
        return $this->belongsTo(BankQuestion::class);
    }

}
