<?php

namespace DoeSangue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInvitationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'   => 'required|string|max:100',
            'last_name'    => 'required|string|max:100',
            'guest_email'  => 'required|string|email|max:255|unique:invitation_requests',
            'country_id' => 'required|integer'
        ];
    }

    /**
     * Return a message when something goes wrong.
     *
     * @return void
     */
    public function messages()
    {
        return [
            'first_name.required' => 'The First Name can\'t be empty!',
            'last_name.required' => 'The First Name can\'t be empty!',
            'guest_email.required' => 'Your email can\'t be empty!',
            'guest_email.unique' => 'Oops. Looks like you have been invited already!',
        ];
    }
}
