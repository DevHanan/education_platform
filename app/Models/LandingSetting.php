<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingSetting extends Model
{
    use HasFactory;
    protected $fillable=['header_title','header_description','footer_description','most_required_courses',
    'recommend_courses','top_rated_courses','star_recently_courses','tracks','instructors',
    'workteam','parteners','student_opinion','map_locations','achievements','start_soon_period',
    'letter_news','book_shop_url','verification_expire_time_in_seconds','question_list','book_store_visiable',
    'free_courses','guide_file'
];

protected $appends = ['headerImageFullPath','footerImageFullPath','guideFileFullPath'];

public function getheaderImageFullPathAttribute($value)
{

    return asset('public/' . $this->header_image);
}


public function getguideFileFullPathAttribute($value)
{

    return asset('public/' . $this->guide_file);
}

public function getfooterImageFullPathAttribute($value)
{

    return asset('public/' . $this->footer_image);
}
}
