<?php

namespace GiveBlood\Units\Core\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
          'first_name' =>   $this->first_name,
          'last_name'  =>   $this->last_name,
          // 'email'      =>   $this->email,
          'username'   =>   $this->username,
          'blood_type' =>   $this->bloodType->code,
          'avatar'     =>   $this->avatar,
        //  'birthdate'  =>   $this->birthdate,
        //  'phone'      =>   $this->phone,
          'bio'        =>   $this->bio
        ];
    }
}
