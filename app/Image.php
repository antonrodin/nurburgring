<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['user_id', 'file', 'en_caption', 'es_caption', 'ru_caption'];

    public function car()
    {
        return $this->hasOne('App\Car');
    }
}
