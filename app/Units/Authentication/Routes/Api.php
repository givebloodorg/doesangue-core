<?php

namespace GiveBlood\Units\Authentication\Routes;

use GiveBlood\Support\Http\Routing\Router;
/**
 * Api class
 *
 * @category Api
 *
 * @package LinkaFaturas
 *
 * @author José Cage <jose.cage@mentedigital.xyz>
 *
 * @license proprietary https://mentedigital.xyz
 *
 * @link https://mentedigital.xyz
 */
class Api extends Router
{
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

    protected function routes()
    {
        $this->homeRoutes();
        $this->authRoutes();
        $this->userRoutes();
        $this->campaignRoutes();
    }

    protected function homeRoutes()
    {
        $this->router->get(
            '/', function () {
                return response()->json([ 'message' => 'Hello World!']);
            }
        );

        // Search campaigns and donors.
        $this->router->group(
            ['prefix' => 'search', 'namespace' => '\GiveBlood\Support\Http\Controllers'], function () {
                // Search campaigns
                $this->router->get('/', 'SearchController@search');
            }
        );

        $this->router->fallback(
            function () {
                return response()->json(
                    [
                    'error' => 'Route cannot be found!'], 404
                );
            }
        );

    }

    protected function authRoutes()
    {
        // API Authentication routes
        // Create new Token
        $this->router->group(
            ['prefix' => 'v1', 'namespace' => '\GiveBlood\Units\Authentication\Http\Controllers\Auth'], function ($auth) {
                $auth->post('/auth/login', 'AuthenticateController@authenticate');
                $auth->get('/auth/logout', 'AuthenticateController@logout');
                //        $auth->post('/auth/register', 'AuthenticateController@register');
                $auth->group(
                    ['prefix' => 'password'], function ($password) {
                        $password->post('/recover', 'PasswordResetController@recover')->name('password.reset');
                        $password->post('/reset/{token}', 'PasswordResetController@reset');
                    }
                );
                // invitation routes
                $auth->group(
                    ['prefix' => 'invitation'], function ($invitation) {
                        $invitation->post('/', 'InvitationRequestsController@createInvitation');
                        $invitation->get('/check', 'InvitationRequestsController@checkInvation');
                    }
                );
            }
        );

        $this->router->group(
            ['prefix' => 'v1', 'namespace' => '\GiveBlood\Units\Authentication\Http\Controllers\Auth'], function ($auth) {
                $auth->post('/auth/login', 'AuthenticateController@authenticate');
                $auth->get('/auth/logout', 'AuthenticateController@logout');
                //        $auth->post('/auth/register', 'AuthenticateController@register');
                $auth->group(
                    ['prefix' => 'password'], function ($password) {
                        $password->post('/recover', 'PasswordResetController@recover')->name('password.reset');
                        $password->post('/reset/{token}', 'PasswordResetController@reset');
                    }
                );
                // invitation routes
                $auth->group(
                    ['prefix' => 'invitation'], function ($invitation) {
                        $invitation->post('/', 'InvitationRequestsController@createInvitation');
                        $invitation->get('/check', 'InvitationRequestsController@checkInvation');
                    }
                );
            }
        );
    }

    protected function userRoutes()
    {
        // Donors
        $this->router->group(
            ['namespace' => '\GiveBlood\Support\Http\Controllers', 'prefix' => 'donors'], function ($donor) {
                // Because all donor is a user
                // We will use UsersController instead
                // All donors
                $donor->get('/', 'UsersController@index');
                // show info about donor
                $donor->get('{donor}', 'UsersController@show');

                // Campaigns by donor
                $donor->get('{donor}/campaigns', 'UsersController@getCampaigns');
                $donor->get('{donor}/campaigns/{campaign}', 'UsersController@showCampaign');
            }
        );
        // Donors API
        $this->router->group(
            ['namespace' => '\GiveBlood\Support\Http\Controllers', 'prefix' => 'v1'], function () {

                // Routes related to logged in user
                $this->router->group(
                    ['prefix' => 'me', 'namespace' => 'User'], function ($user) {
                        // Get user information.
                        $user->get('/', 'AccountController@userInfo');
                        // Update User profile information.
                        $user->put('/', 'AccountController@updateProfile');
                        // User campigns
                        $user->group(
                            ['prefix' => 'campaigns'], function ($campaign) {
                                // Get all user Campaigns.
                                $campaign->get('/', 'CampaignController@index');
                                // Create Campaign
                                $campaign->post('/', 'CampaignController@store');
                                // Show complete info about campaign
                                $campaign->get('/{campaign}', 'CampaignController@show');
                                // Update campaign
                                $campaign->put('/{campaign}', 'CampaignController@update');
                                // Detele Campaign
                                $campaign->delete('/{campaign}', 'CampaignController@destroy');
                            }
                        );

                        // User donations
                        $user->get('/donations', 'DonationController@donations');
                    }
                );

                // Blood Banks
                $this->router->group(
                    ['prefix' => 'banks'], function ($bank) {
                        $bank->get('/', 'BankController@index');
                        $bank->get('/{bank}', 'BankController@show');
                    }
                );

                // BloodTypes
                $this->router->group(
                    ['prefix' => 'bloodtypes'], function () {
                        $this->router->get('/', 'BloodTypeController@index');
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
            }
        );
    }

    protected function campaignRoutes()
    {
        // Campaign
        $this->router->group(
            ['namespace' => '\GiveBlood\Support\Http\Controllers', 'prefix' => 'v1'], function () {

                $this->router->group(
                    ['prefix' => 'campaigns'], function ($campaign) {
                        //All Campaigns
                        $campaign->get('/', 'CampaignController@index');
                        // Campaign details
                        $campaign->get('{campaign}', 'CampaignController@show');
                        // Comments
                        $campaign->get('{campaign}/comments', 'CommentsController@index');
                        $campaign->post('{campaign}/comments', 'CommentsController@create');
                        $campaign->put('{campaign}/comments/{comment}', 'CommentsController@update');
                        $campaign->delete('{campaign}/comments/{comment}', 'CommentsController@destroy');
                    }
                );
            }
        );

    }

}
