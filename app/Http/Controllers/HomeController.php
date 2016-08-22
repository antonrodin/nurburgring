<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $_data = array();

    public function index()
    {
        $this->_data['meta_title'] = ".";
        $this->_data['meta_description'] = "";
        $this->_data['meta_robots'] = "all";

        return view('home', $this->_data);
    }
}
