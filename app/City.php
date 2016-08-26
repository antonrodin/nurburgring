<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = ['country_id', 'name'];


    public function tracks()
    {
        return $this->hasMany('App\Track');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
