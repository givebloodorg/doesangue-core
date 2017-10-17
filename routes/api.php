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
        return response()->json([ 'message' => 'Hello World!']);
    }
);

// API Authentication routes
// Create new Token
Route::group(
    ['prefix' => 'v1', 'namespace' => 'Auth'], function ($auth) {
        $auth->post('/auth/login', 'AuthenticateController@authenticate');
        $auth->post('/auth/logout', 'AuthenticateController@logout');
        $auth->post('/auth/register', 'AuthenticateController@register');
        $auth->get('/auth/me', 'AuthenticateController@userInfo');
    }
);
// End API Authentication routes.

// Donors API
Route::group(
    ['namespace' => 'API\V1', 'prefix' => 'v1'], function () {

      // Routes related to logged in user
      Route::group(['prefix' => 'me'], function($user) {
        $user->get('/', 'UsersController@userInfo');
        // User campigns
        $user->group(['prefix' => 'campaigns'], function() {
          Route::get('/', 'CampaignController@index');
        });
      });
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

        // Invites.
        Route::group(
            ['prefix' => 'invites'], function ($invite) {
                // Create a new invite.
                $invite->post('/', 'InvitesController@create');
                // Get a Invite details.
                $invite->get('/{invite}', 'InvitesController@show');
                // Delete a invite.
                $invite->delete('/{invite}', 'InvitesController@destroy');
            }
        );

        // Search campaigns and donors.
        Route::group(
            ['prefix' => 'search'], function () {
                // Search campaigns
                Route::get('/query={$query}', 'SearchController@search');
            }
        );
    }
);
