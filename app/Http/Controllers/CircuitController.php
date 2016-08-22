<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Circuit;
use Auth;

class CircuitController extends Controller
{

    protected $_circuit;
    private $_data = array();

    public function __construct(Circuit $circuit)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->_circuit = $circuit;
    }

    /**
     * Display a listing all circuits
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->_data['circuits'] = $this->_circuit->all();

        return view('circuit.index', $this->_data);
    }

    /**
     * Show the form for creating a new circuit
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('circuit.create', $this->_data);
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

        $this->_circuit->create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'description' => $request->description,
            'url' => $request->url,
            'facebook' => $request->facebook,
            'email' => $request->email,
            'length' => $request->length,
            'straight' => $request->straight,
            'curves' => $request->curves,
            'width' => $request->width,
            'slope' => $request->slope,
            'capacity' => $request->capacity,
            'services' => $request->services
        ]);

        return redirect('circuit');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $this->_data['circuit'] = $this->_circuit->where('slug', $slug)->first();
        return view('circuit.show', $this->_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Circuit $circuit)
    {
        $this->_data['circuit'] = $circuit;
        return view("circuit.edit", $this->_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circuit $circuit)
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

        $circuit->update($request->all());
        $circuit->user_id = Auth::id();
        $circuit->save();

        return redirect('circuit');
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
