<?php

namespace DoeSangue\Http\Requests;

class UserProfileRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'phone'     => 'required',
        ];
    }
}
