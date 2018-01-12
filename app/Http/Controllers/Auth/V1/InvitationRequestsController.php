<?php

namespace DoeSangue\Http\Controllers\Auth\V1;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Http\Requests\UserInvitationRequest;

class InvitationRequestsController extends Controller
{
    /**
     * Create an invite when user requests from API.
     *
     * @param UserInvitationRequest $request
     * @return void
     */
    public function createInvitation(UserInvitationRequest $request)
    {}
}
