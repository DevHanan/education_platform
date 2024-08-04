<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = array('question','active','answer');
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    protected $appends = ['customAnswer'];

    public function getcustomAnswerAttribute($value)
    {

        return  strip_tags(htmlspecialchars_decode($this->answer));
    }

}
