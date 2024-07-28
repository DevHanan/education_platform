<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankQuestion extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'title', 'mark', 'bank_group_id', 'active', 'model_answer', 'answer_notes',
        'answer_video_link', 'question_video_link', 'question_provider', 'answer_provider', 'question_notes', 'answer1', 'answer2', 'answer3', 'answer4', 'correct_answer'
    ];

    protected $appends = ['pictureFullPath', 'questionFullPath', 'answerFullPath', 'customTitle'];



    public function getPictureFullPathAttribute($value)
    {

        if ($this->picture)
            return asset('public/' . $this->picture);
        else
            return asset('public/uploads/bankquestions/default.png');
    }



    public function getcustomTitleAttribute($value)
    {

        return  strip_tags($this->title);
    }

    public function getQuestionFullPathAttribute($value)
    {

        if ($this->question_declare_img)
            return asset('public/' . $this->question_declare_img);
        else
            return asset('public/uploads/bankquestions/default.png');
    }

    public function getAnswerFullPathAttribute($value)
    {

        if ($this->answer_declare_img)
            return asset('public/' . $this->answer_declare_img);
        else
            return asset('public/uploads/bankquestions/default.png');
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function group()
    {
        return $this->belongsTo(BankGroup::class, 'bank_group_id');
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_questions', 'question_id', 'quiz_id');
    }
}
