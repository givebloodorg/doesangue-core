<?php

namespace DoeSangue\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'first_name' =>   $this->first_name,
          'last_name'  =>   $this->last_name,
         // 'email'      =>   $this->email,
          'username'   =>   $this->username,
          'blood_type' =>   $this->bloodType->code,
          'avatar'     =>   '',//$this->avatar,
        //  'birthdate'  =>   $this->birthdate,
        //  'phone'      =>   $this->phone,
          'bio'        =>   $this->bio
        ];
    }
}
