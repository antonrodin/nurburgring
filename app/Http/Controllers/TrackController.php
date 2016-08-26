<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use App\Http\Requests;
use App\Track;
use App\Country;
use App\City;
use Auth;

class TrackController extends Controller
{

    protected $_track;
    private $_data = array();

    public function __construct(Track $track)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->_track = $track;
    }

    /**
     * Display a listing all circuits
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->_data['tracks'] = $this->_track->all();

        return view('track.index', $this->_data);
    }

    /**
     * Show the form for creating a new circuit
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->_data['countries'] = Country::all();
        return view('track.create', $this->_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'      => 'required|min:5|max:255',
            'address'   => 'required|min:5|max:255',
            'city'      => 'required|min:2|max:255',
            'country_id'   => 'required|numeric',
            'description' => 'min:160',
            'email'     => 'email|min:3|max:255',
            'url'       => 'url|min:2|max:255',
            'facebook'  => 'url|min:2|max:255',
            'length'    => 'numeric',
            'straight'  => 'numeric',
            'width'     => 'numeric',
            'slope'     => 'numeric',
            'capacity'  => 'numeric',
        ]);

        //Add new City
        $city = City::where('name', $request->city)->where('country_id', $request->country_id)->first();
        if (!$city) {
            $city = City::create([
                'name' => $request->city,
                'country_id' => $request->country_id
            ]);
        }

        //Add new racing track
        $locale = App::getLocale();
        $this->_track->create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'city_id' => $city->id,
            'country_id' => $request->country_id,
            'address' => $request->address,
            "{$locale}_description" => $request->description,
            'url' => $request->url,
            'facebook' => $request->facebook,
            'email' => $request->email,
            'length' => $request->length,
            'straight' => $request->straight,
            'width' => $request->width,
            'slope' => $request->slope,
            'capacity' => $request->capacity
        ]);

        return redirect()->route('tracks');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $this->_data['track'] = $this->_track->where('slug', $slug)->first();
        return view('track.show', $this->_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->_data['track'] = Track::find($id);
        return view("track.edit", $this->_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {

        $this->validate($request, [
            'name'      => 'required|min:5|max:255',
            'address'   => 'required|min:5|max:255',
            'city'      => 'required|min:2|max:255',
            'country'   => 'required|min:2|max:255',
            'description' => 'required|min:160',
            'email'     => 'email|min:3|max:255',
            'url'       => 'url|min:2|max:255',
            'facebook'  => 'url|min:2|max:255',
            'length'    => 'min:2|max:255',
            'straight'  => 'min:2|max:255',
            'curves'    => 'min:2|max:255',
            'width'     => 'min:2|max:255',
            'slope'     => 'min:2|max:255',
            'capacity'  => 'min:2|max:255',
            'services'  => 'min:2|max:255',
        ]);

        $track->update($request->all());
        $track->user_id = Auth::id();
        $track->save();

        return redirect()->route('tracks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
