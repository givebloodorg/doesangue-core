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

// Create new Token
Route::post('auth/login', 'Auth\AuthenticateController@authenticate');

// Donor API
Route::group(
    ['namespace' => 'API'], function () {
        // Donors
        Route::group(
            ['prefix' => 'donors'], function () {
                // All donors
                Route::get('/', 'DonorsController@index');
                // Create Donor
                Route::post('/', 'DonorsController@store');
                // show info about donor
                Route::get('{donor}', 'DonorsController@show');
                // Update the Donor
                Route::put('{donor}', 'DonorsController@update');

                // Campaigns by donor
                Route::get('{donors}/campaigns', 'DonorsController@campaigns');
                Route::get('{donors}/campaigns/{campaign}', 'DonorsController@showCampaign');
            }
        );

        // Campaign
        Route::group(
            ['prefix' => 'campaigns'], function () {
                //All Campaigns
                Route::get('/', 'CampaignController@index');
                // Create Campaign
                Route::post('/', 'CampaignController@store');
                // Show complete info about campaign
                Route::get('{campaign}', 'CampaignController@show');
                // Update campaign
                Route::put('{campaign}', 'CampaignController@update');
                // Detele Campaign
                Route::delete('{campaign}', 'CampaignController@destroy');
            }
        );

        // Posts
        Route::group(['prefix' => 'posts'], function (){
          // All Posts
          Route::get('/', 'PostsController@index');
          Route::post('/', 'PostsController@store');
          Route::get('{post}', 'PostsController@show');
          Route::put('{post}', 'PostsController@update');
          Route::delete('{post}', 'PostsController@destroy');
        });
    }
);
