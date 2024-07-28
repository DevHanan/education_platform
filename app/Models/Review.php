<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    public $timestamps = true;

    protected $fillable = array('name','active','comment','job');
    protected $appends = ['customComment'];

    public function getcustomCommentAttribute($value)
    {

        return  strip_tags(htmlspecialchars_decode($this->comment));
    }

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }
}
