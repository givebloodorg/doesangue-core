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

// API Authentication routes
// Create new Token
Route::group(['prefix' => 'v1', 'namespace' => 'Auth'], function($auth)
  {
    $auth->post('/auth/login', 'AuthenticateController@authenticate')->name('login');
    $auth->post('/auth/logout', 'AuthenticateController@logout')->name('logout');
    $auth->post('/auth/register', 'AuthenticateController@register')->name('register');
    $auth->get('/auth/me', 'AuthenticateController@userInfo')->name('profile');
  });
// End API Authentication routes.

// Donors API
Route::group(
    ['namespace' => 'API', 'prefix' => 'v1'], function () {
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
                // Comments
                Route::get('{campaign}/comments', 'CommentsController@index');
                Route::post('{campaign}/comments', 'CommentsController@create');
                Route::put('{campaign}/comments/{comment}', 'CommentsController@update');
                Route::delete('{campaign}/comments/{comment}', 'CommentsController@destroy');
            }
        );

      // Search campaigns and donors.
      Route::group(['prefix' => 'search'], function() {
          // Search campaigns
          Route::get('/query={$query}', 'SearchController@search');
      });
    }
);
