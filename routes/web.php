<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
|--------------------------------------------------------------------------
| Ticker Routes
|--------------------------------------------------------------------------
|
| Here we specify the routes to access the ticker functions including 
| getting the tickers from the end-point API, and getting the tickers
| from the local DB.
*/
# Gather tickers from end-point API #
Route::get('/', 'TickerController@index');
Route::get('/coin/{search}', ['uses' => 'TickerController@search', 'as' => 'coin.route']);
Route::post('/coin', 'TickerController@processForm');

Route::get('about', function() {
	return view('about');
});

Route::get('howto', function() {
	return view('howto');
});

Route::get('disclaimer', function() {
	return view('disclaimer');
});

/* MD5 Hash for "subscribe" = "1ac1eb912d7bbeb17a79f70815227395"
	Using a hash instead of text will ensure this route doesn't
	accidentally get called by someone free-typing in the URL space.
*/
Route::post('1ac1eb912d7bbeb17a79f70815227395', ['uses' => 'SubscribeController@verifySubscribe', 'as' => 'subscribe.route']);

/*
Route::get('contact', function() {
	return view('contact');
});
*/

/* MD5 Hash for "updateCoin" = "d17059dfce4c09ef5e437b1d9455f7c6"
	Using a hash instead of text will ensure this route doesn't
	accidentally get called by someone free-typing in the URL space.
*/
Route::get('/d17059dfce4c09ef5e437b1d9455f7c6', 'TickerController@updateCoins');

/* These routes are used to handle server errors */
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
Route::get('500',['as'=>'500','uses'=>'ErrorHandlerController@errorCode500']);

