<?php

namespace GiveBlood\Units\Authentication\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Support\Http\Controllers\UserInvitationRequest;
use Hash;
use DB;
use Illuminate\Support\Str;

class InvitationRequestsController extends Controller
{
    /**
     * Create an invite when user requests from API.
     *
     * @param  UserInvitationRequest $request
     * @return JsonResponse|void
     */
    public function createInvitation(Request $request): JsonResponse
    {

        $guestExist = DB::table('invitation_requests')
            ->where('guest_email', $request['guest_email'])->first();

        if (!$guestExist) {
            $guest = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'guest_email' => $request->guest_email,
                'country_id' => $request->country_id,
                'token' => Hash::make(Str::random(60)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            DB::table('invitation_requests')->insert($guest);

            return response()->json(
                [
                'message' => 'Urrah! You have been invited. Check you email for more information.'
                ], 201
            );
        }
        return response()->json(
            [
            'message' => "Oops. Looks like you have been invited already. But don't scary, we will send you again!"
            ], 200
        );

    }

    /**
     * Check if User was invited before.
     */
    public function checkInvitation(Request $data): void
    {
    }
}
