<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankGroup extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['course_id', 'name','track_id','active'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function track()
    {
        return $this->belongsTo(Track::class, 'track_id');
    }
    public function questions()
    {
        return $this->hasMany(BankQuestion::class, 'bank_group_id');
    }

    public function exams()
    {
        return $this->hasMany(StudentExam::class,'quiz_id');
    }
}
