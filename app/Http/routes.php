<?php

$languages = array('en', 'ru', 'es');
$locale = Request::segment(1);
if (in_array($locale, $languages)) {
    App::setLocale($locale);
} else {
    $locale = null;
}

Route::group(array('prefix' => $locale, 'middleware' => ['last', 'locale']), function() {

    //Home
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/contacto', ['as' => 'contacto', 'uses' => 'ContactController@contacto']);
    Route::get('/legal', ['as' => 'legal', 'uses' => 'ContactController@legal']);
    Route::get('/cookies', ['as' => 'cookies', 'uses' => 'ContactController@cookies']);

    //Track routes
    Route::get('tracks', ['as' => 'tracks', 'uses' => 'TrackController@index']);
    Route::get('track/create', ['as' => 'track.create', 'uses' => 'TrackController@create']);
    Route::post('track', ['as' =>'track', 'uses' => 'TrackController@store']);
    Route::get('track/{track}/edit', ['as' => 'track.edit', 'uses' => 'TrackController@edit']);
    Route::put('track/{track}', ['as' => 'track.update', 'uses' => 'TrackController@update']);
    Route::get('track/{slug}', ['as'=>'track.show', 'uses' => 'TrackController@show']);

});

//Change Language and locale
Route::get('change_locale/{locale}', array('as' => 'change_locale', function($locale) {

    //Set locale
    App::setLocale($locale);
    Session::put('forever_locale', $locale);

    //Get last route from session
    //The App set last route in StoreLastRoute Middleware
    $route = Session::get('last_route');

    //Convert route to array
    $array_route = explode("/", $route);
    //Change first segment of route to "es", "en" or whatever
    $array_route[0] = $locale;
    //Convert array to string
    $redirect_route = implode("/", $array_route);
    //Redirect to new route
    return Redirect::to($redirect_route);
}));

//Auth Routes without prefix
Route::auth();

//Temporal Routes
//Scripts Controller
Route::get('cscript', 'ScriptController@cscript');
Route::get('dscript', 'ScriptController@dscript');
Route::get('carscript', 'ScriptController@carscript');
Route::get('recordscript', 'ScriptController@recordscript');