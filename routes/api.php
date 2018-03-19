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
        $auth->get('/auth/logout', 'AuthenticateController@logout');
//        $auth->post('/auth/register', 'AuthenticateController@register');
        $auth->group(['prefix' => 'password', 'namespace' => 'V1'], function($password) {
          $password->post('/recover', 'PasswordResetController@recover')->name('password.reset');
          $password->post('/reset/{token}', 'PasswordResetController@reset');
        });
        // invitation routes
        $auth->group(['prefix' => 'invitation', 'namespace' => 'V1'], function($invitation) {
            $invitation->post('/', 'InvitationRequestsController@createInvitation');
            $invitation->get('/check', 'InvitationRequestsController@checkInvation');
        });
    }
);
// End API Authentication routes.

// Donors API
Route::group(
    ['namespace' => 'API\V1', 'prefix' => 'v1'], function () {

        // Routes related to logged in user
        Route::group(
            ['prefix' => 'me', 'namespace' => 'User'], function ($user) {
                // Get user information.
                $user->get('/', 'AccountController@userInfo');
                // Update User profile information.
                $user->put('/', 'AccountController@updateProfile');
                // User campigns
                $user->group(
                    ['prefix' => 'campaigns'], function () {
                        // Get all user Campaigns.
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

              // User donations
              $user->get('/donations', 'DonationController@donations');

              // User notifications.
              /*$user->group(
                [
                 'prefix' => 'notifications', function() {
                    Route::get('notifications', 'NotificationController');
                 }
                ]
              );*/
            }
        );

        // Blood Banks
        Route::group(['prefix' => 'banks'], function($bank)
        {
          $bank->get('/', 'BankController@index');
          $bank->get('/{bank}', 'BankController@show');
        });

        // BloodTypes
        Route::group(['prefix' => 'bloodtypes'], function()
        {
          Route::get('/', 'BloodTypeController@index');
        });
        // Donors
        Route::group(
            ['prefix' => 'donors'], function () {
                // Because all donor is a user
                // We will use UsersController instead
                // All donors
                Route::get('/', 'UsersController@index');
                // show info about donor
                Route::get('{donor}', 'UsersController@show');

                // Campaigns by donor
                Route::get('{donor}/campaigns', 'UsersController@getCampaigns');
                Route::get('{donor}/campaigns/{campaign}', 'UsersController@showCampaign');
            }
        );

        // Campaign
        Route::group(
            ['prefix' => 'campaigns'], function () {
                //All Campaigns
                Route::get('/', 'CampaignController@index');
                // Campaign details
                Route::get('{campaign}', 'CampaignController@show');
                // Comments
                Route::get('{campaign}/comments', 'CommentsController@index');
                Route::post('{campaign}/comments', 'CommentsController@create');
                Route::put('{campaign}/comments/{comment}', 'CommentsController@update');
                Route::delete('{campaign}/comments/{comment}', 'CommentsController@destroy');
            }
        );

        /*
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
        */

        /*
        // Search campaigns and donors.
        Route::group(
            ['prefix' => 'search'], function () {
                // Search campaigns
                Route::get('/query={$query}', 'SearchController@search');
            }
        );
        */
    }
);
