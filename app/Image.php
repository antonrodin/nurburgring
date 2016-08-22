<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['user_id', 'file', 'caption'];

    public function car()
    {
        return $this->hasOne('App\Car');
    }
}
