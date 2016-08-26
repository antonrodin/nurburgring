<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function tracks()
    {
        return $this->hasMany('App\Track');
    }

    public function city()
    {
        return $this->hasMany('App\City');
    }
}
