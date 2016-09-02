<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Record;
use App\Tiempo;
use App\Track;
use App\Driver;
use App\Car;
use App\Image;
use App\City;
use DB;
use DateTime;
use App\Country;

class ScriptController extends Controller
{

    public function fix()
    {
        $countries = Country::all();
        foreach ($countries as $country) {
            $country->es_name = $country->en_name;
            $country->ru_name = $country->en_name;
            $country->save();
        }
    }

    //Script temporal para añadir circuitos de la antigua base de datos
    public function cscript() {

        $tiempos = DB::table('tiempos')
            ->select(DB::raw('circuito'))
            ->groupBy('circuito')
            ->get();

        $city = City::create([
            'country_id' => 80,
            'en_name' => 'Berlin',
            'es_name' => 'Berlin',
            'ru_name' => 'Berlin',
        ]);

        foreach($tiempos as $tiempo) {

            $image = Image::create([
                'user_id' => 1,
                'file' => 'default.png',
                'caption' => ''
            ]);

            Track::create([
                'user_id' => 1,
                'country_id' => 80,
                'city_id' => $city->id,
                'image_id' => $image->id,
                'en_name' => $tiempo->circuito,
                'es_name' => $tiempo->circuito,
                'ru_name' => $tiempo->circuito,
                'slug' => str_slug($tiempo->circuito, '-')
            ]);

        }
    }

    //Script para añadir pilotos al circuito desde la antigua base de datos
    public function dscript() {

        $tiempos = DB::table('tiempos')
            ->select(DB::raw('piloto'))
            ->groupBy('piloto')
            ->get();


        foreach($tiempos as $tiempo) {

            $image = Image::create([
                'user_id' => 1,
                'file' => 'default.png'
            ]);

            Driver::create([
                'user_id' => 1,
                'image_id' => $image->id,
                'en_name' => $tiempo->piloto,
                'es_name' => $tiempo->piloto,
                'ru_name' => $tiempo->piloto,
                'slug' => str_slug($tiempo->piloto, '-')
            ]);

        }

    }

    //Script para añadir los vehículos a la base de datos
    public function carscript() {

        $tiempos = Tiempo::all();

        foreach($tiempos as $tiempo) {

            $old_image = DB::table('imagenes')
                ->where('module_id', $tiempo->id)
                ->first();

            if ($old_image) {
                $image = Image::create([
                    'user_id' => 1,
                    'file' => $old_image->file,
                    'en_caption' => ''
                ]);
            } else {
                $image = Image::create([
                    'user_id' => 1,
                    'file' => "default.png",
                    'en_caption' => ''
                ]);
            }

            $slug = str_slug("{$tiempo->marca} {$tiempo->coche}", '-');
            $car = Car::where('slug', $slug)->first();

            if (!$car) {
                Car::create([
                    'user_id' => 1,
                    'image_id' => $image->id,
                    'brand' => $tiempo->marca,
                    'model' => $tiempo->coche,
                    'slug' => $slug,
                    'type' => $tiempo->clasificacion
                ]);
            }

        }

    }

    public function recordscript() {

        $tiempos = Tiempo::all();
        foreach($tiempos as $tiempo) {

            //Find CAR
            $car_slug = str_slug("{$tiempo->marca} {$tiempo->coche}", '-');
            $car = Car::where('slug', $car_slug)->first();

            //Find Driver
            $driver_slug = str_slug("{$tiempo->piloto}", '-');
            $driver = Driver::where('slug', $driver_slug)->first();

            Record::create([
                'slug' => "{$tiempo->total}-nurburgring-nordschleife-{$car_slug}",
                'user_id' => 1,
                'car_id' => $car->id,
                'driver_id' => $driver->id,
                'track_id' => 1,
                'record_date' => "{$tiempo->anio}-01-01",
                'total' => $tiempo->total,
                'min' => $tiempo->minutos,
                'seg' => $tiempo->segundos,
                'miliseg' => $tiempo->milisegundos,
                'es_description' => $tiempo->descripcion,
                'youtube' => $tiempo->youtube,
            ]);

        }

    }


}
