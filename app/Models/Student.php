<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class Student extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory;
    protected $table = 'students';
    public $timestamps = true;

    protected $fillable = array(
        'first_name', 'last_name', 'email', 'phone', 'active',
        'country_id', 'qualifications', 'about_student'
    );

    protected $appends = ['name', 'imageFullPath','aboutLabel'];
    protected function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAboutLabelAttribute()
    {
        if ($this->about_student == 0)
            return  trans('admin.instructors.student');
        elseif ($this->about_student == 1)

        return  trans('admin.instructors.Bachelor');
        elseif ($this->about_student == 2)
        return  trans('admin.instructors.Graduated');
        elseif ($this->about_student == 3)
        return  trans('admin.instructors.Doctorate');
        else
        return  trans('admin.instructors.Master');
    }

    public function getImageFullPathAttribute($value)
    {

        if($this->image)
        return asset('public/' . $this->image);
        else
        return asset('public/uploads/students/default.jpg');
    }

    protected $hidden = ['password']; 

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    public function tracks()
    {
        return $this->belongsToMany(Track::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function passingAttempsQuiz()
    {
        return $this->hasMany(PassingAttempt::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
