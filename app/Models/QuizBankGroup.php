<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizBankGroup extends Model
{
    use HasFactory;
    protected $fillable = ['quiz_id', 'bank_group_id','random','question_number'];

}
