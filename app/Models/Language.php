<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'active'];

    protected $appends = ['courseCount', 'ImageFullPath'];
    public function getImageFullPathAttribute($value)
    {

        if ($this->image)
            return asset('public/' . $this->image);
        else
            return asset('public/uploads/languages/default.png');
    }


    static public function version()
    {
        if (\Session()->has('locale')) {

            $version = Language::where('code', \Session()->get('locale'))->first();
        } else {
            $version = Language::where('default', 1)->first();
        }

        return $version;
    }
}
