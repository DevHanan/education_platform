<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'courses';
    public $timestamps = true;

    protected $fillable = array(
        'name', 'recommened', 'price', 'course_type_id', 'published_at', 'track_id', 'active',
        'instructor_id', 'promo_url', 'start_date', 'end_date', 'level_id', 'description', 'goals', 'directedTo', 'period_type',
        'period', 'seat_number', 'price_with_discount', 'difficulty_level', 'prerequisites', 'provider', 'videoId'
    );
    protected $dates = ['deleted_at'];

    protected $appends = ['avgrating', 'backgroundImageFullPath', 'imageFullPath', 'DifficultyLevelLabel', 'SubscriptionCount', 'Totalsubscription', 'TotalDiscount', 'isSubscribed', 'periodLabel'];

    public function getperiodLabelAttribute()
    {
        if ($this->period_type == 1)
            return  trans('admin.levels.month');
        elseif ($this->period_type == 2)
            return  trans('admin.levels.day');
        else
            return  trans('admin.levels.hour');
    }

    public function getDifficultyLevelLabelAttribute()
    {
        if ($this->difficulty_level == 0)
            return  trans('admin.courses.beginner');
        elseif ($this->difficulty_level == 1)

            return  trans('admin.courses.intermediate');
        elseif ($this->difficulty_level == 2)
            return  trans('admin.courses.advanced');
        else
            return  trans('admin.courses.all');
    }

    public function getSubscriptionCountAttribute()
    {
        $count = $this->subscriptions()->count();
        if ($count > 0)
            return $count;
        else return 0;
    }

    public function getImageFullPathAttribute($value)
    {

        if ($this->image)
            return asset('public/' . $this->image);
        else
            return asset('public/uploads/courses/default.png');
    }
    public function getBackgroundImageFullPathAttribute($value)
    {

        if ($this->background_image)
            return asset('public/' . $this->background_image);
        else
            return asset('public/uploads/courses/default.png');
    }


    public function getIsSubscribedAttribute()
    {
        if (auth()->guard('students-login')->user()) {
            $item = Subscription::where('course_id', $this->id)->where('student_id', auth()->guard('students-login')->user()->id)->first();
            if ($item && $item->active == 1)
                return 1;
            elseif ($item && $item->active == 0)
                return -1;
            else
                return 0;
        } else
            return 0;
    }

    public function getTotalsubscriptionAttribute()
    {
        // $total = $this->subscriptions()->count() * $this->price_with_discount;
         $total = $this->subscriptions()->sum('paid');

        if ($total > 0)
            return $total;
        else return 0;
    }

    public function getavgratingAttribute()
    {
        if ($this->comments()->count() > 0)
            return $this->comments()->sum('rate') / $this->comments()->count();
        else
            return 0;
    }




    public function getTotalDiscountAttribute()
    {
        return $this->price_with_discount;
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }


    public function scoperecentStart($query)
    {
        $landingSetting = LandingSetting::first();
        $date = Carbon::now();
        $newDate = $date->addDays($landingSetting->star_recently_courses);
        return $query->where('start_date', '=', $date->format('Y-m-d'))->where('start_date', '<=', $newDate->format('Y-m-d'));
    }


    public function scoperecommened($query)
    {
        return $query->where('active', '1')->where('recommened', '1');
    }


    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'course_instructors')->withPivot('instructor_id', 'course_price', 'course_prectange');;
    }



    public function tracks()
    {
        return $this->belongsToMany(Track::class, 'course_tracks');
    }
    public function courseType()
    {
        return $this->belongsTo(CourseType::class);
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }



    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'subscriptions');
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function coupon()
    {
        return $this->hasOne(Coupon::class)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }
}
