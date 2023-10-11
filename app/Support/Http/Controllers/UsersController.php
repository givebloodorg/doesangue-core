<?php

namespace GiveBlood\Support\Http\Controllers;

use GiveBlood\Support\Http\Controllers\Controller;
use GiveBlood\Units\Core\Http\Resources\UserCollection;
use GiveBlood\Units\Core\Http\Resources\User as UserResource;
use GiveBlood\Modules\Users\User;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    public function index(): UserCollection
    {

        return new UserCollection(User::paginate(50));

    }

    public function show($donor): UserResource | JsonResponse
    {

        $donor_data =User::find($donor);

        if($donor_data == null){
            return response()->json(
                [
                'No content found. Try to search again!'
                ], 404
            );
        }

        return new UserResource($donor_data);
    }

}
