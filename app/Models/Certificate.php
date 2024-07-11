<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $table = "certificates";
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = array('name', 'course_id','date' ,'authority','student_id', 'track_id', 'platform_certification','notes','active','serial_number');

    protected $appends = ['FileFullPath','imageFullPath','statusLabel'] ;   
    

    public function getstatusLabelAttribute()
    {
        if ($this->active == 1)
        return  trans('admin.certifications.accepted');
        elseif ($this->active == 0)
        return  trans('admin.certifications.pending');
        else
        return  trans('admin.certifications.refaused');
    }
 
    public function getFileFullPathAttribute($value)
    {
            return asset('public/'.$this->file);
    }

    public function getImageFullPathAttribute($value)
    {
            return asset('public/'.$this->image);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
