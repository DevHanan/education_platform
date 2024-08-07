<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $table = 'lectures';
    public $timestamps = true;

    protected $fillable = array(
        'title', 'level_id', 'course_id', 'type', 'active',
        'description', 'short_description', 'type', 'goals', 
        'conclusion', 'appointment', 'link', 'provider', 'period', 'free','metting_link'
    );


    protected $appends = ['freeLabel','typeLabel'] ;   

    public function getTypeLabelAttribute()
    {
        if ($this->type == 1)
            return  trans('admin.lectures.viedo');
        elseif ($this->type == 2)
            trans('admin.lectures.metting');
        else
            return ('admin.lectures.offline');
    }

    public function getFreeLabelAttribute()
    {
        if ($this->free == 1)
            return  trans('admin.lectures.opened_free');
        else
            return ('admin.lectures.not_opened_free');
    }
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }


    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function photos()
    {
        return $this->hasMany(PhotoLecture::class);
    }

    public function books()
    {
        return $this->hasMany(BookLecture::class);
    }
}
