<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Record;
use App\Tiempo;
use App\Circuit;
use App\Driver;
use App\Car;
use App\Image;
use DB;
use DateTime;

class ScriptController extends Controller
{

    //Script temporal para añadir circuitos de la antigua base de datos
    public function cscript() {

        $tiempos = DB::table('tiempos')
            ->select(DB::raw('circuito'))
            ->groupBy('circuito')
            ->get();

        foreach($tiempos as $tiempo) {

            $image = Image::create([
                'user_id' => 1,
                'file' => 'default.png',
                'caption' => ''
            ]);

            Circuit::create([
                'user_id' => 1,
                'image_id' => $image->id,
                'name' => $tiempo->circuito,
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
                'file' => 'default.png',
                'caption' => ''
            ]);

            Driver::create([
                'user_id' => 1,
                'image_id' => $image->id,
                'name' => $tiempo->piloto,
                'slug' => str_slug($tiempo->piloto, '-')
            ]);

        }

    }

    //Script para añadir los vehículos a la base de daros
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
                    'caption' => ''
                ]);
            } else {
                $image = Image::create([
                    'user_id' => 1,
                    'file' => "default.png",
                    'caption' => ''
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
                    'slug' => $slug
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

            //Find Circuit
            $circuit_slug = str_slug("{$tiempo->circuito}", '-');
            $circuit = Circuit::where('slug', $circuit_slug)->first();

            Record::create([
                'slug' => "{$tiempo->total}-{$circuit_slug}-{$car_slug}",
                'user_id' => 1,
                'car_id' => $car->id,
                'driver_id' => $driver->id,
                'circuit_id' => $circuit->id,
                'record_date' => "{$tiempo->anio}-01-01",
                'total' => $tiempo->total,
                'min' => $tiempo->minutos,
                'seg' => $tiempo->segundos,
                'miliseg' => $tiempo->milisegundos,
                'description' => $tiempo->descripcion,
                'youtube' => $tiempo->youtube,
            ]);

        }

    }


}
