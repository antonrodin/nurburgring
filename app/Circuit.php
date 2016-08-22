<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    protected $fillable = ['user_id', 'name', 'slug', 'address', 'city', 'country', 'lat', 'lng', 'url', 'facebook', 'email', 'length', 'straight', 'curves', 'width', 'slope', 'paddock', 'capacity', 'services', 'description'];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
