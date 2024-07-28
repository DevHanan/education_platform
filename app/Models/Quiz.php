<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{


    protected $guarded = ['id'];
    protected $fillable = [
        'track_id', 'course_id', 'level_id', 'active', 'name', 'start_time', 'end_time',
        'duration_in_minutes', 'total_mark', 'pass_mark', 'active', 'quiz_type', 'has_levels', 'lecture_id','question_number'
    ];

    protected $with = ['questions'];
    protected $appends = ['passingAttempt'];

    public function getPassingAttemptAttribute($value)
    {
        if(auth()->guard('students-login')->check()){

            $attempt = PassingAttempt::where('quiz_id',$this->id)->where('student_id',auth()->guard('students-login')->user()->id)->count();
            return $attempt;
        }
        else
        return 0;
    }

    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function track()
    {
        return $this->belongsTo(Track::class, 'track_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecture_id');
    }
    public function sections()
    {
        return $this->hasMany(QuizSection::class, 'quiz_id');
    }


    public function bankGroups()
    {
        return $this->hasMany(QuizBankGroup::class, 'quiz_id');
    }

    public function studentTest()
    {
        return $this->hasMany(StudentQuestion::class);
    }
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class, 'quiz_id');
    }

    public function getTotalMarkWithoutEssay()
    {
        $total = 0;
        foreach ($this->sections as $section) {
            foreach ($section->questions as $question) {
                if ($question->type != 'essay') {
                    $total += (int)$question->mark;
                }
            }
        }
        return $total;
    }
}
