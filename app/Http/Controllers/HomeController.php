<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $_data = array();

    public function index()
    {
        $this->_data['meta_title'] = "Circuito de Nürburgring, tiempos, pruebas de coches en el circuito de Nordscheleife.";
        $this->_data['meta_description'] = "Website dedicado al circuito de Nürburgring aquí puedes encontrar información del circuito de Nürburgring Nordscheleife, tiempos, videos del circuito, pruebas de coches en el circuito, longitud del circuito de Nürburgring, Formula 1 en Nürburgring y mucho mas!";
        $this->_data['meta_robots'] = "all";

        $this->_data['breadcrumbs'] = array('Portada' => 'portada');

        return view('home', $this->_data);
    }
}
