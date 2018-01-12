<?php

namespace DoeSangue\Http\Controllers\Auth\V1;

use Illuminate\Http\Request;
use DoeSangue\Http\Controllers\Controller;
use DoeSangue\Http\Requests\UserInvitationRequest;
use Hash, DB;

class InvitationRequestsController extends Controller
{
    /**
     * Create an invite when user requests from API.
     *
     * @param UserInvitationRequest $request
     * @return void
     */
    public function createInvitation(UserInvitationRequest $request)
    {

        $guestExist = DB::table('invitation_requests')
                     ->where('guest_email', $request['guest_email'])->first();

        if (!$guestExist) {
            $guest = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'guest_email' => $request->guest_email,
                'country_id' => $request->country_id,
                'token' => Hash::make(str_random(60)),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ];

            DB::table('invitation_requests')->insert($guest);

            return response()->json([
                'message' => 'Urrah! You have been invited. Check you email for more information.'
            ], 201);
        } else {
            return response()->json([
                'message' => 'Oops. Looks like you have been invited already. But don\'t scary, we will send you again!'
            ], 200);
        }

    }

    /**
     * Check if User was invited before.
     *
     * @param Request $data
     * @return void
     */
    public function checkInvitation(Request $data)
    {}
}
