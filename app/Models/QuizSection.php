<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizSection extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['quiz_id', 'title','active','question_number'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'section_id');
    }
}
