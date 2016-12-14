<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get(
    '/', function () {
        return response()->json();
    }
);

// Donor API
Route::group(
    ['middleware' => ['guest'], 'namespace' => 'API'], function () {
        Route::group(
            ['prefix' => 'donors'], function () {
                // All donors
                Route::get('/', 'DonorsController@index');
                // Create Donor
                Route::post('/', 'DonorsController@store');
                // show info about donor
                Route::get('/{donor}', 'DonorsController@show');
            }
        );
    }
);
