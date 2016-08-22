<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['user_id', 'image_id', 'brand', 'model', 'slug', 'description', 'type', 'power', 'weight', 'torque'];

    public function records()
    {
        return $this->hasMany('App\Records');
    }

    public function image() {
        return $this->belongsTo('App\Image');
    }

}