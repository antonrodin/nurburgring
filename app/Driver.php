<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['user_id', 'image_id', 'slug', 'en_name', 'es_name', 'ru_name', 'en_description', 'es_description', 'ru_description'];
}
