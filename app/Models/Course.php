<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    public $timestamps = true;

    protected $fillable = array('name','recommend','price','course_type_id','published_at','track_id','active',
                                'instructor_id','promo_url','level_id','description','goals','directedTo'
                               );


    protected $appends = ['SubscriptionCount','Totalsubscription'] ;   
    
    
    public function getSubscriptionCountAttribute(){
     return $this->subscriptions()->count();   
    }

    public function getTotalsubscriptionAttribute(){
        return $this->subscriptions()->count() * $this->price;   
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
 
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function courseType()
    {
        return $this->belongsTo(CourseType::class);
    }


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
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
