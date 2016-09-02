<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = ['user_id', 'image_id', 'en_name', 'es_name', 'ru_name', 'slug', 'address', 'city_id', 'country_id', 'lat', 'lng', 'url', 'facebook', 'email', 'length', 'straight', 'curves', 'width', 'slope', 'paddock', 'capacity', 'turns', 'en_description', 'es_description', 'ru_description'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function city() {
        return $this->belongsTo('App\City');
    }

}
